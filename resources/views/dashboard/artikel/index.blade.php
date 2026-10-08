@extends('dashboard.layouts.app')

@section('title', 'Artikel')

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif
                        <a href="{{ route('posts.create') }}" class="btn-tambah-konten">
                            <i class="fas fa-plus fa-fw"></i> <span>Tambah Artikel</span>
                        </a>
                        <div class="article-table-wrap">
                            <table class="table article-table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th class="gambar-col">Gambar</th>
                                        <th class="judul-col">Judul</th>
                                        <th class="konten-col">Konten</th>
                                        <th class="tanggal-col">Tanggal</th>
                                        <th class="aksi-col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($posts as $post)
                                        <tr class="article-row">
                                            <td class="post-image-cell">
                                                <img src="{{ asset('images/posts/'.$post->image) }}" alt="{{ $post->title }}" class="post-thumbnail">
                                            </td>
                                            <td class="post-title-cell">
                                                <span class="article-cell-label">Judul</span>
                                                <div class="post-title">{{ $post->title }}</div>
                                            </td>
                                            <td class="post-content-cell">
                                                <span class="article-cell-label">Ringkasan</span>
                                                <span>{!! Str::limit(strip_tags($post->content), 120, '...') !!}</span>
                                            </td>
                                            <td class="post-date-cell">
                                                <span class="article-cell-label">Tanggal</span>
                                                <span>{{ $post->created_at ? \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') : '-' }}</span>
                                            </td>
                                            <td class="kolom-aksi text-center">
                                                <span class="article-cell-label">Aksi</span>
                                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning action-btn" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline"
                                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                        @csrf @method('DELETE')
                                                        <button class="btn btn-sm btn-danger action-btn" title="Hapus">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                <div class="alert alert-warning">Data Post belum tersedia.</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $posts->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
@stop

