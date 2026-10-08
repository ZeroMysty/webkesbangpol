@extends('dashboard.layouts.app')

@section('title', 'Dasar Hukum & Regulasi')

@section('content')
<div class="hukum-page-wrapper">

    {{-- 1. HERO HEADER --}}
    <div class="hukum-hero-header">
        <div class="hukum-header-left">
            <div class="hukum-badge-category">
                <i class="fas fa-scale-balanced"></i>
                <span>Regulasi & Produk Hukum</span>
            </div>
            <h1 class="hukum-header-title">Dasar Hukum & Peraturan Organisasi</h1>
            <p class="hukum-header-subtitle">
                Kelola kumpulan regulasi, undang-undang, keputusan wali kota, dan instrumen hukum yang menjadi landasan operasional Badan Kesatuan Bangsa dan Politik Kota Bandung.
            </p>
        </div>
        <div class="hukum-header-right">
            <a href="{{ route('landasanhukum.create') }}" class="btn-tambah-hukum-modern">
                <i class="fas fa-plus"></i>
                <span>Tambah Dasar Hukum</span>
            </a>
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

    {{-- 2. STATS OVERVIEW --}}
    <div class="hukum-stats-grid">
        <div class="hukum-stat-card">
            <div class="hukum-stat-icon-wrapper stat-icon-red">
                <i class="fas fa-scale-balanced"></i>
            </div>
            <div class="hukum-stat-info">
                <span class="hukum-stat-value">{{ $count ?? $hukum->total() }}</span>
                <span class="hukum-stat-label">Total Produk Hukum</span>
            </div>
        </div>

        <div class="hukum-stat-card">
            <div class="hukum-stat-icon-wrapper stat-icon-indigo">
                <i class="fas fa-sitemap"></i>
            </div>
            <div class="hukum-stat-info">
                <span class="hukum-stat-value">{{ $totalBidang ?? 4 }}</span>
                <span class="hukum-stat-label">Bidang Pengampu Regulasi</span>
            </div>
        </div>

        <div class="hukum-stat-card">
            <div class="hukum-stat-icon-wrapper stat-icon-emerald">
                <i class="fas fa-book-bookmark"></i>
            </div>
            <div class="hukum-stat-info">
                <span class="hukum-stat-value">{{ count($jenisList ?? []) ?: 15 }}</span>
                <span class="hukum-stat-label">Ragam Kategori Peraturan</span>
            </div>
        </div>

        <div class="hukum-stat-card">
            <div class="hukum-stat-icon-wrapper stat-icon-amber">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="hukum-stat-info">
                <span class="hukum-stat-value">{{ $latestYear ?? date('Y') }}</span>
                <span class="hukum-stat-label">Tahun Terbit Regulasi Terkini</span>
            </div>
        </div>
    </div>

    {{-- 3. TOOLBAR (SEARCH, FILTERS & VIEW SWITCHER) --}}
    <div class="hukum-toolbar">
        <div class="hukum-toolbar-left">
            <div class="hukum-search-box">
                <input type="text" id="hukumSearchInput" class="hukum-search-input" placeholder="Cari jenis, nomor, tahun, atau tentang..." autocomplete="off">
                <i class="fas fa-magnifying-glass"></i>
            </div>

            <select id="filterBidang" class="hukum-filter-select" aria-label="Filter Berdasarkan Bidang">
                <option value="">Semua Bidang</option>
                @if(isset($bidangs))
                    @foreach($bidangs as $b)
                        <option value="{{ $b->id }}">{{ $b->nama_bidang }}</option>
                    @endforeach
                @endif
            </select>

            <select id="filterJenis" class="hukum-filter-select" aria-label="Filter Berdasarkan Jenis Peraturan">
                <option value="">Semua Jenis Peraturan</option>
                @if(isset($jenisList))
                    @foreach($jenisList as $j)
                        <option value="{{ $j }}">{{ $j }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="hukum-toolbar-actions">
            <div class="hukum-view-switch" role="group" aria-label="Pilihan Tampilan">
                <button type="button" class="btn-view-switch active" id="btnViewGrid" title="Tampilan Kartu">
                    <i class="fas fa-grip"></i>
                    <span>Kartu</span>
                </button>
                <button type="button" class="btn-view-switch" id="btnViewList" title="Tampilan Baris">
                    <i class="fas fa-list"></i>
                    <span>Baris</span>
                </button>
            </div>
        </div>
    </div>

    @if($hukum->isEmpty())
        {{-- EMPTY STATE --}}
        <div class="hukum-empty-state">
            <div class="hukum-empty-icon">
                <i class="fas fa-scale-balanced"></i>
            </div>
            <h3 class="hukum-empty-title">Belum Ada Data Dasar Hukum</h3>
            <p class="hukum-empty-desc">
                Saat ini belum ada produk regulasi atau dasar hukum yang tersimpan di sistem. Tambahkan regulasi pertama untuk melengkapi profil organisasi.
            </p>
            <a href="{{ route('landasanhukum.create') }}" class="btn-tambah-hukum-modern">
                <i class="fas fa-plus"></i>
                <span>Tambah Dasar Hukum Pertama</span>
            </a>
        </div>
    @else
        {{-- 4. GRID CARDS VIEW (DEFAULT - NO TABLE IN TABLE) --}}
        <div class="hukum-cards-grid" id="hukumGridContainer">
            @foreach($hukum as $item)
                @php
                    $jenisUpper = strtoupper($item->jenis_peraturan);
                    $jenisLower = strtolower($item->jenis_peraturan);
                    $themeClass = 'theme-card-uu';
                    $badgeClass = 'badge-jenis-uu';
                    $iconClass = 'fa-landmark';

                    if (str_contains($jenisLower, 'uu') || str_contains($jenisLower, 'undang')) {
                        $themeClass = 'theme-card-uu';
                        $badgeClass = 'badge-jenis-uu';
                        $iconClass = 'fa-scale-balanced';
                    } elseif (str_contains($jenisLower, 'pp') || str_contains($jenisLower, 'pemerintah')) {
                        $themeClass = 'theme-card-pp';
                        $badgeClass = 'badge-jenis-pp';
                        $iconClass = 'fa-building-columns';
                    } elseif (str_contains($jenisLower, 'pres') || str_contains($jenisLower, 'inpres')) {
                        $themeClass = 'theme-card-perpres';
                        $badgeClass = 'badge-jenis-perpres';
                        $iconClass = 'fa-award';
                    } elseif (str_contains($jenisLower, 'menteri') || str_contains($jenisLower, 'permen') || str_contains($jenisLower, 'kepmen')) {
                        $themeClass = 'theme-card-permendagri';
                        $badgeClass = 'badge-jenis-permendagri';
                        $iconClass = 'fa-briefcase';
                    } elseif (str_contains($jenisLower, 'kpu')) {
                        $themeClass = 'theme-card-kpu';
                        $badgeClass = 'badge-jenis-kpu';
                        $iconClass = 'fa-check-to-slot';
                    } elseif (str_contains($jenisLower, 'perda') || str_contains($jenisLower, 'perwal') || str_contains($jenisLower, 'kepwal') || str_contains($jenisLower, 'wali') || str_contains($jenisLower, 'edaran')) {
                        $themeClass = 'theme-card-daerah';
                        $badgeClass = 'badge-jenis-daerah';
                        $iconClass = 'fa-city';
                    } else {
                        $themeClass = 'theme-card-uu';
                        $badgeClass = 'badge-jenis-default';
                        $iconClass = 'fa-file-lines';
                    }

                    $namaBidang = $item->bidang ? $item->bidang->nama_bidang : 'Umum / Terkait';
                    $cleanTentang = strip_tags($item->tentang);
                    $fullTitle = $item->jenis_peraturan . ' No. ' . $item->nomor_peraturan . ' Tahun ' . $item->tahun_peraturan;
                @endphp

                <div class="hukum-card {{ $themeClass }} item-hukum"
                     data-id="{{ $item->id }}"
                     data-jenis="{{ strtolower($item->jenis_peraturan) }}"
                     data-nomor="{{ strtolower($item->nomor_peraturan) }}"
                     data-tahun="{{ $item->tahun_peraturan }}"
                     data-bidang-id="{{ $item->bidang_id }}"
                     data-bidang-nama="{{ strtolower($namaBidang) }}"
                     data-search="{{ strtolower($item->jenis_peraturan . ' ' . $item->nomor_peraturan . ' ' . $item->tahun_peraturan . ' ' . $namaBidang . ' ' . $cleanTentang) }}">
                    
                    {{-- Card Top Section --}}
                    <div class="hukum-card-top">
                        <div class="hukum-card-badges">
                            <span class="badge-jenis-peraturan {{ $badgeClass }}">
                                <i class="fas {{ $iconClass }}"></i>
                                <span>{{ $item->jenis_peraturan }}</span>
                            </span>

                            <span class="chip-nomor-tahun">
                                No. {{ $item->nomor_peraturan }} / {{ $item->tahun_peraturan }}
                            </span>
                        </div>

                        <div class="hukum-card-actions">
                            <button type="button" 
                                    class="btn-card-action btn-action-view btn-trigger-detail" 
                                    title="Baca Rincian Lengkap"
                                    data-bs-toggle="tooltip">
                                <i class="fas fa-eye"></i>
                            </button>

                            <a href="{{ route('landasanhukum.edit', $item->id) }}" 
                               class="btn-card-action btn-action-edit" 
                               title="Edit Regulasi"
                               data-bs-toggle="tooltip">
                                <i class="fas fa-pen-to-square"></i>
                            </a>

                            <button type="button" 
                                    class="btn-card-action btn-action-delete" 
                                    title="Hapus Regulasi"
                                    data-bs-toggle="tooltip"
                                    onclick="openDeleteHukumModal('{{ $item->id }}', '{{ addslashes($fullTitle) }}')">
                                <i class="fas fa-trash-can"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Card Body --}}
                    <div class="hukum-card-body">
                        <div class="hukum-card-bidang">
                            <span class="badge-bidang-chip" title="{{ $namaBidang }}">
                                <i class="fas fa-sitemap"></i>
                                <span>{{ $namaBidang }}</span>
                            </span>
                        </div>

                        <h3 class="hukum-card-title">
                            {{ $fullTitle }}
                        </h3>

                        <span class="hukum-card-subtitle">
                            {{ $item->jenis_peraturan_lengkap ?? $item->jenis_peraturan }}
                        </span>

                        <div class="hukum-tentang-container btn-trigger-detail" title="Klik untuk membaca selengkapnya">
                            <div class="hukum-tentang-label">
                                <i class="fas fa-quote-left"></i>
                                <span>Tentang / Pokok Regulasi</span>
                            </div>
                            <div class="hukum-tentang-excerpt">
                                {!! $item->tentang !!}
                            </div>
                            <span class="hukum-read-more-link">
                                <span>Baca Selengkapnya</span>
                                <i class="fas fa-arrow-right"></i>
                            </span>
                        </div>
                    </div>

                    {{-- Card Footer --}}
                    <div class="hukum-card-footer">
                        <span>
                            <i class="far fa-calendar-alt me-1"></i> Tahun {{ $item->tahun_peraturan }}
                        </span>

                        <button type="button" class="btn-card-read-detail btn-trigger-detail">
                            <i class="fas fa-file-lines me-1"></i>
                            <span>Detail Regulasi</span>
                        </button>
                    </div>

                    {{-- Hidden detail payload for modal --}}
                    <div class="d-none hukum-payload-title">{{ $fullTitle }}</div>
                    <div class="d-none hukum-payload-jenis">{{ $item->jenis_peraturan_lengkap ?? $item->jenis_peraturan }}</div>
                    <div class="d-none hukum-payload-nomor">{{ $item->nomor_peraturan }}</div>
                    <div class="d-none hukum-payload-tahun">{{ $item->tahun_peraturan }}</div>
                    <div class="d-none hukum-payload-bidang">{{ $namaBidang }}</div>
                    <div class="d-none hukum-payload-tentang">{!! $item->tentang !!}</div>
                    <div class="d-none hukum-payload-edit-url">{{ route('landasanhukum.edit', $item->id) }}</div>
                </div>
            @endforeach
        </div>

        {{-- 5. LIST VIEW (FLOATING ROW ITEMS - NO TABLE IN TABLE) --}}
        <div class="hukum-list-container d-none" id="hukumListContainer">
            @foreach($hukum as $item)
                @php
                    $jenisUpper = strtoupper($item->jenis_peraturan);
                    $jenisLower = strtolower($item->jenis_peraturan);
                    $badgeClass = 'badge-jenis-uu';
                    $iconClass = 'fa-landmark';

                    if (str_contains($jenisLower, 'uu') || str_contains($jenisLower, 'undang')) {
                        $badgeClass = 'badge-jenis-uu';
                        $iconClass = 'fa-scale-balanced';
                    } elseif (str_contains($jenisLower, 'pp') || str_contains($jenisLower, 'pemerintah')) {
                        $badgeClass = 'badge-jenis-pp';
                        $iconClass = 'fa-building-columns';
                    } elseif (str_contains($jenisLower, 'pres') || str_contains($jenisLower, 'inpres')) {
                        $badgeClass = 'badge-jenis-perpres';
                        $iconClass = 'fa-award';
                    } elseif (str_contains($jenisLower, 'menteri') || str_contains($jenisLower, 'permen') || str_contains($jenisLower, 'kepmen')) {
                        $badgeClass = 'badge-jenis-permendagri';
                        $iconClass = 'fa-briefcase';
                    } elseif (str_contains($jenisLower, 'kpu')) {
                        $badgeClass = 'badge-jenis-kpu';
                        $iconClass = 'fa-check-to-slot';
                    } elseif (str_contains($jenisLower, 'perda') || str_contains($jenisLower, 'perwal') || str_contains($jenisLower, 'kepwal') || str_contains($jenisLower, 'wali') || str_contains($jenisLower, 'edaran')) {
                        $badgeClass = 'badge-jenis-daerah';
                        $iconClass = 'fa-city';
                    } else {
                        $badgeClass = 'badge-jenis-default';
                        $iconClass = 'fa-file-lines';
                    }

                    $namaBidang = $item->bidang ? $item->bidang->nama_bidang : 'Umum / Terkait';
                    $cleanTentang = strip_tags($item->tentang);
                    $fullTitle = $item->jenis_peraturan . ' No. ' . $item->nomor_peraturan . ' Tahun ' . $item->tahun_peraturan;
                @endphp

                <div class="hukum-list-item item-hukum"
                     data-id="{{ $item->id }}"
                     data-jenis="{{ strtolower($item->jenis_peraturan) }}"
                     data-nomor="{{ strtolower($item->nomor_peraturan) }}"
                     data-tahun="{{ $item->tahun_peraturan }}"
                     data-bidang-id="{{ $item->bidang_id }}"
                     data-bidang-nama="{{ strtolower($namaBidang) }}"
                     data-search="{{ strtolower($item->jenis_peraturan . ' ' . $item->nomor_peraturan . ' ' . $item->tahun_peraturan . ' ' . $namaBidang . ' ' . $cleanTentang) }}">
                    
                    <div class="hukum-list-left">
                        <div class="hukum-list-avatar">
                            <i class="fas {{ $iconClass }}"></i>
                        </div>

                        <div class="hukum-list-content">
                            <div class="hukum-list-title-row">
                                <h4 class="hukum-list-title">{{ $fullTitle }}</h4>
                                <span class="badge-jenis-peraturan {{ $badgeClass }}">
                                    {{ $item->jenis_peraturan }}
                                </span>
                                <span class="chip-nomor-tahun">
                                    Thn {{ $item->tahun_peraturan }}
                                </span>
                            </div>

                            <div class="hukum-list-excerpt">
                                {!! $item->tentang !!}
                            </div>

                            <div class="hukum-list-meta-row">
                                <span class="badge-bidang-chip">
                                    <i class="fas fa-sitemap"></i>
                                    <span>{{ $namaBidang }}</span>
                                </span>
                                <span class="text-muted small">
                                    <i class="far fa-clock me-1"></i> {{ $item->jenis_peraturan_lengkap ?? $item->jenis_peraturan }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="hukum-list-right">
                        <button type="button" class="btn-card-read-detail btn-trigger-detail">
                            <i class="fas fa-eye me-1"></i>
                            <span>Detail</span>
                        </button>

                        <div class="hukum-card-actions">
                            <a href="{{ route('landasanhukum.edit', $item->id) }}" 
                               class="btn-card-action btn-action-edit" 
                               title="Edit Regulasi"
                               data-bs-toggle="tooltip">
                                <i class="fas fa-pen-to-square"></i>
                            </a>

                            <button type="button" 
                                    class="btn-card-action btn-action-delete" 
                                    title="Hapus Regulasi"
                                    data-bs-toggle="tooltip"
                                    onclick="openDeleteHukumModal('{{ $item->id }}', '{{ addslashes($fullTitle) }}')">
                                <i class="fas fa-trash-can"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Hidden detail payload for modal --}}
                    <div class="d-none hukum-payload-title">{{ $fullTitle }}</div>
                    <div class="d-none hukum-payload-jenis">{{ $item->jenis_peraturan_lengkap ?? $item->jenis_peraturan }}</div>
                    <div class="d-none hukum-payload-nomor">{{ $item->nomor_peraturan }}</div>
                    <div class="d-none hukum-payload-tahun">{{ $item->tahun_peraturan }}</div>
                    <div class="d-none hukum-payload-bidang">{{ $namaBidang }}</div>
                    <div class="d-none hukum-payload-tentang">{!! $item->tentang !!}</div>
                    <div class="d-none hukum-payload-edit-url">{{ route('landasanhukum.edit', $item->id) }}</div>
                </div>
            @endforeach
        </div>

        {{-- No Search Result Feedback --}}
        <div id="noSearchMatch" class="hukum-empty-state d-none">
            <div class="hukum-empty-icon">
                <i class="fas fa-magnifying-glass"></i>
            </div>
            <h4 class="hukum-empty-title">Tidak Ada Regulasi Yang Cocok</h4>
            <p class="hukum-empty-desc">
                Pencarian atau filter yang Anda gunakan tidak menemukan data regulasi. Silakan ubah kata kunci atau bersihkan filter.
            </p>
            <button type="button" id="btnResetFilters" class="btn-tambah-hukum-modern">
                <i class="fas fa-rotate-left"></i>
                <span>Reset Pencarian & Filter</span>
            </button>
        </div>

        {{-- Pagination --}}
        @if($hukum->hasPages())
            <div class="d-flex justify-content-end mt-4">
                {{ $hukum->links('pagination::bootstrap-5') }}
            </div>
        @endif
    @endif

</div>

{{-- MODAL DETAIL REGULASI LENGKAP --}}
<div class="modal fade modal-hukum-detail" id="modalDetailHukum" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-hukum-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="modal-hukum-title-box">
                        <div class="modal-hukum-icon">
                            <i class="fas fa-scale-balanced"></i>
                        </div>
                        <div>
                            <h4 class="modal-hukum-title" id="modalDetailTitle">Judul Regulasi</h4>
                            <span class="text-white-50 small" id="modalDetailSubtitle">Jenis Peraturan Lengkap</span>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-hukum-meta-chips">
                    <span class="badge bg-light text-dark fw-bold px-3 py-2 rounded-pill" id="modalDetailNomor">
                        No. -
                    </span>
                    <span class="badge bg-light text-dark fw-bold px-3 py-2 rounded-pill" id="modalDetailTahun">
                        Tahun -
                    </span>
                    <span class="badge bg-danger text-white fw-bold px-3 py-2 rounded-pill" id="modalDetailBidang">
                        Bidang -
                    </span>
                </div>
            </div>

            <div class="modal-hukum-body">
                <h6 class="fw-bold text-dark mb-2">
                    <i class="fas fa-quote-left text-danger me-2"></i>
                    Tentang / Pokok Pengaturan:
                </h6>
                <div class="modal-reading-box" id="modalDetailTentang">
                    <!-- Dynamic Body -->
                </div>
            </div>

            <div class="modal-hukum-footer">
                <button type="button" class="btn-modal-cancel" data-bs-dismiss="modal">
                    Tutup
                </button>
                <a href="#" id="modalDetailEditBtn" class="btn-tambah-hukum-modern">
                    <i class="fas fa-pen-to-square"></i>
                    <span>Edit Regulasi Ini</span>
                </a>
            </div>
        </div>
    </div>
</div>

{{-- MODAL KONFIRMASI HAPUS ELEGAN --}}
<div class="modal fade modal-hukum-delete" id="modalDeleteHukum" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-delete-icon-box">
                    <i class="fas fa-triangle-exclamation"></i>
                </div>
                <h4 class="fw-bold text-dark mb-2" id="modalDeleteLabel">Hapus Dasar Hukum?</h4>
                <p class="text-muted small mb-1">
                    Tindakan ini tidak dapat dibatalkan. Regulasi yang dipilih akan dihapus secara permanen dari sistem.
                </p>

                <div class="modal-hukum-name-highlight" id="deleteHukumName">
                    <!-- Dynamic Title -->
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-modal-cancel" data-bs-dismiss="modal">
                    Batal
                </button>
                <form id="formDeleteHukum" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-modal-delete">
                        <i class="fas fa-trash-can me-1"></i> Ya, Hapus Regulasi
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard-landasanhukum.css') }}">
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Search & Filter elements
        const searchInput = document.getElementById('hukumSearchInput');
        const filterBidang = document.getElementById('filterBidang');
        const filterJenis = document.getElementById('filterJenis');
        const btnReset = document.getElementById('btnResetFilters');
        const items = document.querySelectorAll('.item-hukum');
        const noMatchBox = document.getElementById('noSearchMatch');
        const gridContainer = document.getElementById('hukumGridContainer');
        const listContainer = document.getElementById('hukumListContainer');

        function filterItems() {
            const keyword = searchInput ? searchInput.value.toLowerCase().trim() : '';
            const selectedBidang = filterBidang ? filterBidang.value : '';
            const selectedJenis = filterJenis ? filterJenis.value.toLowerCase().trim() : '';
            let visibleCount = 0;

            items.forEach(item => {
                const searchData = item.getAttribute('data-search') || '';
                const bidangId = item.getAttribute('data-bidang-id') || '';
                const jenis = item.getAttribute('data-jenis') || '';

                const matchesKeyword = !keyword || searchData.includes(keyword);
                const matchesBidang = !selectedBidang || (bidangId === selectedBidang);
                const matchesJenis = !selectedJenis || (jenis === selectedJenis);

                if (matchesKeyword && matchesBidang && matchesJenis) {
                    item.classList.remove('d-none');
                    visibleCount++;
                } else {
                    item.classList.add('d-none');
                }
            });

            if (noMatchBox) {
                if (visibleCount === 0 && items.length > 0) {
                    noMatchBox.classList.remove('d-none');
                } else {
                    noMatchBox.classList.add('d-none');
                }
            }
        }

        if (searchInput) searchInput.addEventListener('input', filterItems);
        if (filterBidang) filterBidang.addEventListener('change', filterItems);
        if (filterJenis) filterJenis.addEventListener('change', filterItems);

        if (btnReset) {
            btnReset.addEventListener('click', function () {
                if (searchInput) searchInput.value = '';
                if (filterBidang) filterBidang.value = '';
                if (filterJenis) filterJenis.value = '';
                filterItems();
            });
        }

        // View Switcher (Grid vs List)
        const btnGrid = document.getElementById('btnViewGrid');
        const btnList = document.getElementById('btnViewList');

        function setViewMode(mode) {
            if (!gridContainer || !listContainer) return;

            if (mode === 'list') {
                gridContainer.classList.add('d-none');
                listContainer.classList.remove('d-none');
                btnList.classList.add('active');
                btnGrid.classList.remove('active');
                localStorage.setItem('hukum_view_mode', 'list');
            } else {
                listContainer.classList.add('d-none');
                gridContainer.classList.remove('d-none');
                btnGrid.classList.add('active');
                btnList.classList.remove('active');
                localStorage.setItem('hukum_view_mode', 'grid');
            }
        }

        if (btnGrid && btnList) {
            btnGrid.addEventListener('click', () => setViewMode('grid'));
            btnList.addEventListener('click', () => setViewMode('list'));

            // Load saved preference
            const savedMode = localStorage.getItem('hukum_view_mode');
            if (savedMode === 'list') {
                setViewMode('list');
            }
        }

        // Detail Modal Trigger
        document.querySelectorAll('.btn-trigger-detail').forEach(trigger => {
            trigger.addEventListener('click', function (e) {
                e.stopPropagation();
                const card = this.closest('.item-hukum');
                if (!card) return;

                const title = card.querySelector('.hukum-payload-title')?.textContent || '';
                const jenis = card.querySelector('.hukum-payload-jenis')?.textContent || '';
                const nomor = card.querySelector('.hukum-payload-nomor')?.textContent || '';
                const tahun = card.querySelector('.hukum-payload-tahun')?.textContent || '';
                const bidang = card.querySelector('.hukum-payload-bidang')?.textContent || '';
                const tentangHtml = card.querySelector('.hukum-payload-tentang')?.innerHTML || '';
                const editUrl = card.querySelector('.hukum-payload-edit-url')?.textContent || '#';

                document.getElementById('modalDetailTitle').textContent = title;
                document.getElementById('modalDetailSubtitle').textContent = jenis;
                document.getElementById('modalDetailNomor').textContent = 'No. ' + nomor;
                document.getElementById('modalDetailTahun').textContent = 'Tahun ' + tahun;
                document.getElementById('modalDetailBidang').textContent = bidang;
                document.getElementById('modalDetailTentang').innerHTML = tentangHtml;
                document.getElementById('modalDetailEditBtn').href = editUrl;

                showModal(document.getElementById('modalDetailHukum'));
            });
        });
    });

    // Safe Modal Helpers
    function showModal(modalEl) {
        if (!modalEl) return;
        if (window.bootstrap && bootstrap.Modal) {
            const modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);
            modalInstance.show();
        } else {
            modalEl.classList.add('show');
            modalEl.style.display = 'block';
            document.body.classList.add('modal-open');
        }
    }

    function hideModal(modalEl) {
        if (!modalEl) return;
        if (window.bootstrap && bootstrap.Modal) {
            const modalInstance = bootstrap.Modal.getInstance(modalEl);
            if (modalInstance) modalInstance.hide();
        }
        modalEl.classList.remove('show');
        modalEl.style.display = 'none';
        document.body.classList.remove('modal-open');
        const backdrop = document.querySelector('.modal-backdrop');
        if (backdrop) backdrop.remove();
    }

    // Delete Modal Trigger
    function openDeleteHukumModal(id, title) {
        const modalEl = document.getElementById('modalDeleteHukum');
        const form = document.getElementById('formDeleteHukum');
        const nameBox = document.getElementById('deleteHukumName');

        form.action = `/landasanhukum/${id}`;
        nameBox.textContent = title;

        showModal(modalEl);
    }

    document.addEventListener('click', function(e) {
        const closeBtn = e.target.closest('[data-bs-dismiss="modal"]');
        if (closeBtn) {
            e.preventDefault();
            const modalEl = closeBtn.closest('.modal');
            hideModal(modalEl);
        } else if (e.target.classList.contains('modal') && e.target.classList.contains('show')) {
            hideModal(e.target);
        }
    });

    window.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal.show').forEach(m => hideModal(m));
        }
    });
</script>
@endpush