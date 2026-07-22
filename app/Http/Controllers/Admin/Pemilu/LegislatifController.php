<?php

namespace App\Http\Controllers\Admin\Pemilu;

use App\Http\Controllers\Controller;

use App\Models\Legislatif;
use Illuminate\Http\Request;
use App\Imports\LegislatifSheetImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class LegislatifController extends Controller
{
    // ... (fungsi index, create, store, edit, update, destroy Anda tetap sama)

    public function index(Request $request)
    {
        $query = Legislatif::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', '%' . $search . '%')
                  ->orWhere('nama_partai', 'like', '%' . $search . '%')
                  ->orWhere('dapil', 'like', '%' . $search . '%');
            });
        }
        
        $legislatifs = $query->orderBy('dapil')->orderBy('nama_partai')->orderBy('no_urut')->paginate(10);
        return view('dashboard.pemilu_raya.legislatif.index', compact('legislatifs'));
    }

    public function create()
    {
        return view('dashboard.pemilu_raya.legislatif.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_urut' => 'required|integer',
            'nama_lengkap' => 'required|string|max:255',
            'nama_partai' => 'required|string|max:255',
            'logo_partai' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'tempat_lahir' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'dapil' => 'required|string|max:255',
            'suara_sah' => 'required|integer|min:0',
            'riwayat_pendidikan' => 'nullable|string',
            'riwayat_pekerjaan' => 'nullable|string',
        ]);

        // Upload logo partai (opsional). Kalau partai yang sama sudah
        // pernah punya logo di kandidat lain, tidak wajib upload ulang —
        // halaman publik akan otomatis pakai logo yang sudah ada.
        $uploadPath = 'images/pemilu';
        if ($request->hasFile('logo_partai')) {
            $file = $request->file('logo_partai');
            $filename = time() . '_partai_' . $file->hashName();
            $file->move(public_path($uploadPath), $filename);
            $validated['logo_partai'] = $uploadPath . '/' . $filename;
        } else {
            // Belum upload di form ini -> coba warisi logo dari kandidat lain
            // yang partainya sama, biar tidak perlu upload berkali-kali.
            $existingLogo = Legislatif::where('nama_partai', $validated['nama_partai'])
                ->whereNotNull('logo_partai')
                ->value('logo_partai');
            if ($existingLogo) {
                $validated['logo_partai'] = $existingLogo;
            }
        }

        Legislatif::create($validated);

        return redirect()->route('admin.pemilu.legislatif.index')->with('success', 'Data calon legislatif berhasil ditambahkan.');
    }

    public function edit(Legislatif $legislatif)
    {
        return view('dashboard.pemilu_raya.legislatif.edit', compact('legislatif'));
    }

    public function update(Request $request, Legislatif $legislatif)
    {
        $validated = $request->validate([
            'no_urut' => 'required|integer',
            'nama_lengkap' => 'required|string|max:255',
            'nama_partai' => 'required|string|max:255',
            'logo_partai' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'tempat_lahir' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'dapil' => 'required|string|max:255',
            'suara_sah' => 'required|integer|min:0',
            'riwayat_pendidikan' => 'nullable|string',
            'riwayat_pekerjaan' => 'nullable|string',
        ]);

        $uploadPath = 'images/pemilu';
        if ($request->hasFile('logo_partai')) {
            if ($legislatif->logo_partai && file_exists(public_path($legislatif->logo_partai))) {
                unlink(public_path($legislatif->logo_partai));
            }
            $file = $request->file('logo_partai');
            $filename = time() . '_partai_' . $file->hashName();
            $file->move(public_path($uploadPath), $filename);
            $validated['logo_partai'] = $uploadPath . '/' . $filename;
        } else {
            // Tidak upload baru -> pertahankan logo yang sudah ada di baris ini
            unset($validated['logo_partai']);
        }

        $legislatif->update($validated);

        return redirect()->route('admin.pemilu.legislatif.index')->with('success', 'Data calon legislatif berhasil diperbarui.');
    }

    public function destroy(Legislatif $legislatif)
    {
        $legislatif->delete();
        return redirect()->route('admin.pemilu.legislatif.index')->with('success', 'Data calon legislatif berhasil dihapus.');
    }

    public function destroyAll()
    {
        Legislatif::truncate();
        return redirect()->route('admin.pemilu.legislatif.index')->with('success', 'Semua data calon legislatif berhasil dihapus.');
    }

    // public function terpilih()
    // {
    //     $calegTerpilih = Legislatif::where('status', 'terpilih')->get();
    //     return view('dashboard.pemilu_raya.legislatif.terpilih', compact('calegTerpilih'));
    // }

    public function showImportForm()
    {
        return view('dashboard.pemilu_raya.legislatif.import');
    }

    /**
     * Handle the Excel file import.
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        try {
            Excel::import(new LegislatifSheetImport, $request->file('file'));

            return redirect()->route('admin.pemilu.legislatif.index')->with('success', "Data calon legislatif berhasil diimpor/diperbarui.");

        } catch (ValidationException $e) {
            $failures = $e->failures();
            $errorMessages = [];
            foreach ($failures as $failure) {
                 $errorMessages[] = "Baris " . $failure->row() . ": " . implode(', ', $failure->errors());
            }
            return redirect()->back()->with('import_errors', $errorMessages);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi error saat mengimpor file: ' . $e->getMessage());
        }
    }
//     public function terpilih()
// {
//     // Ambil caleg dengan status terpilih (sesuai struktur tabel kamu)
//     $calegTerpilih = Legislatif::where('status', 'terpilih')
//         ->orderBy('dapil')
//         ->orderBy('nama_partai')
//         ->orderBy('no_urut')
//         ->get();

//     return view('pemilu.legislatif.terpilih', compact('calegTerpilih'));
// }

}