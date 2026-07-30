@extends('landingpage.layouts.app')
@section('title', 'Informasi Pemilihan Umum')

@section('content')
{{-- Main Content --}}
<div class="container py-5">
    {{-- Header --}}
    <div class="row text-center mb-5">
        <div class="col">
            <div class="section-header">
                <h2 class="section-title">INFORMASI PEMILIHAN UMUM</h2>
                <div class="title-divider mx-auto"></div>
                <p class="section-subtitle">Pilih jenis pemilihan untuk melihat daftar kandidat yang telah ditetapkan</p>
            </div>
        </div>
    </div>

    {{-- Cards --}}
    <div class="row justify-content-center">
        {{-- KARTU PILPRES --}}
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card gov-card shadow-lg h-100">
                <div class="card-header bg-gradient-red text-white text-center py-4">
                    <div class="card-icon mb-3">
                        <i class="fas fa-flag-usa fa-3x"></i>
                    </div>
                    <h5 class="card-title font-weight-bold mb-0">PEMILIHAN PRESIDEN</h5>
                    <small class="opacity-75">& Wakil Presiden</small>
                </div>
                <div class="card-body text-center d-flex flex-column">
                    <div class="card-badge mb-3">
                        <span class="badge badge-success">TERSEDIA</span>
                    </div>
                    <p class="card-text text-muted">
                        Daftar pasangan calon Presiden dan Wakil Presiden Republik Indonesia yang telah ditetapkan oleh KPU.
                    </p>
                    <div class="mt-auto">
                        {{-- Link ini akan mengarah ke halaman daftar kandidat dengan kategori 'pilpres' --}}
                        <a href="{{ route('pemilu.show', 'pilpres') }}" class="btn btn-gov btn-lg btn-block">
                            <i class="fas fa-eye mr-2"></i>
                            Lihat Kandidat
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- KARTU WALI KOTA --}}
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card gov-card shadow-lg h-100">
                <div class="card-header bg-gradient-red text-white text-center py-4">
                    <div class="card-icon mb-3">
                        <i class="fas fa-city fa-3x"></i>
                    </div>
                    <h5 class="card-title font-weight-bold mb-0">PEMILIHAN WALI KOTA</h5>
                    <small class="opacity-75">& Wakil Wali Kota</small>
                </div>
                <div class="card-body text-center d-flex flex-column">
                    <div class="card-badge mb-3">
                        <span class="badge badge-success">TERSEDIA</span>
                    </div>
                    <p class="card-text text-muted">
                        Daftar pasangan calon Wali Kota dan Wakil Wali Kota yang akan ditetapkan oleh KPU Daerah.
                    </p>
                    <div class="mt-auto">
                        {{-- Link ini akan mengarah ke halaman daftar kandidat dengan kategori 'walikota' --}}
                        <a href="{{ route('pemilu.show', 'walikota') }}" class="btn btn-gov btn-lg btn-block">
                            <i class="fas fa-eye mr-2"></i>
                            Lihat Kandidat
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- KARTU DPRD --}}
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card gov-card shadow-lg h-100">
                <div class="card-header bg-gradient-red text-white text-center py-4">
                    <div class="card-icon mb-3">
                        <i class="fas fa-landmark fa-3x"></i>
                    </div>
                    <h5 class="card-title font-weight-bold mb-0">PEMILIHAN DPRD</h5>
                    <small class="opacity-75">Dewan Perwakilan Rakyat Daerah</small>
                </div>
                <div class="card-body text-center d-flex flex-column">
                    <div class="card-badge mb-3">
                        <span class="badge badge-success">TERSEDIA</span>
                    </div>
                    <p class="card-text text-muted">
                        Daftar calon anggota legislatif DPRD yang akan ditetapkan oleh Komisi Pemilihan Umum.
                    </p>
                    <div class="mt-auto">
                        {{-- PERBAIKAN: Mengubah 'dprd' menjadi 'legislatif' agar sesuai dengan route yang ada --}}
                        <a href="{{ route('pemilu.show', 'legislatif') }}" class="btn btn-gov btn-lg btn-block">
                            <i class="fas fa-eye mr-2"></i>
                            Lihat Kandidat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer Info --}}
    <div class="row mt-5">
        <div class="col-12">
            <div class="alert alert-info border-0 shadow-sm">
                <div class="row align-items-center">
                    <div class="col-md-1 text-center">
                        <i class="fas fa-info-circle fa-2x text-info"></i>
                    </div>
                    <div class="col-md-11">
                        <h6 class="alert-heading mb-1">Informasi Penting</h6>
                        <p class="mb-0">
                            Sistem ini merupakan platform resmi yang dikelola oleh Komisi Pemilihan Umum (KPU) 
                            untuk memberikan informasi terkini mengenai pemilihan umum. Pastikan untuk selalu 
                            memverifikasi informasi melalui sumber resmi KPU.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/landingpage-informasi.css') }}">
@endpush
@endsection
