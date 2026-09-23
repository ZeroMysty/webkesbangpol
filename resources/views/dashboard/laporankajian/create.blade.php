@extends('dashboard.layouts.app')

@section('title', 'Tambah Laporan Kajian')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('laporankajian.store') }}" method="POST" enctype="multipart/form-data">   
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="title-laporankajian" class="form-label font-weight-bold">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title-laporankajian" name="title" value="{{ old('title') }}" placeholder="Masukkan Judul Laporan" required autocomplete="off">
                                    @error('title')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="tanggal" class="form-label font-weight-bold">Tanggal</label>
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                                    @error('tanggal')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="file_upload" class="form-label font-weight-bold">Upload File (PDF)</label>
                                <input type="file" class="form-control @error('file_upload') is-invalid @enderror" id="file_upload" name="file_upload" required accept=".pdf">
                                <small class="text-muted">Hanya file berformat PDF yang diperbolehkan.</small>
                                @error('file_upload')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    
@stop
