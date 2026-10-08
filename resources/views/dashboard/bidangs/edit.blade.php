@extends('dashboard.layouts.app')

@section('title', 'Edit Bidang')

@section('content')
<div class="bidang-page-wrapper">
    <div class="bidang-form-card">
        <div class="bidang-form-header">
            <div class="d-flex align-items-center gap-3">
                <div class="bidang-avatar-icon theme-ideologi">
                    <i class="fas fa-pen-to-square"></i>
                </div>
                <div>
                    <h2 class="bidang-form-title">Edit Data Bidang</h2>
                    <p class="bidang-form-subtitle">Perbarui informasi dan struktur bidang Bakesbangpol Kota Bandung.</p>
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

            <form action="{{ route('bidangs.update', $bidang->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="bidang-form-group">
                    <label class="bidang-form-label" for="no_bidang">
                        <i class="fas fa-hashtag text-danger"></i>
                        <span>Nomor / Kode Bidang</span>
                    </label>
                    <input type="text" 
                           id="no_bidang"
                           name="no_bidang" 
                           value="{{ old('no_bidang', $bidang->no_bidang) }}" 
                           class="bidang-input-control @error('no_bidang') is-invalid @enderror" 
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
                           value="{{ old('nama_bidang', $bidang->nama_bidang) }}" 
                           class="bidang-input-control @error('nama_bidang') is-invalid @enderror" 
                           required>
                </div>

                <div class="bidang-form-actions">
                    <button type="submit" class="btn-form-save">
                        <i class="fas fa-floppy-disk"></i>
                        <span>Perbarui Bidang</span>
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
