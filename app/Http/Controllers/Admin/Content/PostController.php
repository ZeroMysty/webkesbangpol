<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;

use App\Models\Program;
use App\Models\Bidang;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;
use App\Services\ImageOptimizer;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $count = Post::count();
        $query = Post::with(['bidang', 'program'])->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($request->filled('bidang_id')) {
            $query->where('bidang_id', $request->bidang_id);
        }

        $posts = $query->paginate(9)->withQueryString();
        $bidangs = Bidang::orderBy('no_bidang', 'asc')->get();
        $thisMonthCount = Post::whereMonth('created_at', now()->month)
                              ->whereYear('created_at', now()->year)
                              ->count();

        return view('dashboard.artikel.index', compact('posts', 'count', 'bidangs', 'thisMonthCount'));
    }

    public function create(): View
    {
        $programs = Program::all();
        $bidangs = Bidang::all();
        return view('dashboard.artikel.create', compact('bidangs', 'programs'));
    }



    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'bidang_id' => 'required|exists:bidangs,id',
            'program_id' => 'required|exists:programs,id', 
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:5120',
            'title' => 'required|string|min:5|max:255',
            'content' => 'required|string|min:10',
            'created_at' => 'nullable|date',
        ]);

            // Membuat slug dari judul
        $slug = Str::slug($request->title);

        // Pastikan slug unik dengan memeriksa apakah sudah ada di database
        $originalSlug = $slug;
        $counter = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $image = $request->file('image');
        $imageName = ImageOptimizer::uploadAndOptimize(
            $image,
            public_path('images/posts'),
            time() . '_' . $slug
        );

        $postData = [
            'bidang_id' => $request->bidang_id,
            'program_id' => $request->program_id,
            'image' => $imageName,
            'title' => $request->title,
            'content' => Purifier::clean($request->content),
            'slug' => $slug,
        ];

        if ($request->filled('created_at')) {
            $postData['created_at'] = \Carbon\Carbon::parse($request->created_at);
        }

        Post::create($postData);

        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        $post = Post::findOrFail($id);
        return view('dashboard.artikel.show', compact('post'));
    }

    public function edit(string $id): View
    {
        $post = Post::findOrFail($id);
        $programs = Program::all();
        $bidangs = Bidang::all(); // Ambil semua bidang
        return view('dashboard.artikel.edit', compact('post', 'bidangs', 'programs'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'bidang_id' => 'required|exists:bidangs,id',
            'program_id' => 'required|exists:programs,id', 
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'title' => 'required|string|min:5|max:255',
            'content' => 'required|string|min:10',
            'created_at' => 'nullable|date',
        ]);


        $post = Post::findOrFail($id);

        // Membuat slug dari judul, hanya jika ada perubahan title
        $slug = Str::slug($request->title);

        // Pastikan slug unik
        $originalSlug = $slug;
        $counter = 1;
        while (Post::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
    
        $updateData = [
            'bidang_id' => $request->bidang_id,
            'program_id' => $request->program_id,
            'title' => $request->title,
            'content' => Purifier::clean($request->content),
            'slug' => $slug
        ];

        if ($request->hasFile('image')) {
            // Upload & optimasi gambar baru
            $image = $request->file('image');
            $imageName = ImageOptimizer::uploadAndOptimize(
                $image,
                public_path('images/posts'),
                time() . '_' . $slug
            );
    
            // Hapus gambar lama jika ada
            if (!empty($post->image)) {
                $oldImagePath = public_path('images/posts/' . $post->image);

                if (file_exists($oldImagePath) && is_file($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $updateData['image'] = $imageName;
        }

        if ($request->filled('created_at')) {
            $updateData['created_at'] = \Carbon\Carbon::parse($request->created_at);
        }

        $post->update($updateData);

        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $post = Post::findOrFail($id);
    
        // Hapus file gambar
        $imagePath = public_path('images/posts/' . $post->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    
        // Hapus data
        $post->delete();
    
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }


}