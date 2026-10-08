<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;

use App\Models\Bidang;
use App\Models\LandasanHukum;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Http\RedirectResponse;

class LandasanHukumController extends Controller
{
    public function index(Request $request): View
    {
        $count = LandasanHukum::count();
        $totalBidang = Bidang::count();
        $bidangs = Bidang::orderBy('no_bidang', 'asc')->get();

        $query = LandasanHukum::with('bidang');

        if ($request->filled('bidang_id')) {
            $query->where('bidang_id', $request->bidang_id);
        }

        if ($request->filled('jenis')) {
            $query->where('jenis_peraturan', $request->jenis);
        }

        if ($request->filled('q')) {
            $search = trim($request->q);
            $query->where(function ($q) use ($search) {
                $q->where('jenis_peraturan', 'like', "%{$search}%")
                  ->orWhere('nomor_peraturan', 'like', "%{$search}%")
                  ->orWhere('tahun_peraturan', 'like', "%{$search}%")
                  ->orWhere('tentang', 'like', "%{$search}%");
            });
        }

        $hukum = $query->orderBy('tahun_peraturan', 'desc')
                       ->orderBy('id', 'desc')
                       ->paginate(12)
                       ->withQueryString();

        $jenisList = LandasanHukum::select('jenis_peraturan')
                        ->distinct()
                        ->orderBy('jenis_peraturan', 'asc')
                        ->pluck('jenis_peraturan');

        $latestYear = LandasanHukum::max('tahun_peraturan') ?? date('Y');

        return view('dashboard.landasanhukum.index', compact('hukum', 'count', 'totalBidang', 'bidangs', 'jenisList', 'latestYear'));
    }

    public function create(): View
    {
        $bidangs = Bidang::orderBy('no_bidang', 'asc')->get();
        return view('dashboard.landasanhukum.create', compact('bidangs'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'bidang_id' => 'required|exists:bidangs,id',
            'jenis_peraturan' => 'required|string|max:255',
            'nomor_peraturan' => 'required|string|max:255',
            'tahun_peraturan' => 'required|integer',
            'tentang' => 'required|string',
        ]);

        LandasanHukum::create([
            'bidang_id' => $request->bidang_id,
            'jenis_peraturan' => $request->jenis_peraturan,
            'nomor_peraturan' => $request->nomor_peraturan,
            'tahun_peraturan' => $request->tahun_peraturan,
            'tentang' => Purifier::clean($request->tentang),
        ]);

        return redirect()->route('landasanhukum.index')->with('success', 'Data dasar hukum berhasil disimpan.');
    }

    public function edit($id): View
    {
        $landasanHukum = LandasanHukum::findOrFail($id);
        $bidangs = Bidang::orderBy('no_bidang', 'asc')->get();
        return view('dashboard.landasanhukum.edit', compact('landasanHukum', 'bidangs'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'bidang_id' => 'required|exists:bidangs,id',
            'jenis_peraturan' => 'required|string|max:255',
            'nomor_peraturan' => 'required|string|max:255',
            'tahun_peraturan' => 'required|integer',
            'tentang' => 'required|string',
        ]);

        $hukum = LandasanHukum::findOrFail($id);

        $hukum->update([
            'bidang_id' => $request->bidang_id,
            'jenis_peraturan' => $request->jenis_peraturan,
            'nomor_peraturan' => $request->nomor_peraturan,
            'tahun_peraturan' => $request->tahun_peraturan,
            'tentang' => Purifier::clean($request->tentang),
        ]);

        return redirect()->route('landasanhukum.index')->with('success', 'Data dasar hukum berhasil diperbarui!');
    }

    public function destroy($id): RedirectResponse
    {
        $hukum = LandasanHukum::findOrFail($id);
        $hukum->delete();
        return redirect()->route('landasanhukum.index')->with('success', 'Data dasar hukum berhasil dihapus!');
    }
}
