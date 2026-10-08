@extends('dashboard.layouts.app')

@section('title', 'Tambah Pengukuran Kerja')

@section('content')
<div class="sakip-page-wrapper">

    {{-- Breadcrumb Navigation --}}
    <div class="mb-4 d-flex align-items-center justify-content-between flex-wrap gap-2">
        <a href="{{ route('ukurkerja.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-2 d-inline-flex align-items-center gap-2">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali ke Daftar Pengukuran</span>
        </a>
        <div class="badge bg-light text-secondary border px-3 py-2 rounded-pill">
            <i class="fas fa-square-poll-vertical me-1 text-danger"></i> SAKIP & Pengukuran Kinerja
        </div>
    </div>

    {{-- Form Card --}}
    <div class="sakip-form-card">
        <div class="sakip-form-header">
            <h2 class="sakip-form-title">
                <i class="fas fa-file-circle-plus me-2 text-danger"></i>Tambah Dokumen Pengukuran
            </h2>
            <p class="sakip-form-subtitle">
                Isi rincian judul pengukuran kinerja, tahun periode, serta unggah berkas PDF resmi ke dalam sistem.
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

            <form action="{{ route('ukurkerja.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="sakip-form-group">
                    <label for="title" class="sakip-form-label">
                        <i class="fas fa-heading text-danger"></i>
                        <span>Judul Pengukuran Kinerja <span class="text-danger">*</span></span>
                    </label>
                    <input type="text" 
                           class="sakip-input-control @error('title') is-invalid @enderror" 
                           id="title" 
                           name="title" 
                           value="{{ old('title') }}" 
                           placeholder="Contoh: Pengukuran Capaian Kinerja Triwulan IV Tahun 2024" 
                           required 
                           autocomplete="off">
                    @error('title')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="sakip-form-group">
                    <label for="tahun" class="sakip-form-label">
                        <i class="fas fa-calendar-alt text-danger"></i>
                        <span>Tahun Periode <span class="text-danger">*</span></span>
                    </label>
                    <input type="number" 
                           class="sakip-input-control @error('tahun') is-invalid @enderror" 
                           id="tahun" 
                           name="tahun" 
                           value="{{ old('tahun', date('Y')) }}" 
                           placeholder="Contoh: 2024" 
                           min="2000" 
                           max="2099" 
                           required 
                           autocomplete="off">
                    @error('tahun')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="sakip-form-group">
                            <label for="file_upload" class="sakip-form-label">
                                <i class="fas fa-file-pdf text-danger"></i>
                                <span>Unggah Berkas Asli (PDF) <span class="text-danger">*</span></span>
                            </label>
                            <input type="file" 
                                   class="sakip-input-control @error('file_upload') is-invalid @enderror" 
                                   id="file_upload" 
                                   name="file_upload" 
                                   accept=".pdf,.doc,.docx" 
                                   required>
                            <small class="text-muted d-block mt-1">
                                <i class="fas fa-circle-info me-1"></i> Format berkas PDF / Dokumen (Maks. 5 MB).
                            </small>
                            @error('file_upload')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="sakip-form-group">
                            <label for="file_upload_wm" class="sakip-form-label">
                                <i class="fas fa-stamp text-primary"></i>
                                <span>Unggah Berkas Watermark (PDF) <span class="text-danger">*</span></span>
                            </label>
                            <input type="file" 
                                   class="sakip-input-control @error('file_upload_wm') is-invalid @enderror" 
                                   id="file_upload_wm" 
                                   name="file_upload_wm" 
                                   accept=".pdf,.doc,.docx" 
                                   required>
                            <small class="text-muted d-block mt-1">
                                <i class="fas fa-circle-info me-1"></i> Berkas bertanda watermark untuk publikasi (Maks. 5 MB).
                            </small>
                            @error('file_upload_wm')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="sakip-form-actions">
                    <button type="submit" class="btn-tambah-sakip-modern">
                        <i class="fas fa-floppy-disk"></i>
                        <span>Simpan Pengukuran Kerja</span>
                    </button>
                    <button type="reset" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                        <i class="fas fa-rotate-left me-1"></i> Reset
                    </button>
                    <a href="{{ route('ukurkerja.index') }}" class="btn btn-link text-muted ms-auto">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

</div>
@stop