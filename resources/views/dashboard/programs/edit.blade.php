@extends('dashboard.layouts.app')

@section('title', 'Edit Program Kerja')

@section('content')
<div class="program-page-wrapper">
    <div class="program-form-card">
        <div class="program-form-header">
            <div class="d-flex align-items-center gap-3">
                <div class="program-stat-icon-wrapper stat-icon-amber">
                    <i class="fas fa-pen-to-square"></i>
                </div>
                <div>
                    <h2 class="program-form-title">Edit Program Kerja</h2>
                    <p class="program-form-subtitle">Perbarui informasi agenda kegiatan atau pembagian bidang tugas Bakesbangpol Kota Bandung.</p>
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

            <form action="{{ route('programs.update', $programs->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Bidang --}}
                <div class="program-form-group">
                    <label for="bidang_id" class="program-form-label">
                        <i class="fas fa-sitemap text-danger"></i>
                        <span>Bidang Kerja Pengampu</span>
                    </label>
                    <select name="bidang_id" id="bidang_id" class="program-input-control @error('bidang_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Bidang Terkait --</option>
                        @foreach ($bidangs as $bidang)
                            <option value="{{ $bidang->id }}" {{ old('bidang_id', $programs->bidang_id) == $bidang->id ? 'selected' : '' }}>
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
                           value="{{ old('nama_program', $programs->nama_program) }}" 
                           placeholder="Masukkan Nama Program"
                           required>
                    @error('nama_program')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol Aksi --}}
                <div class="program-form-actions">
                    <button type="submit" class="btn-form-save">
                        <i class="fas fa-floppy-disk"></i>
                        <span>Simpan Perubahan Program</span>
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