@extends('dashboard.layouts.app')

@section('title', 'Galeri Kegiatan')

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif
                        <a href="{{ route('galeris.create') }}" class="btn-tambah-konten">
                            <i class="fas fa-plus fa-fw"></i> <span>Tambah Galeri Kegiatan</span>
                        </a>
                        <div class="article-table-wrap">
                            <table class="table article-table media-list-table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th class="gambar-col">Gambar</th>
                                        <th class="judul-col">Judul</th>
                                        <th class="konten-col">Kategori/Kegiatan</th>
                                        <th class="aksi-col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($galeris as $galeri)
                                        <tr class="article-row">
                                            <td class="post-image-cell">
                                                <img src="{{ asset('images/gallery/'.$galeri->gambar_upload) }}" alt="{{ $galeri->judul }}" class="post-thumbnail">
                                            </td>
                                            <td class="post-title-cell">
                                                <span class="article-cell-label">Judul</span>
                                                <div class="post-title">{{ $galeri->judul }}</div>
                                            </td>
                                            <td class="post-content-cell">
                                                <span class="article-cell-label">Kategori/Kegiatan</span>
                                                {{ $galeri->program->nama_program }}
                                            </td>
                                            <td class="kolom-aksi text-center">
                                                <span class="article-cell-label">Aksi</span>
                                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                                    <a href="{{ route('galeris.edit', $galeri->id) }}" class="btn btn-sm btn-warning action-btn" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('galeris.destroy', $galeri->id) }}" method="POST" class="d-inline"
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
                                            <td colspan="4" class="text-center">
                                                <div class="alert alert-warning">Data Galeri belum tersedia.</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $galeris->links('pagination::bootstrap-5') }}
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

