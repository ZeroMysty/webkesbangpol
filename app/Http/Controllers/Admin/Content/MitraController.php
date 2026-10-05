<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Services\ImageOptimizer;

class MitraController extends Controller
{
    public function index(): View
    {
        $mitras = Mitra::latest()->paginate(5);
        return view('dashboard.mitras.index', compact('mitras'));
    }

    public function create(): View
    {
        $mitras = Mitra::all();
        return view('dashboard.mitras.create', compact('mitras'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'kategori_mitra' => 'required|in:FORKOPIMDA,KPU,BAWASLU,BNN,PARPOL,FKDM,FKUB,FPK',
            'logo_lembaga' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'nama_lembaga' => 'required|string|min:5|max:155',
            'alamat' => 'required|string|min:10',
            'deskripsi' => 'required|string|min:10',
            'foto_ketua' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            // PERBAIKAN: Mengizinkan kolom 'ketua' untuk kosong (nullable)
            'ketua' => 'nullable|string|max:155',
            'kontak' => 'nullable|string|min:1|max:255',
        ]);

        // Default null
        $logoName = null;
        $fotoName = null;

        // Upload logo lembaga (jika ada)
        if ($request->hasFile('logo_lembaga')) {
            $logoFile = $request->file('logo_lembaga');
            $baseName = 'logo_' . Str::slug($request->nama_lembaga) . '_' . time();
            $logoName = ImageOptimizer::uploadAndOptimize(
                $logoFile,
                public_path('images/mitras/logo'),
                $baseName,
                500,
                85
            );
        }

        // Upload foto ketua (jika ada)
        if ($request->hasFile('foto_ketua')) {
            $fotoFile = $request->file('foto_ketua');
            $baseName = 'ketua_' . Str::slug($request->ketua ?? 'ketua') . '_' . time();
            $fotoName = ImageOptimizer::uploadAndOptimize(
                $fotoFile,
                public_path('images/mitras/foto_ketua'),
                $baseName,
                600,
                80
            );
        }

        // Simpan ke database
        Mitra::create([
            'kategori_mitra' => $request->kategori_mitra,
            'logo_lembaga' => $logoName,
            'nama_lembaga' => $request->nama_lembaga,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'foto_ketua' => $fotoName,
            'ketua' => $request->ketua,
            'kontak' => $request->kontak,
        ]);

        return redirect()->route('mitras.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id) { /* kosong */ }

    public function edit(string $id): View
    {
        $mitra = Mitra::findOrFail($id);
        return view('dashboard.mitras.edit', compact('mitra'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'kategori_mitra' => 'required|in:FORKOPIMDA,KPU,BAWASLU,BNN,PARPOL,FKDM,FKUB,FPK',
            'logo_lembaga' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'nama_lembaga' => 'required|string|min:5|max:155',
            'alamat' => 'required|string|min:10',
            'deskripsi' => 'required|string|min:10',
            'foto_ketua' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            // PERBAIKAN: Mengizinkan kolom 'ketua' untuk kosong (nullable)
            'ketua' => 'nullable|string|max:155',
            'kontak' => 'nullable|string|min:1|max:255',
        ]);

        $mitra = Mitra::findOrFail($id);

        $updateData = [
            'kategori_mitra' => $request->kategori_mitra,
            'nama_lembaga' => $request->nama_lembaga,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'ketua' => $request->ketua,
            'kontak' => $request->kontak,
        ];

        // Logo baru
        if ($request->hasFile('logo_lembaga')) {
            if ($mitra->logo_lembaga) {
                $oldLogo = public_path('images/mitras/logo/' . $mitra->logo_lembaga);
                if (file_exists($oldLogo)) unlink($oldLogo);
            }

            $logoFile = $request->file('logo_lembaga');
            $baseName = 'logo_' . Str::slug($request->nama_lembaga) . '_' . time();
            $logoName = ImageOptimizer::uploadAndOptimize(
                $logoFile,
                public_path('images/mitras/logo'),
                $baseName,
                500,
                85
            );

            $updateData['logo_lembaga'] = $logoName;
        }

        // Foto ketua baru
        if ($request->hasFile('foto_ketua')) {
            if ($mitra->foto_ketua) {
                $oldFoto = public_path('images/mitras/foto_ketua/' . $mitra->foto_ketua);
                if (file_exists($oldFoto)) unlink($oldFoto);
            }

            $fotoFile = $request->file('foto_ketua');
            $baseName = 'ketua_' . Str::slug($request->ketua ?? 'ketua') . '_' . time();
            $fotoName = ImageOptimizer::uploadAndOptimize(
                $fotoFile,
                public_path('images/mitras/foto_ketua'),
                $baseName,
                600,
                80
            );

            $updateData['foto_ketua'] = $fotoName;
        }

        $mitra->update($updateData);

        return redirect()->route('mitras.index')->with(['success' => 'Data Berhasil Diperbarui!']);
    }

    public function destroy(string $id): RedirectResponse
    {
        $mitra = Mitra::findOrFail($id);

        // Hapus file terkait jika ada
        if ($mitra->logo_lembaga) {
            $logoPath = public_path('images/mitras/logo/' . $mitra->logo_lembaga);
            if (file_exists($logoPath)) unlink($logoPath);
        }

        if ($mitra->foto_ketua) {
            $fotoPath = public_path('images/mitras/foto_ketua/' . $mitra->foto_ketua);
            if (file_exists($fotoPath)) unlink($fotoPath);
        }

        $mitra->delete();

        return redirect()->route('mitras.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
