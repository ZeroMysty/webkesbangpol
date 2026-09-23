<?php

namespace App\Http\Controllers\Admin\Sakip;

use App\Http\Controllers\Controller;
use App\Models\LaporanKajian;
use Illuminate\Http\Request;

class LaporanKajianController extends Controller
{
    public function index()
    {
        $laporankajians = LaporanKajian::paginate(5);
        return view('dashboard.laporankajian.index', compact('laporankajians'));
    }

    public function create()
    {
        return view('dashboard.laporankajian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tahun' => 'nullable|digits:4|integer',
            'file_upload' => 'required|file|mimes:pdf|max:10240',
        ]);

        // === Proses file original ===
        $fileOriginal = $request->file('file_upload');
        $originalFileName = time() . '_' . $fileOriginal->getClientOriginalName();
        $originalFilePath = 'document/laporankajian/' . $originalFileName;
        $fileOriginal->move(public_path('document/laporankajian'), $originalFileName);

        $tanggal = $request->tanggal;
        $tahun = $request->tahun;
        if ($tanggal) {
            $tahun = \Carbon\Carbon::parse($tanggal)->year;
        }

        // === Simpan ke DB ===
        LaporanKajian::create([
            'title' => $request->title,
            'tanggal' => $tanggal,
            'tahun' => $tahun ?? date('Y'),
            'file_upload' => $originalFilePath,
        ]);

        return redirect()->route('laporankajian.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id)
    {
        $laporankajian = LaporanKajian::findOrFail($id);
        return view('dashboard.laporankajian.edit', compact('laporankajian'));
    }

    public function update(Request $request, $id)
    {
        $laporankajian = LaporanKajian::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tahun' => 'nullable|digits:4|integer',
            'file_upload' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $filePath = $laporankajian->file_upload;

        // === Update file original ===
        if ($request->hasFile('file_upload')) {
            if ($filePath && file_exists(public_path($filePath))) {
                unlink(public_path($filePath));
            }

            $fileOriginal = $request->file('file_upload');
            $originalFileName = time() . '_' . $fileOriginal->getClientOriginalName();
            $filePath = 'document/laporankajian/' . $originalFileName;
            $fileOriginal->move(public_path('document/laporankajian'), $originalFileName);
        }

        $tanggal = $request->tanggal ?? $laporankajian->tanggal;
        $tahun = $request->tahun ?? $laporankajian->tahun;
        if ($request->filled('tanggal')) {
            $tahun = \Carbon\Carbon::parse($request->tanggal)->year;
        }

        $laporankajian->update([
            'title' => $request->title,
            'tanggal' => $tanggal,
            'tahun' => $tahun,
            'file_upload' => $filePath,
        ]);

        return redirect()->route('laporankajian.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $laporankajian = LaporanKajian::findOrFail($id);

        if ($laporankajian->file_upload && file_exists(public_path($laporankajian->file_upload))) {
            unlink(public_path($laporankajian->file_upload));
        }

        $laporankajian->delete();
        return redirect()->route('laporankajian.index')->with('success', 'Data berhasil dihapus.');
    }
}
