@extends('dashboard.layouts.app')

@section('title', 'Landasan Hukum')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('landasanhukum.create') }}" class="btn-tambah-konten">
                            <i class="fas fa-plus"></i> <span>Tambah Hukum</span>
                        </a>
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="kolom-bidang text-start">BIDANG</th>
                                        <th scope="col" class="kolom-nama text-start">PRODUK HUKUM</th>
                                        <th scope="col" class="kolom-nip">TENTANG</th>
                                        <th scope="col" class="kolom-aksi text-center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($hukum as $item)
                                        <tr>
                                            <td>{{ $item->bidang_id }}</td>
                                            <td>{{ $item->jenis_peraturan }} No. {{ $item->nomor_peraturan }} Tahun {{ $item->tahun_peraturan }}</td>
                                            <td>{!! $item->tentang !!}</td> 
                                            <td class="kolom-aksi text-center">
                                                <a href="{{ route('landasanhukum.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('landasanhukum.destroy', $item->id) }}" method="POST" class="d-inline"
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
                                            <td colspan="3">
                                                <div class="alert alert-warning text-center m-0">Belum ada data Hukum.</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $hukum->links('pagination::bootstrap-5') }}

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

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-struktur.css') }}">
@stop

@section('js')
    
@stop