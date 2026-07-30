@extends('dashboard.layouts.app')

@section('title', 'Mitra')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif
                        <a href="{{ route('mitras.create') }}" class="btn-tambah-konten">
                            <i class="fas fa-plus fa-fw"></i> <span>Tambah Mitra</span>
                        </a>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th>Kategori</th>
                                        <th>Logo Lembaga</th>
                                        <th>Nama Lembaga</th>
                                        <th>Alamat</th>
                                        <th>Deskripsi</th>
                                        <th>Ketua</th>
                                        <th>Foto Ketua</th>
                                        <th>Kontak</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($mitras as $mitra)
                                        <tr>
                                            <td class="fw-semibold">{{ $mitra->kategori_mitra }}</td>
                                            <td>
                                                <img src="{{ asset('images/mitras/logo/'.$mitra->logo_lembaga) }}" alt="{{ $mitra->nama_lembaga }}" class="img-thumbnail" style="width: 120px; height: auto;">
                                            </td>
                                            <td class="fw-semibold">{{ $mitra->nama_lembaga }}</td>
                                            <td class="text-start">{!! Str::limit(strip_tags($mitra->alamat), 100, '...') !!}</td>
                                            <td class="text-start">{!! Str::limit(strip_tags($mitra->deskripsi), 100, '...') !!}</td>
                                            <td class="fw-semibold">{{ $mitra->ketua }}</td>
                                            <td>
                                                <img src="{{ asset('images/mitras/foto_ketua/'.$mitra->foto_ketua) }}" alt="{{ $mitra->ketua }}" class="img-thumbnail" style="width: 120px; height: auto;">
                                            </td>
                                            <td class="fw-semibold">{{ $mitra->kontak }}</td>
                                            <td class="kolom-aksi text-center">
                                                <a href="{{ route('mitras.edit', $mitra->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('mitras.destroy', $mitra->id) }}" method="POST" class="d-inline"
                                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">
                                                <div class="alert alert-warning">Data mitra belum tersedia.</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $mitras->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-crud.css') }}">
@endpush

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
@stop


