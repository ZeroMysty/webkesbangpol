@extends('dashboard.layouts.app')

@section('title', 'Tambah Laporan Kajian')

@section('content')
<div class="sakip-page-wrapper">

    {{-- Breadcrumb Navigation --}}
    <div class="mb-4 d-flex align-items-center justify-content-between flex-wrap gap-2">
        <a href="{{ route('laporankajian.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-2 d-inline-flex align-items-center gap-2">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali ke Daftar Laporan Kajian</span>
        </a>
        <div class="badge bg-light text-secondary border px-3 py-2 rounded-pill">
            <i class="fas fa-book-open-reader me-1 text-danger"></i> SAKIP & Riset Kebijakan
        </div>
    </div>

    {{-- Form Card --}}
    <div class="sakip-form-card">
        <div class="sakip-form-header">
            <h2 class="sakip-form-title">
                <i class="fas fa-file-circle-plus me-2 text-danger"></i>Tambah Laporan Kajian
            </h2>
            <p class="sakip-form-subtitle">
                Isi judul kajian, tanggal penerbitan, serta unggah berkas naskah laporan hasil penelitian atau analisis kebijakan.
            </p>
        </div>

        <div class="sakip-form-body">
            @if ($errors->any())
                <div class="alert-modern-feedback alert-danger mb-4">
                    <i class="fas fa-circle-exclamation fs-5"></i>
                    <div>
                        <strong>Terjadi Kesalahan Pengisian Form:</strong>
                        <ul class="mb-0 mt-1 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('laporankajian.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="sakip-form-group">
                    <label for="title" class="sakip-form-label">
                        <i class="fas fa-heading text-danger"></i>
                        <span>Judul Laporan Kajian <span class="text-danger">*</span></span>
                    </label>
                    <input type="text" 
                           class="sakip-input-control @error('title') is-invalid @enderror" 
                           id="title" 
                           name="title" 
                           value="{{ old('title') }}" 
                           placeholder="Contoh: Kajian Indeks Kerukunan Umat Beragama di Kota Bandung Tahun 2024" 
                           required 
                           autocomplete="off">
                    @error('title')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="sakip-form-group">
                    <label for="tanggal" class="sakip-form-label">
                        <i class="fas fa-calendar-day text-danger"></i>
                        <span>Tanggal Penerbitan Kajian <span class="text-danger">*</span></span>
                    </label>
                    <input type="date" 
                           class="sakip-input-control @error('tanggal') is-invalid @enderror" 
                           id="tanggal" 
                           name="tanggal" 
                           value="{{ old('tanggal', date('Y-m-d')) }}" 
                           required>
                    @error('tanggal')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="sakip-form-group">
                    <label for="file_upload" class="sakip-form-label">
                        <i class="fas fa-file-pdf text-danger"></i>
                        <span>Unggah Berkas Laporan Kajian (PDF) <span class="text-danger">*</span></span>
                    </label>
                    <input type="file" 
                           class="sakip-input-control @error('file_upload') is-invalid @enderror" 
                           id="file_upload" 
                           name="file_upload" 
                           accept=".pdf" 
                           required>
                    <small class="text-muted d-block mt-1">
                        <i class="fas fa-circle-info me-1"></i> Format berkas PDF (Maks. 10 MB).
                    </small>
                    @error('file_upload')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="sakip-form-actions">
                    <button type="submit" class="btn-tambah-sakip-modern">
                        <i class="fas fa-floppy-disk"></i>
                        <span>Simpan Laporan Kajian</span>
                    </button>
                    <button type="reset" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                        <i class="fas fa-rotate-left me-1"></i> Reset
                    </button>
                    <a href="{{ route('laporankajian.index') }}" class="btn btn-link text-muted ms-auto">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

</div>
@stop
