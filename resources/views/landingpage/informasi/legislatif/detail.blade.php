@extends('landingpage.layouts.app')
@section('title', $legislatif->nama_lengkap)

@section('content')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/landingpage-informasi.css') }}">
@endpush

<section class="detail-hero">
    <div class="container">
        <div class="detail-card">
            <div class="detail-header">
                <div class="header-info">
                    <h1>{{ $legislatif->nama_lengkap }}</h1>
                    <p>{{ $legislatif->nama_partai }} - Daerah Pemilihan {{ $legislatif->dapil }}</p>
                </div>
            </div>
            <div class="detail-body">
                <div class="info-section">
                    <h4 class="info-title">Data Diri</h4>
                    <div class="info-grid">
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt icon"></i>
                            <div>
                                <span class="label">Tempat Lahir</span>
                                <span class="value">{{ $legislatif->tempat_lahir ?? '-' }}</span>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-venus-mars icon"></i>
                            <div>
                                <span class="label">Jenis Kelamin</span>
                                <span class="value">{{ $legislatif->jenis_kelamin ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info-section">
                    <h4 class="info-title">Data Pemilihan</h4>
                    <div class="info-grid">
                        <div class="info-item">
                            <i class="fas fa-flag icon"></i>
                            <div>
                                <span class="label">Partai</span>
                                <span class="value">{{ $legislatif->nama_partai }}</span>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-map-pin icon"></i>
                            <div>
                                <span class="label">Daerah Pemilihan</span>
                                <span class="value">{{ $legislatif->dapil }}</span>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-hashtag icon"></i>
                            <div>
                                <span class="label">Nomor Urut</span>
                                <span class="value">{{ $legislatif->no_urut }}</span>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-vote-yea icon"></i>
                            <div>
                                <span class="label">Total Suara Sah</span>
                                <span class="value">{{ number_format($legislatif->suara_sah, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                @if($legislatif->riwayat_pendidikan)
                <div class="info-section">
                    <h4 class="info-title">Riwayat Pendidikan</h4>
                    <p>{!! nl2br(e($legislatif->riwayat_pendidikan)) !!}</p>
                </div>
                @endif

                @if($legislatif->riwayat_pekerjaan)
                <div class="info-section">
                    <h4 class="info-title">Riwayat Pekerjaan</h4>
                    <p>{!! nl2br(e($legislatif->riwayat_pekerjaan)) !!}</p>
                </div>
                @endif
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('pemilu.show', 'legislatif') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar Caleg
            </a>
        </div>
    </div>
</section>
@endsection
