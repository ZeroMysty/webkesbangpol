@extends('dashboard.layouts.app')

@section('title', 'Tambah Program Kerja')

@section('content')
<div class="program-page-wrapper">
    <div class="program-form-card">
        <div class="program-form-header">
            <div class="d-flex align-items-center gap-3">
                <div class="program-stat-icon-wrapper stat-icon-red">
                    <i class="fas fa-plus"></i>
                </div>
                <div>
                    <h2 class="program-form-title">Tambah Program Kerja Baru</h2>
                    <p class="program-form-subtitle">Tambahkan agenda kegiatan atau inisiatif kerja ke dalam bidang tugas terkait.</p>
                </div>
            </div>
        </div>

        <div class="program-form-body">
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

            <form action="{{ route('programs.store') }}" method="POST">   
                @csrf

                {{-- Bidang --}}
                <div class="program-form-group">
                    <label for="bidang_id" class="program-form-label">
                        <i class="fas fa-sitemap text-danger"></i>
                        <span>Bidang Kerja Pengampu</span>
                    </label>
                    <select name="bidang_id" id="bidang_id"
                        class="program-input-control @error('bidang_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Bidang Terkait --</option>
                        @foreach ($bidangs as $bidang)
                            <option value="{{ $bidang->id }}"
                                {{ old('bidang_id') == $bidang->id ? 'selected' : '' }}>
                                Bidang #{{ $bidang->no_bidang }} - {{ $bidang->nama_bidang }}
                            </option>
                        @endforeach
                    </select>
                    @error('bidang_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Nama Program --}}
                <div class="program-form-group">
                    <label for="nama_program" class="program-form-label">
                        <i class="fas fa-list-check text-danger"></i>
                        <span>Nama Program / Agenda Kegiatan</span>
                    </label>
                    <input type="text" 
                           name="nama_program" 
                           id="nama_program"
                           class="program-input-control @error('nama_program') is-invalid @enderror"
                           value="{{ old('nama_program') }}" 
                           placeholder="Contoh: Bimtek Peningkatan Kewaspadaan Dini Ormas" 
                           required 
                           autocomplete="off">
                    <small class="text-muted d-block mt-1">Nama lengkap inisiatif atau agenda kegiatan resmi yang akan dilaksanakan.</small>
                    @error('nama_program')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol Aksi --}}
                <div class="program-form-actions">
                    <button type="submit" class="btn-form-save">
                        <i class="fas fa-floppy-disk"></i>
                        <span>Simpan Program Kerja</span>
                    </button>
                    <a href="{{ route('programs.index') }}" class="btn-form-back">
                        <i class="fas fa-arrow-left"></i>
                        <span>Kembali</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard-program.css') }}">
@endpush