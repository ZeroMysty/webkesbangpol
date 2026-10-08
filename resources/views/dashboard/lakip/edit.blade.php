@extends('dashboard.layouts.app')

@section('title', 'Edit Laporan AKIP')

@section('content')
<div class="sakip-page-wrapper">

    {{-- Breadcrumb Navigation --}}
    <div class="mb-4 d-flex align-items-center justify-content-between flex-wrap gap-2">
        <a href="{{ route('lakip.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-2 d-inline-flex align-items-center gap-2">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali ke Daftar LAKIP</span>
        </a>
        <div class="badge bg-light text-secondary border px-3 py-2 rounded-pill">
            <i class="fas fa-file-shield me-1 text-danger"></i> SAKIP & Akuntabilitas Instansi
        </div>
    </div>

    {{-- Form Card --}}
    <div class="sakip-form-card">
        <div class="sakip-form-header">
            <h2 class="sakip-form-title">
                <i class="fas fa-pen-to-square me-2 text-danger"></i>Edit Dokumen LAKIP
            </h2>
            <p class="sakip-form-subtitle">
                Perbarui judul dokumen, tahun periode, atau unggah perbaikan berkas Laporan Kinerja Instansi Pemerintah.
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

            <form action="{{ route('lakip.update', $lakip->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="sakip-form-group">
                    <label for="title" class="sakip-form-label">
                        <i class="fas fa-heading text-danger"></i>
                        <span>Judul Laporan AKIP <span class="text-danger">*</span></span>
                    </label>
                    <input type="text" 
                           class="sakip-input-control @error('title') is-invalid @enderror" 
                           id="title" 
                           name="title" 
                           value="{{ old('title', $lakip->title) }}" 
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
                           value="{{ old('tahun', $lakip->tahun) }}" 
                           min="2000" 
                           max="2099" 
                           required 
                           autocomplete="off">
                    @error('tahun')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    {{-- File Asli --}}
                    <div class="col-md-6">
                        <div class="sakip-form-group">
                            <label for="file_upload" class="sakip-form-label">
                                <i class="fas fa-file-pdf text-danger"></i>
                                <span>Ganti Berkas Asli (PDF)</span>
                            </label>

                            @if($lakip->file_upload)
                                <div class="sakip-file-status-box">
                                    <div class="d-flex align-items-center gap-2 overflow-hidden text-truncate">
                                        <i class="fas fa-file-pdf text-danger fs-5"></i>
                                        <span class="small text-truncate fw-semibold">{{ basename($lakip->file_upload) }}</span>
                                    </div>
                                    <a href="{{ asset($lakip->file_upload) }}" target="_blank" class="btn btn-sm btn-outline-danger rounded-pill px-2 py-1 ms-2" style="font-size: 0.75rem;">
                                        <i class="fas fa-eye me-1"></i> Lihat
                                    </a>
                                </div>
                            @endif

                            <input type="file" 
                                   class="sakip-input-control @error('file_upload') is-invalid @enderror" 
                                   id="file_upload" 
                                   name="file_upload" 
                                   accept=".pdf,.doc,.docx">
                            <small class="text-muted d-block mt-1">
                                <i class="fas fa-circle-info me-1"></i> Kosongkan jika tidak ingin mengubah berkas asli saat ini.
                            </small>
                            @error('file_upload')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- File Watermark --}}
                    <div class="col-md-6">
                        <div class="sakip-form-group">
                            <label for="file_upload_wm" class="sakip-form-label">
                                <i class="fas fa-stamp text-primary"></i>
                                <span>Ganti Berkas Watermark (PDF)</span>
                            </label>

                            @if($lakip->file_upload_wm)
                                <div class="sakip-file-status-box">
                                    <div class="d-flex align-items-center gap-2 overflow-hidden text-truncate">
                                        <i class="fas fa-stamp text-primary fs-5"></i>
                                        <span class="small text-truncate fw-semibold">{{ basename($lakip->file_upload_wm) }}</span>
                                    </div>
                                    <a href="{{ asset($lakip->file_upload_wm) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 ms-2" style="font-size: 0.75rem;">
                                        <i class="fas fa-eye me-1"></i> Lihat
                                    </a>
                                </div>
                            @endif

                            <input type="file" 
                                   class="sakip-input-control @error('file_upload_wm') is-invalid @enderror" 
                                   id="file_upload_wm" 
                                   name="file_upload_wm" 
                                   accept=".pdf,.doc,.docx">
                            <small class="text-muted d-block mt-1">
                                <i class="fas fa-circle-info me-1"></i> Kosongkan jika tidak ingin mengubah berkas watermark publik.
                            </small>
                            @error('file_upload_wm')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="sakip-form-actions">
                    <button type="submit" class="btn-tambah-sakip-modern">
                        <i class="fas fa-check"></i>
                        <span>Perbarui Dokumen LAKIP</span>
                    </button>
                    <a href="{{ route('lakip.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

</div>
@stop
