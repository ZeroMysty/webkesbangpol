@extends('dashboard.layouts.app')

@section('title', 'Profil Organisasi')

@section('content')
<div class="visimisi-page-wrapper">

    @php
        $visimisi = $visimisis->first() ?? null;
        $imageSrc = asset('images/component/sejarah_image.png');
        if ($visimisi && $visimisi->sejarah_image) {
            $customPath = public_path('images/component/' . $visimisi->sejarah_image);
            if (file_exists($customPath)) {
                $imageSrc = asset('images/component/' . $visimisi->sejarah_image);
            }
        }
    @endphp

    {{-- 1. HERO HEADER --}}
    <div class="visimisi-hero-header">
        <div class="visimisi-header-left">
            <div class="visimisi-badge-category">
                <i class="fas fa-building-columns"></i>
                <span>Profil & Kelembagaan Resmi</span>
            </div>
            <h1 class="visimisi-header-title">Profil Lembaga & Visi Misi</h1>
            <p class="visimisi-header-subtitle">
                Kelola dokumen resmi visi, misi, tugas pokok & fungsi (tupoksi), serta sejarah perjalanan Badan Kesatuan Bangsa dan Politik Kota Bandung.
            </p>
        </div>

        <div class="visimisi-header-actions">
            @if($visimisi)
                <a href="{{ route('visimisis.edit', $visimisi->id) }}" class="btn-profil-action-primary">
                    <i class="fas fa-pen-to-square"></i>
                    <span>Edit Profil Organisasi</span>
                </a>
                <a href="{{ url('/visimisi') }}" target="_blank" class="btn-profil-action-secondary" title="Buka Halaman Publik">
                    <i class="fas fa-arrow-up-right-from-square"></i>
                    <span>Halaman Publik</span>
                </a>
            @else
                <a href="{{ route('visimisis.create') }}" class="btn-profil-action-primary">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Data Profil</span>
                </a>
            @endif
        </div>
    </div>

    {{-- Session Feedback Messages --}}
    @if(session('success'))
        <div class="alert-modern-feedback alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-circle-check fs-5"></i>
            <div>
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert-modern-feedback alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-circle-exclamation fs-5"></i>
            <div>
                <strong>Perhatian!</strong> {{ session('error') }}
            </div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(!$visimisi)
        {{-- EMPTY STATE --}}
        <div class="visimisi-empty-state">
            <div class="visimisi-empty-icon">
                <i class="fas fa-building-columns"></i>
            </div>
            <h3 class="visimisi-empty-title">Data Profil Belum Tersedia</h3>
            <p class="visimisi-empty-desc">
                Saat ini belum ada data profil resmi, visi, misi, tupoksi, atau sejarah yang disimpan. Tambahkan data profil organisasi sekarang.
            </p>
            <a href="{{ route('visimisis.create') }}" class="btn-profil-action-primary">
                <i class="fas fa-plus"></i>
                <span>Tambah Data Profil Pertama</span>
            </a>
        </div>
    @else
        {{-- 2. STATS & KEY METRICS OVERVIEW --}}
        <div class="visimisi-stats-grid">
            <div class="visimisi-stat-card">
                <div class="visimisi-stat-icon-wrapper stat-icon-red">
                    <i class="fas fa-compass"></i>
                </div>
                <div class="visimisi-stat-info">
                    <span class="visimisi-stat-value">1 Visi Utama</span>
                    <span class="visimisi-stat-label">Arah Pembangunan Kota</span>
                </div>
            </div>

            <div class="visimisi-stat-card">
                <div class="visimisi-stat-icon-wrapper stat-icon-indigo">
                    <i class="fas fa-bullseye"></i>
                </div>
                <div class="visimisi-stat-info">
                    <span class="visimisi-stat-value">5 Pilar Misi</span>
                    <span class="visimisi-stat-label">Komitmen Pelayanan Publik</span>
                </div>
            </div>

            <div class="visimisi-stat-card">
                <div class="visimisi-stat-icon-wrapper stat-icon-emerald">
                    <i class="fas fa-list-check"></i>
                </div>
                <div class="visimisi-stat-info">
                    <span class="visimisi-stat-value">Tupoksi &amp; 7 Fungsi</span>
                    <span class="visimisi-stat-label">Landasan Tugas Operasional</span>
                </div>
            </div>

            <div class="visimisi-stat-card">
                <div class="visimisi-stat-icon-wrapper stat-icon-amber">
                    <i class="fas fa-clock-rotate-left"></i>
                </div>
                <div class="visimisi-stat-info">
                    <span class="visimisi-stat-value">3 Transformasi</span>
                    <span class="visimisi-stat-label">Sejarah Regulasi Daerah</span>
                </div>
            </div>
        </div>

        {{-- 3. INTERACTIVE SECTION TABS --}}
        <div class="visimisi-tabs-bar">
            <button type="button" class="btn-profil-tab active" data-target="all">
                <i class="fas fa-layer-group"></i>
                <span>Semua Bagian</span>
            </button>
            <button type="button" class="btn-profil-tab" data-target="section-visi">
                <i class="fas fa-eye"></i>
                <span>Visi Organisasi</span>
            </button>
            <button type="button" class="btn-profil-tab" data-target="section-misi">
                <i class="fas fa-bullseye"></i>
                <span>Misi Organisasi</span>
            </button>
            <button type="button" class="btn-profil-tab" data-target="section-tupoksi">
                <i class="fas fa-list-check"></i>
                <span>Tugas Pokok &amp; Fungsi</span>
            </button>
            <button type="button" class="btn-profil-tab" data-target="section-sejarah">
                <i class="fas fa-landmark"></i>
                <span>Sejarah &amp; Dokumentasi</span>
            </button>
        </div>

        {{-- 4. MODULAR SHOWCASE SECTIONS --}}

        {{-- BAGIAN 1: VISI STRATEGIS --}}
        <div class="profil-showcase-card profil-section-item" id="section-visi">
            <div class="profil-card-header">
                <div class="profil-card-header-left">
                    <div class="profil-header-icon-box">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="profil-header-title-box">
                        <h3>Visi Strategis Lembaga</h3>
                        <p>Cita-cita dan arah haluan pembangunan Badan Kesatuan Bangsa dan Politik Kota Bandung</p>
                    </div>
                </div>
                <div class="profil-card-badge">
                    <i class="fas fa-certificate text-danger"></i>
                    <span>Visi Resmi</span>
                </div>
            </div>

            <div class="visi-hero-body">
                <div class="visi-watermark-icon">
                    <i class="fas fa-quote-right"></i>
                </div>
                <div class="visi-quote-container">
                    <div class="visi-quote-mark">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <div class="visi-quote-text">
                        {!! $visimisi->visi !!}
                    </div>

                    <div class="visi-meta-strip">
                        <span class="visi-meta-chip">
                            <i class="fas fa-shield-halved"></i>
                            <span>Bakesbangpol Kota Bandung</span>
                        </span>
                        <span class="text-muted small">
                            <i class="far fa-calendar-check me-1"></i> Terakhir Diperbarui: {{ $visimisi->updated_at ? $visimisi->updated_at->format('d M Y, H:i') : '-' }} WIB
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- BAGIAN 2: MISI ORGANISASI --}}
        <div class="profil-showcase-card profil-section-item" id="section-misi">
            <div class="profil-card-header">
                <div class="profil-card-header-left">
                    <div class="profil-header-icon-box">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <div class="profil-header-title-box">
                        <h3>Misi &amp; Arah Kebijakan</h3>
                        <p>Langkah-langkah strategis untuk mewujudkan visi pembangunan daerah</p>
                    </div>
                </div>
                <div class="profil-card-badge">
                    <i class="fas fa-list-ol text-danger"></i>
                    <span>5 Pilar Utama</span>
                </div>
            </div>

            <div class="misi-card-body">
                <div class="misi-rich-content">
                    {!! $visimisi->misi !!}
                </div>
            </div>
        </div>

        {{-- BAGIAN 3: TUPOKSI (TUGAS POKOK & FUNGSI) --}}
        <div class="profil-showcase-card profil-section-item" id="section-tupoksi">
            <div class="profil-card-header">
                <div class="profil-card-header-left">
                    <div class="profil-header-icon-box">
                        <i class="fas fa-list-check"></i>
                    </div>
                    <div class="profil-header-title-box">
                        <h3>Tugas Pokok &amp; Fungsi (Tupoksi)</h3>
                        <p>Ketetapan kewenangan, fungsi pembinaan, dan tanggung jawab kelembagaan</p>
                    </div>
                </div>
                <div class="profil-card-badge">
                    <i class="fas fa-scale-balanced text-primary"></i>
                    <span>Dasar Hukum Pelaksanaan</span>
                </div>
            </div>

            <div class="tupoksi-card-body">
                <div class="tupoksi-layout-grid">
                    {{-- Kolom Tugas Pokok --}}
                    <div class="tugas-pokok-box">
                        <div class="tugas-pokok-badge">
                            <i class="fas fa-award"></i>
                            <span>Tugas Pokok Utama</span>
                        </div>
                        <div class="tugas-pokok-content">
                            <p class="fw-semibold">
                                Badan Kesatuan Bangsa dan Politik mempunyai tugas melaksanakan urusan pemerintahan di bidang kesatuan bangsa dan politik berdasarkan ketentuan peraturan perundang-undangan.
                            </p>
                            <p class="text-muted small mb-0">
                                Untuk menyelenggarakan tugas pokok di atas, Bakesbangpol mengemban fungsi perumusan kebijakan, pelaksanaan program wawasan kebangsaan, politik dalam negeri, ketahanan ekonomi &amp; sosial budaya, serta penanganan konflik sosial.
                            </p>
                        </div>
                    </div>

                    {{-- Kolom Pelaksanaan Fungsi --}}
                    <div class="fungsi-badan-box">
                        <div class="fungsi-badge">
                            <i class="fas fa-gears"></i>
                            <span>7 Fungsi Penyelenggaraan</span>
                        </div>
                        <div class="fungsi-content-body">
                            {!! $visimisi->tupoksi !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- BAGIAN 4: SEJARAH & ARSIP LEMBAGA --}}
        <div class="profil-showcase-card profil-section-item" id="section-sejarah">
            <div class="profil-card-header">
                <div class="profil-card-header-left">
                    <div class="profil-header-icon-box">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <div class="profil-header-title-box">
                        <h3>Sejarah &amp; Dokumentasi Lembaga</h3>
                        <p>Kronologi pembentukan serta transformasi kelembagaan Bakesbangpol Kota Bandung</p>
                    </div>
                </div>
                <div class="profil-card-badge">
                    <i class="fas fa-camera text-danger"></i>
                    <span>Dokumentasi Resmi</span>
                </div>
            </div>

            <div class="sejarah-card-body">
                <div class="sejarah-editorial-grid">
                    {{-- Kolom Teks Sejarah --}}
                    <div class="sejarah-text-column">
                        <div class="sejarah-timeline-pills">
                            <span class="timeline-pill">
                                <i class="fas fa-calendar"></i> 2007: Era BKBPPM
                            </span>
                            <span class="timeline-pill">
                                <i class="fas fa-calendar"></i> 2016: Transformasi Bakesbangpol
                            </span>
                            <span class="timeline-pill highlight">
                                <i class="fas fa-calendar-check"></i> 2021: Penyesuaian Terkini
                            </span>
                        </div>

                        <div class="sejarah-body-text">
                            {!! $visimisi->sejarah !!}
                        </div>
                    </div>

                    {{-- Kolom Foto Dokumentasi --}}
                    <div class="sejarah-image-column">
                        <div class="sejarah-image-preview-box" id="btnOpenLightbox" title="Klik untuk memperbesar gambar">
                            <img src="{{ $imageSrc }}" alt="Dokumentasi Bakesbangpol Kota Bandung" loading="lazy">
                            <div class="sejarah-image-overlay">
                                <i class="fas fa-magnifying-glass-plus"></i>
                            </div>
                        </div>

                        <div class="sejarah-caption-title">
                            <i class="fas fa-building text-danger"></i>
                            <span>Kantor Bakesbangpol</span>
                        </div>
                        <p class="sejarah-caption-desc">
                            Gedung Balai Kota / Kantor Badan Kesatuan Bangsa dan Politik Kota Bandung.
                        </p>

                        <button type="button" class="btn-zoom-image" id="btnZoomAction">
                            <i class="fas fa-expand me-1"></i>
                            <span>Lihat Foto Resolusi Penuh</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- AKSI TAMBAHAN (RESET / HAPUS JIKA DIPERLUKAN) --}}
        <div class="d-flex justify-content-end align-items-center gap-2 mt-4 mb-2">
            <span class="text-muted small me-2">Perlu mengatur ulang data profil?</span>
            <button type="button" class="btn btn-sm btn-outline-danger px-3 py-1 rounded-pill" onclick="openDeleteModal('{{ $visimisi->id }}')">
                <i class="fas fa-trash-can me-1"></i> Hapus &amp; Reset Data
            </button>
        </div>
    @endif

</div>

{{-- MODAL LIGHTBOX FOTO SEJARAH --}}
<div class="modal fade modal-image-lightbox" id="modalLightbox" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-lightbox-close" data-bs-dismiss="modal" aria-label="Tutup">
                    <i class="fas fa-xmark"></i>
                </button>
                <img src="{{ $imageSrc }}" alt="Dokumentasi Sejarah Resolusi Penuh" class="w-100">
            </div>
        </div>
    </div>
</div>

{{-- MODAL KONFIRMASI HAPUS ELEGAN --}}
<div class="modal fade modal-hukum-delete" id="modalDeleteProfil" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-delete-icon-box">
                    <i class="fas fa-triangle-exclamation"></i>
                </div>
                <h4 class="fw-bold text-dark mb-2" id="modalDeleteLabel">Hapus Data Profil?</h4>
                <p class="text-muted small mb-1">
                    Tindakan ini akan menghapus dokumen Visi, Misi, Tupoksi, dan Sejarah organisasi yang sedang aktif.
                </p>

                <div class="modal-hukum-name-highlight">
                    Profil Organisasi &amp; Visi Misi Bakesbangpol
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-modal-cancel" data-bs-dismiss="modal">
                    Batal
                </button>
                <form id="formDeleteProfil" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-modal-delete">
                        <i class="fas fa-trash-can me-1"></i> Ya, Hapus Data
                    </button>
                </form>
            </div>
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
        // Tab Navigation Smooth Filter
        const tabs = document.querySelectorAll('.btn-profil-tab');
        const sections = document.querySelectorAll('.profil-section-item');

        tabs.forEach(tab => {
            tab.addEventListener('click', function () {
                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                const target = this.getAttribute('data-target');

                if (target === 'all') {
                    sections.forEach(sec => sec.classList.remove('d-none'));
                } else {
                    sections.forEach(sec => {
                        if (sec.id === target) {
                            sec.classList.remove('d-none');
                            sec.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        } else {
                            sec.classList.add('d-none');
                        }
                    });
                }
            });
        });

        // Lightbox Trigger
        const btnOpen = document.getElementById('btnOpenLightbox');
        const btnZoom = document.getElementById('btnZoomAction');
        const modalEl = document.getElementById('modalLightbox');

        function openLightbox() {
            if (modalEl && window.bootstrap && bootstrap.Modal) {
                bootstrap.Modal.getOrCreateInstance(modalEl).show();
            }
        }

        if (btnOpen) btnOpen.addEventListener('click', openLightbox);
        if (btnZoom) btnZoom.addEventListener('click', openLightbox);
    });

    // Delete Modal Trigger
    function openDeleteModal(id) {
        const modalEl = document.getElementById('modalDeleteProfil');
        const form = document.getElementById('formDeleteProfil');
        form.action = `/visimisis/${id}`;

        if (modalEl && window.bootstrap && bootstrap.Modal) {
            bootstrap.Modal.getOrCreateInstance(modalEl).show();
        }
    }
</script>
@endpush
