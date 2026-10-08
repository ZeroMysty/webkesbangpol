@extends('dashboard.layouts.app')

@section('title', 'Edit Dasar Hukum')

@section('content')
<div class="hukum-page-wrapper">
    <div class="hukum-form-card">
        <div class="hukum-form-header">
            <div class="d-flex align-items-center gap-3">
                <div class="hukum-stat-icon-wrapper stat-icon-amber">
                    <i class="fas fa-pen-to-square"></i>
                </div>
                <div>
                    <h2 class="hukum-form-title">Edit Dasar Hukum</h2>
                    <p class="hukum-form-subtitle">Perbarui informasi regulasi atau ketetapan hukum pada basis data Bakesbangpol Kota Bandung.</p>
                </div>
            </div>
        </div>

        <div class="hukum-form-body">
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

            <form action="{{ route('landasanhukum.update', $landasanHukum->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="hukum-form-group">
                    <label for="bidang_id" class="hukum-form-label">
                        <i class="fas fa-sitemap text-danger"></i>
                        <span>Bidang Pengampu Regulasi</span>
                    </label>
                    <select name="bidang_id" id="bidang_id" class="hukum-input-control @error('bidang_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Bidang Terkait --</option>
                        @foreach ($bidangs as $bidang)
                            <option value="{{ $bidang->id }}" {{ old('bidang_id', $landasanHukum->bidang_id) == $bidang->id ? 'selected' : '' }}>
                                Bidang #{{ $bidang->no_bidang }} - {{ $bidang->nama_bidang }}
                            </option>
                        @endforeach
                    </select>
                    @error('bidang_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <div class="hukum-form-group">
                            <label for="jenis_peraturan" class="hukum-form-label">
                                <i class="fas fa-scale-balanced text-danger"></i>
                                <span>Jenis Peraturan</span>
                            </label>
                            <input type="text" 
                                   list="jenisListOptions"
                                   class="hukum-input-control @error('jenis_peraturan') is-invalid @enderror" 
                                   id="jenis_peraturan" 
                                   name="jenis_peraturan" 
                                   value="{{ old('jenis_peraturan', $landasanHukum->jenis_peraturan) }}" 
                                   placeholder="Contoh: UU, PP, Perpres, Permendagri, Perwal, Kepwal..." 
                                   required>
                            <datalist id="jenisListOptions">
                                <option value="UU">Undang-Undang</option>
                                <option value="PP">Peraturan Pemerintah</option>
                                <option value="Perpres">Peraturan Presiden</option>
                                <option value="Permendagri">Peraturan Menteri Dalam Negeri</option>
                                <option value="Perda">Peraturan Daerah</option>
                                <option value="Perwal">Peraturan Wali Kota</option>
                                <option value="Kepwal">Keputusan Wali Kota</option>
                                <option value="Peraturan KPU">Peraturan Komisi Pemilihan Umum</option>
                                <option value="Keputusan KPU">Keputusan Komisi Pemilihan Umum</option>
                                <option value="Surat Edaran">Surat Edaran</option>
                            </datalist>
                            @error('jenis_peraturan')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="hukum-form-group">
                            <label for="nomor_peraturan" class="hukum-form-label">
                                <i class="fas fa-hashtag text-danger"></i>
                                <span>Nomor Peraturan</span>
                            </label>
                            <input type="text" 
                                   class="hukum-input-control @error('nomor_peraturan') is-invalid @enderror" 
                                   id="nomor_peraturan" 
                                   name="nomor_peraturan" 
                                   value="{{ old('nomor_peraturan', $landasanHukum->nomor_peraturan) }}" 
                                   placeholder="Contoh: 7 atau 300/Kep.7-BKBP" 
                                   required>
                            @error('nomor_peraturan')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="hukum-form-group">
                            <label for="tahun_peraturan" class="hukum-form-label">
                                <i class="far fa-calendar-alt text-danger"></i>
                                <span>Tahun</span>
                            </label>
                            <input type="number" 
                                   class="hukum-input-control @error('tahun_peraturan') is-invalid @enderror" 
                                   id="tahun_peraturan" 
                                   name="tahun_peraturan" 
                                   value="{{ old('tahun_peraturan', $landasanHukum->tahun_peraturan) }}" 
                                   min="1945" 
                                   max="2099" 
                                   required>
                            @error('tahun_peraturan')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="hukum-form-group">
                    <label for="tentang" class="hukum-form-label">
                        <i class="fas fa-file-lines text-danger"></i>
                        <span>Tentang / Pokok Pengaturan</span>
                    </label>
                    <textarea class="hukum-input-control @error('tentang') is-invalid @enderror" 
                              id="tentang" 
                              name="tentang" 
                              rows="6" 
                              required>{{ old('tentang', $landasanHukum->tentang) }}</textarea>
                    <small class="text-muted d-block mt-1">Uraikan secara jelas muatan pokok, pasal relevan, atau tugas dan wewenang yang diatur.</small>
                    @error('tentang')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="hukum-form-actions">
                    <button type="submit" class="btn-form-save">
                        <i class="fas fa-floppy-disk"></i>
                        <span>Simpan Perubahan</span>
                    </button>
                    <a href="{{ route('landasanhukum.index') }}" class="btn-form-back">
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
<link rel="stylesheet" href="{{ asset('assets/css/dashboard-landasanhukum.css') }}">
@endpush