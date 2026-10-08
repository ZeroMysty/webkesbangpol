@extends('dashboard.layouts.app')

@section('title', 'Program Kerja Organisasi')

@section('content')
<div class="program-page-wrapper">

    {{-- 1. HERO HEADER --}}
    <div class="program-hero-header">
        <div class="program-header-left">
            <div class="program-badge-category">
                <i class="fas fa-list-check"></i>
                <span>Perencanaan &amp; Program Kerja</span>
            </div>
            <h1 class="program-header-title">Program Kerja Organisasi</h1>
            <p class="program-header-subtitle">
                Kelola pembagian agenda kegiatan, program strategis, serta inisiatif kerja pada setiap bidang tugas Badan Kesatuan Bangsa dan Politik Kota Bandung.
            </p>
        </div>

        <div class="program-header-right">
            <a href="{{ route('programs.create') }}" class="btn-tambah-program-modern">
                <i class="fas fa-plus"></i>
                <span>Tambah Program Baru</span>
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
    <div class="program-stats-grid">
        <div class="program-stat-card">
            <div class="program-stat-icon-wrapper stat-icon-red">
                <i class="fas fa-list-check"></i>
            </div>
            <div class="program-stat-info">
                <span class="program-stat-value">{{ $count ?? $programs->total() }}</span>
                <span class="program-stat-label">Total Program Terdaftar</span>
            </div>
        </div>

        <div class="program-stat-card">
            <div class="program-stat-icon-wrapper stat-icon-indigo">
                <i class="fas fa-sitemap"></i>
            </div>
            <div class="program-stat-info">
                <span class="program-stat-value">{{ $totalBidangs ?? 4 }}</span>
                <span class="program-stat-label">Bidang Kerja Pengampu</span>
            </div>
        </div>

        <div class="program-stat-card">
            <div class="program-stat-icon-wrapper stat-icon-amber">
                <i class="fas fa-chart-pie"></i>
            </div>
            <div class="program-stat-info">
                @php
                    $avg = round(($count ?? 19) / max($totalBidangs ?? 4, 1), 1);
                @endphp
                <span class="program-stat-value">~{{ $avg }} Inisiatif</span>
                <span class="program-stat-label">Rata-Rata Program/Bidang</span>
            </div>
        </div>

        <div class="program-stat-card">
            <div class="program-stat-icon-wrapper stat-icon-emerald">
                <i class="fas fa-circle-check"></i>
            </div>
            <div class="program-stat-info">
                <span class="program-stat-value">100%</span>
                <span class="program-stat-label">Status Inisiatif Aktif</span>
            </div>
        </div>
    </div>

    {{-- 3. TOOLBAR (SEARCH, FILTERS & VIEW SWITCHER) --}}
    <div class="program-toolbar">
        <div class="program-toolbar-left">
            <div class="program-search-box">
                <input type="text" id="programSearchInput" class="program-search-input" placeholder="Cari nama program kerja..." autocomplete="off">
                <i class="fas fa-magnifying-glass"></i>
            </div>

            <select id="filterBidang" class="program-filter-select" aria-label="Filter Berdasarkan Bidang">
                <option value="">Semua Bidang Kerja</option>
                @if(isset($bidangs))
                    @foreach($bidangs as $b)
                        <option value="{{ $b->id }}">Bidang #{{ $b->no_bidang }} - {{ $b->nama_bidang }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="program-toolbar-actions">
            <div class="program-view-switch" role="group" aria-label="Pilihan Tampilan">
                <button type="button" class="btn-view-switch active" id="btnViewGrid" title="Tampilan Kartu">
                    <i class="fas fa-grip"></i>
                    <span>Kartu</span>
                </button>
                <button type="button" class="btn-view-switch" id="btnViewList" title="Tampilan Baris">
                    <i class="fas fa-list"></i>
                    <span>Baris</span>
                </button>
                <button type="button" class="btn-view-switch" id="btnViewGrouped" title="Tampilan Per Bidang">
                    <i class="fas fa-layer-group"></i>
                    <span>Per Bidang</span>
                </button>
            </div>
        </div>
    </div>

    @if($programs->isEmpty())
        {{-- EMPTY STATE --}}
        <div class="program-empty-state">
            <div class="program-empty-icon">
                <i class="fas fa-folder-open"></i>
            </div>
            <h3 class="program-empty-title">Belum Ada Program Kerja</h3>
            <p class="program-empty-desc">
                Saat ini belum ada data program kegiatan yang terdaftar di sistem. Silakan tambahkan program kerja pertama untuk bidang tugas terkait.
            </p>
            <a href="{{ route('programs.create') }}" class="btn-tambah-program-modern">
                <i class="fas fa-plus"></i>
                <span>Tambah Program Pertama</span>
            </a>
        </div>
    @else
        {{-- 4. CARDS GRID VIEW (DEFAULT - NO TABLE IN TABLE) --}}
        <div class="program-cards-grid" id="programGridContainer">
            @foreach($programs as $program)
                @php
                    $bidangNama = $program->bidang ? $program->bidang->nama_bidang : 'Umum / Terkait';
                    $bidangNo = $program->bidang ? $program->bidang->no_bidang : '-';
                    $namaLower = strtolower($bidangNama);

                    $iconClass = 'fa-list-check';
                    $themeClass = 'theme-kewaspadaan';

                    if (str_contains($namaLower, 'kewaspadaan') || str_contains($namaLower, 'konflik')) {
                        $iconClass = 'fa-shield-halved';
                        $themeClass = 'theme-kewaspadaan';
                    } elseif (str_contains($namaLower, 'ketahanan') || str_contains($namaLower, 'ekonomi') || str_contains($namaLower, 'sosial') || str_contains($namaLower, 'ormas')) {
                        $iconClass = 'fa-hand-holding-heart';
                        $themeClass = 'theme-ketahanan';
                    } elseif (str_contains($namaLower, 'politik')) {
                        $iconClass = 'fa-landmark';
                        $themeClass = 'theme-politik';
                    } elseif (str_contains($namaLower, 'ideologi') || str_contains($namaLower, 'kebangsaan') || str_contains($namaLower, 'karakter')) {
                        $iconClass = 'fa-flag';
                        $themeClass = 'theme-ideologi';
                    }
                @endphp

                <div class="program-card {{ $themeClass }} item-program"
                     data-id="{{ $program->id }}"
                     data-bidang-id="{{ $program->bidang_id }}"
                     data-bidang="{{ strtolower($bidangNama) }}"
                     data-title="{{ strtolower($program->nama_program) }}">

                    {{-- Card Top --}}
                    <div class="program-card-top">
                        <div class="program-avatar-badge">
                            <div class="program-avatar-icon {{ $themeClass }}">
                                <i class="fas {{ $iconClass }}"></i>
                            </div>
                            <span class="program-number-chip">
                                Bidang #{{ $bidangNo }}
                            </span>
                        </div>

                        <div class="program-card-actions">
                            <a href="{{ route('programs.edit', $program->id) }}" 
                               class="btn-card-action btn-action-edit" 
                               title="Edit Program"
                               data-bs-toggle="tooltip">
                                <i class="fas fa-pen-to-square"></i>
                            </a>

                            <button type="button" 
                                    class="btn-card-action btn-action-delete" 
                                    title="Hapus Program"
                                    data-bs-toggle="tooltip"
                                    onclick="openDeleteProgramModal('{{ $program->id }}', '{{ addslashes($program->nama_program) }}')">
                                <i class="fas fa-trash-can"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Card Body --}}
                    <div class="program-card-body">
                        <div class="program-card-bidang">
                            <span class="badge-bidang-chip" title="{{ $bidangNama }}">
                                <i class="fas fa-sitemap"></i>
                                <span>{{ $bidangNama }}</span>
                            </span>
                        </div>

                        <h3 class="program-card-title" title="{{ $program->nama_program }}">
                            {{ $program->nama_program }}
                        </h3>

                        <div class="program-card-tags">
                            <span class="badge-status-program">
                                <span class="status-dot-pulse"></span>
                                <span>Inisiatif Aktif</span>
                            </span>
                        </div>
                    </div>

                    {{-- Card Footer --}}
                    <div class="program-card-footer">
                        <span>
                            <i class="far fa-clock me-1"></i> Terdaftar: {{ $program->created_at ? $program->created_at->format('d M Y') : 'Aktif' }}
                        </span>
                        <a href="{{ route('bidangs.index') }}" class="text-decoration-none small text-muted">
                            <i class="fas fa-arrow-right me-1"></i> Detail Bidang
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- 5. LIST VIEW (FLOATING ROW ITEMS - NO TABLE IN TABLE) --}}
        <div class="program-list-container d-none" id="programListContainer">
            @foreach($programs as $program)
                @php
                    $bidangNama = $program->bidang ? $program->bidang->nama_bidang : 'Umum / Terkait';
                    $bidangNo = $program->bidang ? $program->bidang->no_bidang : '-';
                    $namaLower = strtolower($bidangNama);

                    $iconClass = 'fa-list-check';
                    $themeClass = 'theme-kewaspadaan';

                    if (str_contains($namaLower, 'kewaspadaan') || str_contains($namaLower, 'konflik')) {
                        $iconClass = 'fa-shield-halved';
                        $themeClass = 'theme-kewaspadaan';
                    } elseif (str_contains($namaLower, 'ketahanan') || str_contains($namaLower, 'ekonomi') || str_contains($namaLower, 'sosial') || str_contains($namaLower, 'ormas')) {
                        $iconClass = 'fa-hand-holding-heart';
                        $themeClass = 'theme-ketahanan';
                    } elseif (str_contains($namaLower, 'politik')) {
                        $iconClass = 'fa-landmark';
                        $themeClass = 'theme-politik';
                    } elseif (str_contains($namaLower, 'ideologi') || str_contains($namaLower, 'kebangsaan') || str_contains($namaLower, 'karakter')) {
                        $iconClass = 'fa-flag';
                        $themeClass = 'theme-ideologi';
                    }
                @endphp

                <div class="program-list-item item-program"
                     data-id="{{ $program->id }}"
                     data-bidang-id="{{ $program->bidang_id }}"
                     data-bidang="{{ strtolower($bidangNama) }}"
                     data-title="{{ strtolower($program->nama_program) }}">
                    
                    <div class="program-list-left">
                        <div class="program-avatar-icon {{ $themeClass }}">
                            <i class="fas {{ $iconClass }}"></i>
                        </div>

                        <div class="program-list-content">
                            <h4 class="program-list-title">{{ $program->nama_program }}</h4>
                            <div class="program-list-submeta">
                                <span class="badge-bidang-chip">
                                    <i class="fas fa-sitemap"></i>
                                    <span>{{ $bidangNama }}</span>
                                </span>
                                <span class="program-number-chip">
                                    Bidang #{{ $bidangNo }}
                                </span>
                                <span class="badge-status-program">
                                    <span class="status-dot-pulse"></span>
                                    <span>Aktif</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="program-list-right">
                        <div class="program-card-actions">
                            <a href="{{ route('programs.edit', $program->id) }}" 
                               class="btn-card-action btn-action-edit" 
                               title="Edit Program"
                               data-bs-toggle="tooltip">
                                <i class="fas fa-pen-to-square"></i>
                            </a>

                            <button type="button" 
                                    class="btn-card-action btn-action-delete" 
                                    title="Hapus Program"
                                    data-bs-toggle="tooltip"
                                    onclick="openDeleteProgramModal('{{ $program->id }}', '{{ addslashes($program->nama_program) }}')">
                                <i class="fas fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- 6. GROUPED VIEW (PER BIDANG) --}}
        <div class="program-grouped-container d-none" id="programGroupedContainer">
            @if(isset($programsByBidang))
                @foreach($programsByBidang as $b)
                    <div class="program-group-card">
                        <div class="program-group-header">
                            <div class="program-group-header-left">
                                <div class="program-avatar-icon">
                                    <i class="fas fa-sitemap"></i>
                                </div>
                                <div>
                                    <h3 class="program-group-title">Bidang #{{ $b->no_bidang }} - {{ $b->nama_bidang }}</h3>
                                    <span class="text-muted small">{{ $b->programs->count() }} Program Kerja Terhubung</span>
                                </div>
                            </div>
                            <span class="badge bg-danger text-white px-3 py-2 rounded-pill fw-bold">
                                {{ $b->programs->count() }} Inisiatif
                            </span>
                        </div>

                        <div class="program-group-body">
                            @if($b->programs->isEmpty())
                                <div class="text-muted small py-3 text-center">
                                    <i class="fas fa-circle-info me-1"></i> Belum ada program kerja yang ditambahkan untuk bidang ini.
                                </div>
                            @else
                                <div class="program-group-items-list">
                                    @foreach($b->programs as $bp)
                                        <div class="program-pill-item">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="fas fa-circle-check text-success fs-6"></i>
                                                <span class="program-pill-title">{{ $bp->nama_program }}</span>
                                            </div>

                                            <div class="program-card-actions">
                                                <a href="{{ route('programs.edit', $bp->id) }}" 
                                                   class="btn-card-action btn-action-edit" 
                                                   title="Edit Program"
                                                   data-bs-toggle="tooltip">
                                                    <i class="fas fa-pen-to-square"></i>
                                                </a>

                                                <button type="button" 
                                                        class="btn-card-action btn-action-delete" 
                                                        title="Hapus Program"
                                                        data-bs-toggle="tooltip"
                                                        onclick="openDeleteProgramModal('{{ $bp->id }}', '{{ addslashes($bp->nama_program) }}')">
                                                    <i class="fas fa-trash-can"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        {{-- No Search Result Feedback --}}
        <div id="noSearchMatch" class="program-empty-state d-none">
            <div class="program-empty-icon">
                <i class="fas fa-magnifying-glass"></i>
            </div>
            <h4 class="program-empty-title">Tidak Ada Program Yang Cocok</h4>
            <p class="program-empty-desc">
                Pencarian atau filter bidang tidak menemukan program kerja yang sesuai.
            </p>
            <button type="button" id="btnResetFilters" class="btn-tambah-program-modern">
                <i class="fas fa-rotate-left"></i>
                <span>Reset Pencarian &amp; Filter</span>
            </button>
        </div>

        {{-- Pagination --}}
        @if($programs->hasPages())
            <div class="d-flex justify-content-end mt-4">
                {{ $programs->links('pagination::bootstrap-5') }}
            </div>
        @endif
    @endif

</div>

{{-- MODAL KONFIRMASI HAPUS ELEGAN --}}
<div class="modal fade modal-program-delete" id="modalDeleteProgram" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-delete-icon-box">
                    <i class="fas fa-triangle-exclamation"></i>
                </div>
                <h4 class="fw-bold text-dark mb-2" id="modalDeleteLabel">Hapus Program Kerja?</h4>
                <p class="text-muted small mb-1">
                    Tindakan ini tidak dapat dibatalkan. Agenda program kerja akan dihapus secara permanen dari sistem.
                </p>

                <div class="modal-program-name-highlight" id="deleteProgramName">
                    <!-- Dynamic Title -->
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-modal-cancel" data-bs-dismiss="modal">
                    Batal
                </button>
                <form id="formDeleteProgram" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-modal-delete">
                        <i class="fas fa-trash-can me-1"></i> Ya, Hapus Program
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard-program.css') }}">
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Search & Filter
        const searchInput = document.getElementById('programSearchInput');
        const filterBidang = document.getElementById('filterBidang');
        const btnReset = document.getElementById('btnResetFilters');
        const items = document.querySelectorAll('.item-program');
        const noMatchBox = document.getElementById('noSearchMatch');
        const gridContainer = document.getElementById('programGridContainer');
        const listContainer = document.getElementById('programListContainer');
        const groupedContainer = document.getElementById('programGroupedContainer');

        function filterPrograms() {
            const keyword = searchInput ? searchInput.value.toLowerCase().trim() : '';
            const selectedBidang = filterBidang ? filterBidang.value : '';
            let visibleCount = 0;

            items.forEach(item => {
                const title = item.getAttribute('data-title') || '';
                const bidang = item.getAttribute('data-bidang') || '';
                const bidangId = item.getAttribute('data-bidang-id') || '';

                const matchesKeyword = !keyword || title.includes(keyword) || bidang.includes(keyword);
                const matchesBidang = !selectedBidang || (bidangId === selectedBidang);

                if (matchesKeyword && matchesBidang) {
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

        if (searchInput) searchInput.addEventListener('input', filterPrograms);
        if (filterBidang) filterBidang.addEventListener('change', filterPrograms);

        if (btnReset) {
            btnReset.addEventListener('click', function () {
                if (searchInput) searchInput.value = '';
                if (filterBidang) filterBidang.value = '';
                filterPrograms();
            });
        }

        // View Switcher (Grid vs List vs Grouped)
        const btnGrid = document.getElementById('btnViewGrid');
        const btnList = document.getElementById('btnViewList');
        const btnGrouped = document.getElementById('btnViewGrouped');

        function setViewMode(mode) {
            [gridContainer, listContainer, groupedContainer].forEach(c => {
                if (c) c.classList.add('d-none');
            });
            [btnGrid, btnList, btnGrouped].forEach(b => {
                if (b) b.classList.remove('active');
            });

            if (mode === 'list') {
                if (listContainer) listContainer.classList.remove('d-none');
                if (btnList) btnList.classList.add('active');
                localStorage.setItem('program_view_mode', 'list');
            } else if (mode === 'grouped') {
                if (groupedContainer) groupedContainer.classList.remove('d-none');
                if (btnGrouped) btnGrouped.classList.add('active');
                localStorage.setItem('program_view_mode', 'grouped');
            } else {
                if (gridContainer) gridContainer.classList.remove('d-none');
                if (btnGrid) btnGrid.classList.add('active');
                localStorage.setItem('program_view_mode', 'grid');
            }
        }

        if (btnGrid) btnGrid.addEventListener('click', () => setViewMode('grid'));
        if (btnList) btnList.addEventListener('click', () => setViewMode('list'));
        if (btnGrouped) btnGrouped.addEventListener('click', () => setViewMode('grouped'));

        // Load saved preference
        const savedMode = localStorage.getItem('program_view_mode');
        if (savedMode && ['grid', 'list', 'grouped'].includes(savedMode)) {
            setViewMode(savedMode);
        }
    });

    // Delete Modal Trigger
    function openDeleteProgramModal(id, title) {
        const modalEl = document.getElementById('modalDeleteProgram');
        const form = document.getElementById('formDeleteProgram');
        const nameBox = document.getElementById('deleteProgramName');

        form.action = `/programs/${id}`;
        nameBox.textContent = title;

        if (modalEl && window.bootstrap && bootstrap.Modal) {
            bootstrap.Modal.getOrCreateInstance(modalEl).show();
        }
    }
</script>
@endpush
