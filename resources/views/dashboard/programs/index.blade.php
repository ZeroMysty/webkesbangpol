@extends('dashboard.layouts.app')

@section('title', 'Program')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('programs.create') }}" class="btn-tambah-konten">
                            <i class="fas fa-plus"></i> <span>Tambah Program</span>
                        </a>
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered program-table">
                                <thead class="table-light">
                                    <tr>
                                        <th class="kolom-nama_program" scope="col">NAMA PROGRAM</th>
                                        <th class="kolom-bidang" scope="col">BIDANG</th>
                                        <th class="kolom-aksi" scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($programs as $program)
                                        <tr>
                                            <td class="kolom-nama_program">
                                                {{ $program->nama_program }}
                                            </td>
                                            <td class="kolom-bidang">
                                                {{ $program->bidang->nama_bidang ?? '-' }}
                                            </td>
                                            <td class="kolom-aksi text-center">
                                                <a href="{{ route('programs.edit', $program->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('programs.destroy', $program->id) }}" method="POST" class="d-inline"
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
                                                <div class="alert alert-warning text-center m-0">Belum ada data Program.</div>
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            
                        </div>
                        {{ $programs->links('pagination::bootstrap-5') }}

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
