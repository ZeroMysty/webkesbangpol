<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;

use App\Models\Program;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Services\ImageOptimizer;

class GaleriController extends Controller
{
    public function index(Request $request): View
    {
        $count = Galeri::count();
        $query = Galeri::with('program')->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('judul', 'like', "%{$search}%");
        }

        if ($request->filled('program_id')) {
            $query->where('program_id', $request->program_id);
        }

        $galeris = $query->paginate(9)->withQueryString();
        $programs = Program::all();
        return view('dashboard.galeris.index', compact('galeris', 'count', 'programs'));
    }

    public function create(): View 
    {
        $programs = Program::all();
        return view('dashboard.galeris.create', compact('programs'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'judul' => 'required|string|min:5|max:34',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:5120',

        ]);

        $image = $request->file('image');
        $slugJudul = Str::slug($request->input('judul')); // misal: "upacara-hut-ri"
        $tanggal   = Carbon::now()->format('Ymd');        // misal: "20250523"
        $baseName  = "{$slugJudul}_{$tanggal}";

        $imageName = ImageOptimizer::uploadAndOptimize(
            $image,
            public_path('images/gallery'),
            $baseName
        );
        
        Galeri::create([
            'program_id' => $request->program_id,
            'judul' => $request->judul,
            'gambar_upload' => $imageName,
        ]);
        return redirect()->route('galeris.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $galeris = Galeri::findOrFail($id);
        $programs = Program::all();
        return view('dashboard.galeris.edit', compact('galeris', 'programs'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'judul' => 'required|string|min:5|max:34',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);

        $galeris = Galeri::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $slugJudul = Str::slug($request->judul);
            $tanggal = Carbon::now()->format('Ymd');
            $baseName = "{$slugJudul}_{$tanggal}";

            // Hapus gambar lama jika ada
            $oldImagePath = public_path('images/gallery/' . $galeris->gambar_upload);
            if (file_exists($oldImagePath) && is_file($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Upload & optimasi gambar baru ke WebP
            $imageName = ImageOptimizer::uploadAndOptimize(
                $image,
                public_path('images/gallery'),
                $baseName
            );

            $galeris->update([
                'program_id' => $request->program_id,
                'judul' => $request->judul,
                'gambar_upload' => $imageName,
            ]);
        } else {
            // Jika tidak ada gambar baru
            $galeris->update([
                'program_id' => $request->program_id,
                'judul' => $request->judul,
            ]);
        }

        return redirect()->route('galeris.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function destroy($id): RedirectResponse
    {
        $galeris = Galeri::findOrFail($id);
        $galeris->delete();
        return redirect()->route('galeris.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
