<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;

use App\Models\Program;
use App\Models\Bidang;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index(Request $request): View
    {
        $count = Program::count();
        $totalBidangs = Bidang::count();
        $bidangs = Bidang::withCount('programs')->orderBy('no_bidang', 'asc')->get();

        $query = Program::with('bidang');

        if ($request->filled('bidang_id')) {
            $query->where('bidang_id', $request->bidang_id);
        }

        if ($request->filled('q')) {
            $search = trim($request->q);
            $query->where(function ($q) use ($search) {
                $q->where('nama_program', 'like', "%{$search}%")
                  ->orWhereHas('bidang', function ($qb) use ($search) {
                      $qb->where('nama_bidang', 'like', "%{$search}%");
                  });
            });
        }

        $programs = $query->latest()->paginate(12)->withQueryString();

        $programsByBidang = Bidang::with('programs')->orderBy('no_bidang', 'asc')->get();

        return view('dashboard.programs.index', compact('programs', 'count', 'totalBidangs', 'bidangs', 'programsByBidang'));
    }

    public function create(): View 
    {
        $bidangs = Bidang::orderBy('no_bidang', 'asc')->get();
        return view('dashboard.programs.create', compact('bidangs'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'bidang_id' => 'required|exists:bidangs,id',
            'nama_program' => 'required|string|min:3|max:255',
        ]);

        Program::create([
            'bidang_id' => $request->bidang_id,
            'nama_program' => $request->nama_program,
        ]);
        return redirect()->route('programs.index')->with('success', 'Data program kerja berhasil ditambahkan.');
    }

    public function edit(string $id): View
    {
        $programs = Program::findOrFail($id);
        $bidangs = Bidang::orderBy('no_bidang', 'asc')->get();
        return view('dashboard.programs.edit', compact('programs', 'bidangs'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'bidang_id' => 'required|exists:bidangs,id',
            'nama_program' => 'required|string|min:3|max:255',
        ]);

        $program = Program::findOrFail($id);

        $program->update([
            'bidang_id' => $request->bidang_id,
            'nama_program' => $request->nama_program,
        ]);

        return redirect()->route('programs.index')->with('success', 'Data program kerja berhasil diperbarui!');
    }

    public function destroy($id): RedirectResponse
    {
        $program = Program::findOrFail($id);
        $program->delete();
        return redirect()->route('programs.index')->with('success', 'Data program kerja berhasil dihapus!');
    }

    
    public function getProgramsByBidang(Request $request)
    {
        $programs = Program::where('bidang_id', $request->bidang_id)->get();
        return response()->json($programs);
    }
}