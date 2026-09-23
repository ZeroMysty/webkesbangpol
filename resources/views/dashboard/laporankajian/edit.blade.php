@extends('dashboard.layouts.app')

@section('title', 'Edit Laporan Kajian')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('laporankajian.update', $laporankajian->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="title-laporankajian" class="form-label font-weight-bold">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title-laporankajian" name="title" value="{{ old('title', $laporankajian->title) }}" required autocomplete="off">
                                    @error('title')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="tanggal" class="form-label font-weight-bold">Tanggal</label>
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $laporankajian->tanggal ? \Carbon\Carbon::parse($laporankajian->tanggal)->format('Y-m-d') : ($laporankajian->tahun ? $laporankajian->tahun.'-01-01' : date('Y-m-d'))) }}" required>
                                    @error('tanggal')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="file_upload" class="form-label font-weight-bold">Ganti File PDF (jika perlu)</label>
                                <input type="file" class="form-control @error('file_upload') is-invalid @enderror" id="file_upload" name="file_upload" accept=".pdf">
                                <small class="form-text text-muted">Hanya file berformat PDF. Kosongkan jika tidak ingin mengganti file.</small>
                                @if($laporankajian->file_upload)
                                    <p class="mt-2">File saat ini: <a href="{{ asset($laporankajian->file_upload) }}" target="_blank">Lihat File</a></p>
                                @endif
                                @error('file_upload')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <a href="{{ route('laporankajian.index') }}" class="btn btn-md btn-secondary">BATAL</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    
@stop
