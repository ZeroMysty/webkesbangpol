@extends('dashboard.layouts.app')

@section('title', 'Tambah Profil Organisasi')

@section('content')
<div class="visimisi-page-wrapper">
    <div class="visimisi-form-card">
        <div class="visimisi-form-header">
            <div class="d-flex align-items-center gap-3">
                <div class="visimisi-stat-icon-wrapper stat-icon-red">
                    <i class="fas fa-plus"></i>
                </div>
                <div>
                    <h2 class="visimisi-form-title">Tambah Profil Organisasi</h2>
                    <p class="visimisi-form-subtitle">Tambahkan dokumen resmi visi, misi, tugas pokok & fungsi, serta sejarah kelembagaan Bakesbangpol Kota Bandung.</p>
                </div>
            </div>
        </div>

        <div class="visimisi-form-body">
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

            <form action="{{ route('visimisis.store') }}" method="POST" enctype="multipart/form-data">   
                @csrf

                {{-- VISI --}}
                <div class="visimisi-form-group">
                    <label class="visimisi-form-label" for="visi">
                        <i class="fas fa-eye text-danger"></i>
                        <span>Visi Lembaga</span>
                    </label>
                    <textarea class="visimisi-input-control @error('visi') is-invalid @enderror" 
                              name="visi" 
                              id="visi" 
                              rows="4" 
                              placeholder="Masukkan rumusan visi organisasi...">{{ old('visi') }}</textarea>
                    <small class="text-muted d-block mt-1">Cita-cita strategis pembangunan jangka panjang organisasi.</small>
                    @error('visi')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- MISI --}}
                <div class="visimisi-form-group">
                    <label class="visimisi-form-label" for="misi">
                        <i class="fas fa-bullseye text-danger"></i>
                        <span>Misi Organisasi</span>
                    </label>
                    <textarea class="visimisi-input-control @error('misi') is-invalid @enderror" 
                              name="misi" 
                              id="misi" 
                              rows="6" 
                              placeholder="Masukkan poin-poin misi (gunakan daftar bernomor &lt;ol&gt; &lt;li&gt; untuk tampilan kartu rapi)...">{{ old('misi') }}</textarea>
                    <small class="text-muted d-block mt-1">Poin-poin misi akan otomatis ditampilkan menjadi kartu pilar bernomor yang elegan.</small>
                    @error('misi')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TUPOKSI --}}
                <div class="visimisi-form-group">
                    <label class="visimisi-form-label" for="tupoksi">
                        <i class="fas fa-list-check text-danger"></i>
                        <span>Tugas Pokok &amp; Fungsi (Tupoksi)</span>
                    </label>
                    <textarea class="visimisi-input-control @error('tupoksi') is-invalid @enderror" 
                              name="tupoksi" 
                              id="tupoksi" 
                              rows="7" 
                              placeholder="Uraikan tugas pokok dan rincian fungsi penyelenggaraan...">{{ old('tupoksi') }}</textarea>
                    @error('tupoksi')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- FOTO SEJARAH --}}
                <div class="visimisi-form-group">
                    <label class="visimisi-form-label" for="image">
                        <i class="fas fa-camera text-danger"></i>
                        <span>Foto Dokumentasi Sejarah</span>
                    </label>
                    <input type="file" 
                           class="visimisi-input-control @error('image') is-invalid @enderror" 
                           name="image" 
                           id="image" 
                           accept=".jpg,.jpeg,.png,.webp" 
                           required>
                    <small class="text-muted d-block mt-1">Format JPG, JPEG, PNG, atau WebP (maksimal 2MB).</small>
                    @error('image')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- SEJARAH --}}
                <div class="visimisi-form-group">
                    <label class="visimisi-form-label" for="sejarah">
                        <i class="fas fa-landmark text-danger"></i>
                        <span>Sejarah Kelembagaan</span>
                    </label>
                    <textarea class="visimisi-input-control @error('sejarah') is-invalid @enderror" 
                              name="sejarah" 
                              id="sejarah" 
                              rows="8" 
                              placeholder="Uraikan sejarah pembentukan, dasar hukum perda, dan transformasi kelembagaan...">{{ old('sejarah') }}</textarea>
                    @error('sejarah')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TOMBOL AKSI --}}
                <div class="visimisi-form-actions">
                    <button type="submit" class="btn-form-save">
                        <i class="fas fa-floppy-disk"></i>
                        <span>Simpan Data Profil</span>
                    </button>
                    <a href="{{ route('visimisis.index') }}" class="btn-form-back">
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
<link rel="stylesheet" href="{{ asset('assets/css/dashboard-visimisi.css') }}">
@endpush