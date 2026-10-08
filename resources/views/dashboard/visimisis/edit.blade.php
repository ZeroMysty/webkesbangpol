@extends('dashboard.layouts.app')

@section('title', 'Edit Profil Organisasi')

@section('content')
<div class="visimisi-page-wrapper">
    <div class="visimisi-form-card">
        <div class="visimisi-form-header">
            <div class="d-flex align-items-center gap-3">
                <div class="visimisi-stat-icon-wrapper stat-icon-amber">
                    <i class="fas fa-pen-to-square"></i>
                </div>
                <div>
                    <h2 class="visimisi-form-title">Edit Profil Organisasi</h2>
                    <p class="visimisi-form-subtitle">Perbarui visi, misi, tugas pokok & fungsi, serta sejarah Badan Kesatuan Bangsa dan Politik Kota Bandung.</p>
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

            <form action="{{ route('visimisis.update', $visimisis->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

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
                              placeholder="Masukkan rumusan visi organisasi...">{{ old('visi', $visimisis->visi) }}</textarea>
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
                              placeholder="Masukkan poin-poin misi (gunakan daftar bernomor &lt;ol&gt; &lt;li&gt; untuk tampilan kartu rapi)...">{{ old('misi', $visimisis->misi) }}</textarea>
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
                              placeholder="Uraikan tugas pokok dan rincian fungsi penyelenggaraan...">{{ old('tupoksi', $visimisis->tupoksi) }}</textarea>
                    @error('tupoksi')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- FOTO SEJARAH --}}
                <div class="visimisi-form-group">
                    <label class="visimisi-form-label">
                        <i class="fas fa-camera text-danger"></i>
                        <span>Foto Dokumentasi Sejarah</span>
                    </label>

                    @php
                        $imageSrc = asset('images/component/sejarah_image.png');
                        if ($visimisis->sejarah_image && file_exists(public_path('images/component/' . $visimisis->sejarah_image))) {
                            $imageSrc = asset('images/component/' . $visimisis->sejarah_image);
                        }
                    @endphp

                    <div class="visimisi-image-upload-preview">
                        <div class="visimisi-thumb-box">
                            <img src="{{ $imageSrc }}" alt="Pratinjau Foto Sejarah" id="imgPreview">
                        </div>
                        <div>
                            <span class="fw-bold text-dark d-block">Foto Dokumentasi Saat Ini</span>
                            <span class="text-muted small">Pilih file baru jika ingin mengganti foto dokumentasi (format JPG, PNG, atau WebP, maks. 2MB).</span>
                        </div>
                    </div>

                    <input type="file" 
                           class="visimisi-input-control @error('image') is-invalid @enderror" 
                           name="image" 
                           id="imageInput"
                           accept=".jpg,.jpeg,.png,.webp">
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
                              placeholder="Uraikan sejarah pembentukan, dasar hukum perda, dan transformasi kelembagaan...">{{ old('sejarah', $visimisis->sejarah) }}</textarea>
                    @error('sejarah')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TOMBOL AKSI --}}
                <div class="visimisi-form-actions">
                    <button type="submit" class="btn-form-save">
                        <i class="fas fa-floppy-disk"></i>
                        <span>Simpan Perubahan Profil</span>
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

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const imageInput = document.getElementById('imageInput');
        const imgPreview = document.getElementById('imgPreview');

        if (imageInput && imgPreview) {
            imageInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        imgPreview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    });
</script>
@endpush