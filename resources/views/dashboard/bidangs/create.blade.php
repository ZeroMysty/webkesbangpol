@extends('dashboard.layouts.app')

@section('title', 'Tambah Bidang')

@section('content')
<div class="bidang-page-wrapper">
    <div class="bidang-form-card">
        <div class="bidang-form-header">
            <div class="d-flex align-items-center gap-3">
                <div class="bidang-avatar-icon theme-kewaspadaan">
                    <i class="fas fa-plus"></i>
                </div>
                <div>
                    <h2 class="bidang-form-title">Tambah Bidang Baru</h2>
                    <p class="bidang-form-subtitle">Tambahkan unit bidang ke dalam struktur organisasi Bakesbangpol Kota Bandung.</p>
                </div>
            </div>
        </div>

        <div class="bidang-form-body">
            @if (isset($errors) && $errors->any())
                <div class="alert-modern-feedback alert-danger mb-4">
                    <i class="fas fa-circle-exclamation fs-5"></i>
                    <div>
                        <strong>Terjadi Kesalahan:</strong>
                        <ul class="mb-0 mt-1 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('bidangs.store') }}" method="POST">
                @csrf
                <div class="bidang-form-group">
                    <label class="bidang-form-label" for="no_bidang">
                        <i class="fas fa-hashtag text-danger"></i>
                        <span>Nomor / Kode Bidang</span>
                    </label>
                    <input type="text" 
                           id="no_bidang"
                           name="no_bidang" 
                           value="{{ old('no_bidang') }}" 
                           class="bidang-input-control @error('no_bidang') is-invalid @enderror" 
                           placeholder="Contoh: 1 atau 01" 
                           required>
                    <small class="text-muted d-block mt-1">Nomor urut bidang untuk susunan bagan dan pengelompokan program.</small>
                </div>

                <div class="bidang-form-group">
                    <label class="bidang-form-label" for="nama_bidang">
                        <i class="fas fa-building text-danger"></i>
                        <span>Nama Lengkap Bidang</span>
                    </label>
                    <input type="text" 
                           id="nama_bidang"
                           name="nama_bidang" 
                           value="{{ old('nama_bidang') }}" 
                           class="bidang-input-control @error('nama_bidang') is-invalid @enderror" 
                           placeholder="Contoh: Bidang Kewaspadaan Nasional dan Penanganan Konflik" 
                           required>
                </div>

                <div class="bidang-form-actions">
                    <button type="submit" class="btn-form-save">
                        <i class="fas fa-floppy-disk"></i>
                        <span>Simpan Bidang</span>
                    </button>
                    <a href="{{ route('bidangs.index') }}" class="btn-form-back">
                        <i class="fas fa-arrow-left"></i>
                        <span>Kembali</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
