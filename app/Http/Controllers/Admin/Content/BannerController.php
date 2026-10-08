<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Services\ImageOptimizer;

class BannerController extends Controller
{
    public function index(Request $request): View
    {
        $count = Banner::count();
        $query = Banner::latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('caption', 'like', "%{$search}%");
            });
        }

        $banners = $query->paginate(9)->withQueryString();
        return view('dashboard.banners.index', compact('banners', 'count'));
    }

    public function create(): View 
    {
        return view('dashboard.banners.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'judul' => 'required|string|min:5|max:100',
            'caption' => 'required|string|min:5|max:100',
            'image'   => 'required|image|mimes:jpeg,jpg,png,webp|max:5120',

        ]);

        $image = $request->file('image');
        $slugJudul = Str::slug($request->input('judul')); // misal: "upacara-hut-ri"
        $tanggal   = Carbon::now()->format('Ymd');        // misal: "20250523"
        $baseName  = "{$slugJudul}_{$tanggal}";

        $imageName = ImageOptimizer::uploadAndOptimize(
            $image,
            public_path('images/banner'),
            $baseName
        );
        
        Banner::create([
            'judul' => $request->judul,
            'caption' => $request->caption,
            'gambar_upload' => $imageName,
        ]);
        return redirect()->route('banners.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $banners = Banner::findOrFail($id);
        return view('dashboard.banners.edit', compact('banners'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'judul' => 'required|string|min:5|max:100',
            'caption' => 'required|string|min:5|max:100',
            'image'   => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);

        $banners = Banner::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $slugJudul = Str::slug($request->judul);
            $tanggal = Carbon::now()->format('Ymd');
            $baseName = "{$slugJudul}_{$tanggal}";

            // Hapus gambar lama jika ada
            $oldImagePath = public_path('images/banner/' . $banners->gambar_upload);
            if (file_exists($oldImagePath) && is_file($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Upload & optimasi gambar baru ke WebP
            $imageName = ImageOptimizer::uploadAndOptimize(
                $image,
                public_path('images/banner'),
                $baseName
            );

            $banners->update([
                'judul' => $request->judul,
                'caption' => $request->caption,
                'gambar_upload' => $imageName,
            ]);
        } else {
            // Jika tidak ada gambar baru
            $banners->update([
                'judul' => $request->judul,
                'caption' => $request->caption,
            ]);
        }

        return redirect()->route('banners.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function destroy($id): RedirectResponse
    {
        $banners = Banner::findOrFail($id);
        $banners->delete();
        return redirect()->route('banners.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
