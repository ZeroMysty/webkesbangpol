@extends('dashboard.layouts.app')

@section('title', 'Edit Laporan Kajian')

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
                <i class="fas fa-pen-to-square me-2 text-danger"></i>Edit Laporan Kajian
            </h2>
            <p class="sakip-form-subtitle">
                Perbarui judul kajian, tanggal penerbitan, atau unggah berkas revisi naskah laporan hasil analisis kebijakan.
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

            <form action="{{ route('laporankajian.update', $laporankajian->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="sakip-form-group">
                    <label for="title" class="sakip-form-label">
                        <i class="fas fa-heading text-danger"></i>
                        <span>Judul Laporan Kajian <span class="text-danger">*</span></span>
                    </label>
                    <input type="text" 
                           class="sakip-input-control @error('title') is-invalid @enderror" 
                           id="title" 
                           name="title" 
                           value="{{ old('title', $laporankajian->title) }}" 
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
                    @php
                        $formattedDate = $laporankajian->tanggal 
                            ? \Carbon\Carbon::parse($laporankajian->tanggal)->format('Y-m-d') 
                            : ($laporankajian->tahun ? $laporankajian->tahun . '-01-01' : date('Y-m-d'));
                    @endphp
                    <input type="date" 
                           class="sakip-input-control @error('tanggal') is-invalid @enderror" 
                           id="tanggal" 
                           name="tanggal" 
                           value="{{ old('tanggal', $formattedDate) }}" 
                           required>
                    @error('tanggal')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="sakip-form-group">
                    <label for="file_upload" class="sakip-form-label">
                        <i class="fas fa-file-pdf text-danger"></i>
                        <span>Ganti Berkas Laporan Kajian (PDF)</span>
                    </label>

                    @if($laporankajian->file_upload)
                        <div class="sakip-file-status-box">
                            <div class="d-flex align-items-center gap-2 overflow-hidden text-truncate">
                                <i class="fas fa-file-pdf text-danger fs-5"></i>
                                <span class="small text-truncate fw-semibold">{{ basename($laporankajian->file_upload) }}</span>
                            </div>
                            <a href="{{ asset($laporankajian->file_upload) }}" target="_blank" class="btn btn-sm btn-outline-danger rounded-pill px-2 py-1 ms-2" style="font-size: 0.75rem;">
                                <i class="fas fa-eye me-1"></i> Lihat Berkas
                            </a>
                        </div>
                    @endif

                    <input type="file" 
                           class="sakip-input-control @error('file_upload') is-invalid @enderror" 
                           id="file_upload" 
                           name="file_upload" 
                           accept=".pdf">
                    <small class="text-muted d-block mt-1">
                        <i class="fas fa-circle-info me-1"></i> Format berkas PDF (Maks. 10 MB). Kosongkan jika tidak ingin mengubah berkas saat ini.
                    </small>
                    @error('file_upload')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="sakip-form-actions">
                    <button type="submit" class="btn-tambah-sakip-modern">
                        <i class="fas fa-check"></i>
                        <span>Perbarui Laporan Kajian</span>
                    </button>
                    <a href="{{ route('laporankajian.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

</div>
@stop
