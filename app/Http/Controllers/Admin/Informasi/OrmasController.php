<?php

namespace App\Http\Controllers\Admin\Informasi;

use App\Http\Controllers\Controller;


use App\Models\Ormas;
use App\Models\PengurusOrmas;
use App\Models\DokumenOrmas;
use App\Models\ImportBatch;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;   
use Illuminate\Support\Facades\Log;
use App\Services\OrmasExcelImporter;
use Mews\Purifier\Facades\Purifier;

class OrmasController extends Controller
{
    public function index(Request $request): View
    {
        $query = Ormas::with(['pengurus', 'dokumen']);
        
        // Handle search functionality
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where('nama_organisasi', 'LIKE', '%' . $searchTerm . '%');
        }
        
        // Handle sort filter (terbaru / terlama)
        $sort = $request->get('sort', 'terbaru');
        if ($sort === 'terlama') {
            $query->orderBy('created_at', 'asc')->orderBy('id', 'asc');
        } else {
            $query->orderBy('created_at', 'desc')->orderBy('id', 'desc');
        }
        
        $ormass = $query->paginate(10);
                        
        return view('dashboard.ormass.index', compact('ormass'));
    }

    public function create(): View
    {
        return view('dashboard.ormass.create');
    }
    
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        $file = $request->file('file');

        try {
            $importer = new OrmasExcelImporter();
            $result = $importer->import(
                $file->getRealPath(),
                $file->getClientOriginalName(),
                auth()->user()->name ?? 'Admin'
            );

            $imported = $result['imported_count'];
            $skippedNames = $result['skipped_names'];
            $skippedCount = count($skippedNames);

            if ($imported > 0 && $skippedCount === 0) {
                return redirect()->route('ormass.index')
                    ->with('success', "File Excel berhasil diimport! Total {$imported} data organisasi baru berhasil ditambahkan.");
            } elseif ($imported > 0 && $skippedCount > 0) {
                $skippedText = implode(', ', array_slice($skippedNames, 0, 8));
                if ($skippedCount > 8) {
                    $skippedText .= ' (dan ' . ($skippedCount - 8) . ' lainnya)';
                }
                return redirect()->route('ormass.index')
                    ->with('success', "Berhasil mengimpor {$imported} data organisasi baru.")
                    ->with('warning', "Peringatan: Terdapat {$skippedCount} organisasi yang dilewati karena sudah ada di database: {$skippedText}");
            } elseif ($imported === 0 && $skippedCount > 0) {
                $skippedText = implode(', ', array_slice($skippedNames, 0, 8));
                if ($skippedCount > 8) {
                    $skippedText .= ' (dan ' . ($skippedCount - 8) . ' lainnya)';
                }
                return redirect()->route('ormass.index')
                    ->with('warning', "Tidak ada data baru yang diimpor. Semua ({$skippedCount}) organisasi dalam file Excel sudah terdaftar di database: {$skippedText}");
            } else {
                return redirect()->route('ormass.index')
                    ->with('warning', 'File Excel telah dibaca, namun tidak ditemukan baris data organisasi yang valid.');
            }
        } catch (\Exception $e) {
            Log::error("Gagal import file Excel: " . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('ormass.index')->with('error', 'Gagal memproses file Excel: ' . $e->getMessage());
        }
    }

    public function inputManualStore(Request $request): RedirectResponse
    {
        // 1. Validasi input - Hanya nama_organisasi yang wajib, sisanya opsional
        $validated = $request->validate([
            'nama_organisasi'       => 'required|string|max:255',
            'bidang'                => 'nullable|string|max:255',
            'alamat'                => 'nullable|string',
            'sumber_data'           => 'nullable|string|max:255',
            'dokumen.akta_notaris'  => 'nullable|string|max:255',
            'dokumen.ahu_skt'       => 'nullable|string|max:255',
            'dokumen.npwp'          => 'nullable|string|max:255',
            'pengurus'              => 'nullable|array',
            'pengurus.*.nama'       => 'nullable|string|max:255',
            'pengurus.*.jabatan'    => 'nullable|string|in:Ketua,Sekretaris,Bendahara',
            'pengurus.*.no_telepon' => ['nullable', 'string', 'max:20', 'regex:/^[0-9+\-\s()]+$/'],
        ]);

        try {
            DB::transaction(function () use ($validated) {
                // 2. Simpan data ormas
                $ormas = Ormas::create([
                    'nama_organisasi' => $validated['nama_organisasi'],
                    'bidang'          => $validated['bidang'] ?? null,
                    'alamat'          => !empty($validated['alamat']) ? preg_replace('/<\/?(?:table|tbody|thead|tfoot|tr|th|td)\b[^>]*>/i', '', Purifier::clean($validated['alamat'])) : null,
                    'sumber_data'     => $validated['sumber_data'] ?? 'manual',
                ]);

                // 3. Simpan dokumen ormas (semua opsional)
                DokumenOrmas::create([
                    'ormas_id'      => $ormas->id,
                    'akta_notaris'  => $validated['dokumen']['akta_notaris'] ?? null,
                    'ahu_skt'       => $validated['dokumen']['ahu_skt'] ?? null,
                    'npwp'          => $validated['dokumen']['npwp'] ?? null,
                ]);

                // 4. Simpan setiap pengurus yang memiliki nama
                if (isset($validated['pengurus']) && is_array($validated['pengurus'])) {
                    foreach ($validated['pengurus'] as $p) {
                        if (!empty($p['nama'])) {
                            PengurusOrmas::create([
                                'ormas_id'   => $ormas->id,
                                'jabatan'    => $p['jabatan'] ?? null,
                                'nama'       => $p['nama'],
                                'no_telepon' => !empty($p['no_telepon']) ? $p['no_telepon'] : null,
                            ]);
                        }
                    }
                }
            });

            return redirect()
                ->route('ormass.index')
                ->with('success', 'Data organisasi berhasil disimpan');
        } catch (\Throwable $e) {
            Log::error('Gagal input manual ormas: '.$e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }


    public function edit(int $id): View|RedirectResponse
    {
        try {
            // Fetch the ormas with related data
            $ormas = Ormas::with(['pengurus', 'dokumenedit'])->findOrFail($id);
            
            return view('dashboard.ormass.edit', compact('ormas'));
        } catch (\Exception $e) {
            Log::error('Error saat mengambil data ormas untuk edit: '.$e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()
                ->route('ormass.index')
                ->with('error', 'Data organisasi tidak ditemukan');
        }
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        // 1. Validasi input - Hanya nama_organisasi yang wajib, sisanya opsional
        $validated = $request->validate([
            'nama_organisasi'       => 'required|string|max:255',
            'bidang'                => 'nullable|string|max:255',
            'alamat'                => 'nullable|string',
            'sumber_data'           => 'nullable|string|max:255',
            'dokumen.akta_notaris'  => 'nullable|string|max:255',
            'dokumen.ahu_skt'       => 'nullable|string|max:255',
            'dokumen.npwp'          => 'nullable|string|max:255',
            'pengurus'              => 'nullable|array',
            'pengurus.*.nama'       => 'nullable|string|max:255',
            'pengurus.*.jabatan'    => 'nullable|string|in:Ketua,Sekretaris,Bendahara',
            'pengurus.*.no_telepon' => ['nullable', 'string', 'max:20', 'regex:/^[0-9+\-\s()]+$/'],
            'pengurus.*.id'         => 'nullable|exists:pengurus_ormas,id',
        ]);

        try {
            // Cek apakah data ormas ada
            $ormas = Ormas::findOrFail($id);

            DB::transaction(function () use ($validated, $ormas) {
                // 2. Update data ormas
                $ormas->update([
                    'nama_organisasi' => $validated['nama_organisasi'],
                    'bidang'          => $validated['bidang'] ?? null,
                    'alamat'          => !empty($validated['alamat']) ? preg_replace('/<\/?(?:table|tbody|thead|tfoot|tr|th|td)\b[^>]*>/i', '', Purifier::clean($validated['alamat'])) : null,
                    'sumber_data'     => $validated['sumber_data'] ?? $ormas->sumber_data,
                ]);

                // 3. Update dokumen ormas
                if (isset($validated['dokumen']) && is_array($validated['dokumen'])) {
                    DokumenOrmas::updateOrCreate(
                        ['ormas_id' => $ormas->id],
                        [
                            'akta_notaris' => $validated['dokumen']['akta_notaris'] ?? null,
                            'ahu_skt'      => $validated['dokumen']['ahu_skt'] ?? null,
                            'npwp'         => $validated['dokumen']['npwp'] ?? null,
                        ]
                    );
                }

                // 4. Update pengurus
                if (isset($validated['pengurus']) && is_array($validated['pengurus'])) {
                    foreach ($validated['pengurus'] as $p) {
                        if (!empty($p['id'])) {
                            PengurusOrmas::where('id', $p['id'])
                                ->where('ormas_id', $ormas->id)
                                ->update([
                                    'nama'       => $p['nama'] ?? null,
                                    'no_telepon' => $p['no_telepon'] ?? null,
                                ]);
                        } else if (!empty($p['jabatan']) && !empty($p['nama'])) {
                            PengurusOrmas::create([
                                'ormas_id'   => $ormas->id,
                                'jabatan'    => $p['jabatan'],
                                'nama'       => $p['nama'],
                                'no_telepon' => $p['no_telepon'] ?? null,
                            ]);
                        }
                    }
                }
            });

            return redirect()
                ->route('ormass.index')
                ->with('success', 'Data organisasi berhasil diperbarui');
        } catch (\Throwable $e) {
            Log::error('Gagal update ormas: '.$e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()
                ->route('ormass.edit', $id)
                ->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy(int $id): RedirectResponse
    {
        try {
            // Find the Ormas
            $ormas = Ormas::findOrFail($id);
            
            // Use transaction to ensure data consistency
            DB::transaction(function () use ($ormas) {
                // Delete related data first to maintain referential integrity
                // This assumes cascading deletes aren't set up in the database
                PengurusOrmas::where('ormas_id', $ormas->id)->delete();
                DokumenOrmas::where('ormas_id', $ormas->id)->delete();
                
                // Finally delete the Ormas itself
                $ormas->delete();
            });
            
            return redirect()
                ->route('ormass.index')
                ->with('success', 'Data organisasi berhasil dihapus');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus ormas: '.$e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()
                ->route('ormass.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
    /**
     * Tampilkan riwayat semua sesi import Excel.
     */
    public function importHistory(): View
    {
        $batches = ImportBatch::withCount('ormass')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('dashboard.ormass.import-history', compact('batches'));
    }

    /**
     * Rollback (hapus) semua ormas yang masuk dari sesi import tertentu.
     */
    public function rollbackBatch(int $batchId): RedirectResponse
    {
        try {
            $batch = ImportBatch::findOrFail($batchId);
            $count = $batch->ormass()->count();

            DB::transaction(function () use ($batch) {
                // Hapus semua ormas milik batch ini (cascade akan hapus pengurus & dokumen)
                $batch->ormass()->delete();
                $batch->delete();
            });

            return redirect()
                ->route('ormass.import-history')
                ->with('success', "Berhasil mengembalikan data: {$count} organisasi dari import '{$batch->filename}' telah dihapus.");
        } catch (\Throwable $e) {
            Log::error('Gagal rollback import batch: ' . $e->getMessage(), [
                'batch_id' => $batchId,
                'trace'    => $e->getTraceAsString(),
            ]);
            return redirect()
                ->route('ormass.import-history')
                ->with('error', 'Gagal mengembalikan data: ' . $e->getMessage());
        }
    }
}
