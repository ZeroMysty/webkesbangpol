@extends('dashboard.layouts.app')

@section('title', 'Rencana Strategis (RENSTRA)')

@section('content')
<div class="sakip-page-wrapper">

    {{-- 1. HERO HEADER --}}
    <div class="sakip-hero-header">
        <div class="sakip-header-left">
            <div class="sakip-badge-category">
                <i class="fas fa-bullseye"></i>
                <span>SAKIP & Perencanaan Jangka Menengah</span>
            </div>
            <h1 class="sakip-header-title">Rencana Strategis (RENSTRA)</h1>
            <p class="sakip-header-subtitle">
                Kelola dokumen perencanaan strategis lima tahunan yang memuat visi, misi, tujuan, strategi, sasaran, dan kebijakan Badan Kesatuan Bangsa dan Politik Kota Bandung.
            </p>
        </div>
        <div class="sakip-header-right">
            <a href="{{ route('renstra.create') }}" class="btn-tambah-sakip-modern">
                <i class="fas fa-plus"></i>
                <span>Tambah Dokumen RENSTRA</span>
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
    <div class="sakip-stats-grid">
        <div class="sakip-stat-card">
            <div class="sakip-stat-icon-wrapper stat-icon-red">
                <i class="fas fa-bullseye"></i>
            </div>
            <div class="sakip-stat-info">
                <span class="sakip-stat-value">{{ $renstras->total() }}</span>
                <span class="sakip-stat-label">Total Dokumen RENSTRA</span>
            </div>
        </div>

        <div class="sakip-stat-card">
            <div class="sakip-stat-icon-wrapper stat-icon-amber">
                <i class="fas fa-timeline"></i>
            </div>
            <div class="sakip-stat-info">
                @php
                    $latestRenstra = $renstras->sortByDesc('tahun_selesai')->first();
                @endphp
                <span class="sakip-stat-value" style="font-size: 1.25rem;">
                    {{ $latestRenstra ? ($latestRenstra->tahun_mulai . ' - ' . $latestRenstra->tahun_selesai) : '-' }}
                </span>
                <span class="sakip-stat-label">Periode Strategis Terkini</span>
            </div>
        </div>

        <div class="sakip-stat-card">
            <div class="sakip-stat-icon-wrapper stat-icon-indigo">
                <i class="fas fa-shield-halved"></i>
            </div>
            <div class="sakip-stat-info">
                <span class="sakip-stat-value">{{ $renstras->filter(fn($r) => !empty($r->file_upload_wm))->count() }}</span>
                <span class="sakip-stat-label">Dokumen Watermark</span>
            </div>
        </div>

        <div class="sakip-stat-card">
            <div class="sakip-stat-icon-wrapper stat-icon-emerald">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="sakip-stat-info">
                <span class="sakip-stat-value">Publik</span>
                <span class="sakip-stat-label">Akses Dokumen SAKIP</span>
            </div>
        </div>
    </div>

    {{-- 3. TOOLBAR --}}
    <div class="sakip-toolbar">
        <div class="sakip-toolbar-left">
            <div class="sakip-search-box">
                <i class="fas fa-magnifying-glass"></i>
                <input type="text" id="sakipSearchInput" class="sakip-search-input" placeholder="Cari judul RENSTRA atau periode tahun..." autocomplete="off">
            </div>

            <button type="button" id="btnResetFilters" class="btn-reset-filter" title="Reset Pencarian">
                <i class="fas fa-rotate-left"></i>
                <span>Reset</span>
            </button>
        </div>

        <div class="sakip-toolbar-actions">
            <div class="sakip-view-switch" role="group" aria-label="Pilihan Tampilan">
                <button type="button" id="btnViewGrid" class="btn-view-switch active" title="Tampilan Grid Kartu">
                    <i class="fas fa-grid-2"></i>
                    <span>Grid</span>
                </button>
                <button type="button" id="btnViewList" class="btn-view-switch" title="Tampilan Daftar Baris">
                    <i class="fas fa-list-ul"></i>
                    <span>List</span>
                </button>
            </div>
        </div>
    </div>

    {{-- 4. KONTEN (GRID VIEW & LIST VIEW) --}}
    @if($renstras->count() > 0)
        {{-- A. Grid Cards View --}}
        <div id="sakipGridContainer" class="sakip-cards-grid">
            @foreach($renstras as $renstra)
                <div class="sakip-card item-sakip" 
                     data-search="{{ strtolower($renstra->title . ' ' . $renstra->tahun_mulai . ' ' . $renstra->tahun_selesai) }}">
                    
                    {{-- Card Top --}}
                    <div class="sakip-card-top">
                        <div class="sakip-card-badges">
                            <span class="chip-sakip-year">
                                <i class="fas fa-calendar-range"></i>
                                <span>Periode {{ $renstra->tahun_mulai }} – {{ $renstra->tahun_selesai }}</span>
                            </span>
                        </div>

                        <div class="sakip-card-actions">
                            <a href="{{ route('renstra.edit', $renstra->id) }}" 
                               class="btn-card-action btn-action-edit" 
                               title="Edit Dokumen RENSTRA" 
                               data-bs-toggle="tooltip">
                                <i class="fas fa-pen-to-square"></i>
                            </a>

                            <button type="button" 
                                    class="btn-card-action btn-action-delete" 
                                    title="Hapus Dokumen RENSTRA" 
                                    data-bs-toggle="tooltip"
                                    onclick="openDeleteModal('{{ $renstra->id }}', '{{ addslashes($renstra->title) }}', '{{ route('renstra.destroy', $renstra->id) }}')">
                                <i class="fas fa-trash-can"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Card Body --}}
                    <div class="sakip-card-body">
                        <div class="sakip-card-icon-box">
                            <i class="fas fa-bullseye"></i>
                        </div>

                        <h3 class="sakip-card-title">
                            {{ $renstra->title }}
                        </h3>

                        {{-- Download Chips --}}
                        <div class="sakip-download-chips">
                            @if($renstra->file_upload)
                                <a href="{{ asset($renstra->file_upload) }}" target="_blank" class="sakip-download-chip original" title="Unduh File Asli">
                                    <div class="sakip-download-chip-left">
                                        <i class="fas fa-file-pdf"></i>
                                        <span>Dokumen Asli (PDF)</span>
                                    </div>
                                    <i class="fas fa-arrow-up-right-from-square"></i>
                                </a>
                            @endif

                            @if($renstra->file_upload_wm)
                                <a href="{{ asset($renstra->file_upload_wm) }}" target="_blank" class="sakip-download-chip watermark" title="Unduh File Watermark Resmi">
                                    <div class="sakip-download-chip-left">
                                        <i class="fas fa-stamp"></i>
                                        <span>Dokumen Watermark (Publik)</span>
                                    </div>
                                    <i class="fas fa-arrow-up-right-from-square"></i>
                                </a>
                            @endif
                        </div>
                    </div>

                    {{-- Card Footer --}}
                    <div class="sakip-card-footer">
                        <span>
                            <i class="far fa-clock me-1"></i>
                            {{ $renstra->created_at ? $renstra->created_at->format('d M Y') : 'SAKIP Bakesbangpol' }}
                        </span>
                        <span class="badge bg-light text-secondary border">
                            <i class="fas fa-file-shield me-1 text-danger"></i> Dokumen 5 Tahunan
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- B. Floating List View --}}
        <div id="sakipListContainer" class="sakip-list-container d-none">
            @foreach($renstras as $renstra)
                <div class="sakip-list-item item-sakip" 
                     data-search="{{ strtolower($renstra->title . ' ' . $renstra->tahun_mulai . ' ' . $renstra->tahun_selesai) }}">
                    
                    <div class="sakip-list-left">
                        <div class="sakip-list-avatar">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <div class="sakip-list-content">
                            <h4 class="sakip-list-title">{{ $renstra->title }}</h4>
                            <div class="sakip-list-submeta">
                                <span class="chip-sakip-year">
                                    <i class="fas fa-calendar-range"></i> Periode {{ $renstra->tahun_mulai }} – {{ $renstra->tahun_selesai }}
                                </span>
                                <span class="text-muted small">
                                    <i class="far fa-calendar-check me-1"></i>
                                    {{ $renstra->created_at ? $renstra->created_at->format('d M Y') : 'Terbit' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="sakip-list-right">
                        <div class="d-flex align-items-center gap-2">
                            @if($renstra->file_upload)
                                <a href="{{ asset($renstra->file_upload) }}" target="_blank" class="sakip-download-chip original" style="padding: 0.4rem 0.75rem;" title="Dokumen Asli">
                                    <i class="fas fa-file-pdf me-1"></i> Asli
                                </a>
                            @endif
                            @if($renstra->file_upload_wm)
                                <a href="{{ asset($renstra->file_upload_wm) }}" target="_blank" class="sakip-download-chip watermark" style="padding: 0.4rem 0.75rem;" title="Dokumen Watermark">
                                    <i class="fas fa-stamp me-1"></i> Watermark
                                </a>
                            @endif
                        </div>

                        <div class="d-flex align-items-center gap-1 ms-2">
                            <a href="{{ route('renstra.edit', $renstra->id) }}" 
                               class="btn-card-action btn-action-edit" 
                               title="Edit Dokumen RENSTRA" 
                               data-bs-toggle="tooltip">
                                <i class="fas fa-pen-to-square"></i>
                            </a>
                            <button type="button" 
                                    class="btn-card-action btn-action-delete" 
                                    title="Hapus Dokumen RENSTRA" 
                                    data-bs-toggle="tooltip"
                                    onclick="openDeleteModal('{{ $renstra->id }}', '{{ addslashes($renstra->title) }}', '{{ route('renstra.destroy', $renstra->id) }}')">
                                <i class="fas fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- No Search Match Notice --}}
        <div id="noSearchMatch" class="sakip-empty-state d-none">
            <div class="sakip-empty-icon">
                <i class="fas fa-magnifying-glass"></i>
            </div>
            <h3 class="sakip-empty-title">Tidak Ada Dokumen Yang Cocok</h3>
            <p class="sakip-empty-desc">
                Pencarian yang Anda masukkan tidak menemukan hasil yang sesuai. Coba gunakan kata kunci lain.
            </p>
            <button type="button" class="btn btn-secondary btn-sm rounded-pill px-4" onclick="document.getElementById('btnResetFilters').click()">
                <i class="fas fa-rotate-left me-1"></i> Reset Pencarian
            </button>
        </div>

        {{-- Pagination --}}
        <div class="mt-4 d-flex justify-content-center">
            {{ $renstras->links('pagination::bootstrap-5') }}
        </div>
    @else
        {{-- Empty State --}}
        <div class="sakip-empty-state">
            <div class="sakip-empty-icon">
                <i class="fas fa-bullseye"></i>
            </div>
            <h3 class="sakip-empty-title">Belum Ada Dokumen RENSTRA</h3>
            <p class="sakip-empty-desc">
                Data Rencana Strategis lima tahunan belum tersedia. Klik tombol di bawah untuk menambahkan dokumen RENSTRA baru ke dalam sistem.
            </p>
            <a href="{{ route('renstra.create') }}" class="btn-tambah-sakip-modern mx-auto">
                <i class="fas fa-plus"></i>
                <span>Tambah RENSTRA Sekarang</span>
            </a>
        </div>
    @endif

</div>

{{-- MODAL HAPUS DATA --}}
<div class="modal fade modal-sakip-delete" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-sakip-icon-danger">
                    <i class="fas fa-trash-can"></i>
                </div>
                <h4 class="modal-sakip-title" id="deleteModalLabel">Hapus Dokumen RENSTRA?</h4>
                <p class="modal-sakip-desc">
                    Tindakan ini tidak dapat dibatalkan. Dokumen Rencana Strategis beserta berkas fisik yang tersimpan akan dihapus secara permanen.
                </p>
                <div class="modal-sakip-name-highlight" id="deleteItemTitle">
                    <!-- Judul dokumen dinamis -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-modal-cancel" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-modal-delete">
                        <i class="fas fa-trash-can me-1"></i> Ya, Hapus Dokumen
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Tooltip BS5
        const tooltips = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltips.forEach(el => new bootstrap.Tooltip(el));

        // Search
        const searchInput = document.getElementById('sakipSearchInput');
        const btnReset = document.getElementById('btnResetFilters');
        const items = document.querySelectorAll('.item-sakip');
        const noMatchBox = document.getElementById('noSearchMatch');
        const gridContainer = document.getElementById('sakipGridContainer');
        const listContainer = document.getElementById('sakipListContainer');

        function filterItems() {
            const keyword = searchInput ? searchInput.value.toLowerCase().trim() : '';
            let visibleCount = 0;

            items.forEach(item => {
                const searchData = item.getAttribute('data-search') || '';
                const matchKeyword = !keyword || searchData.includes(keyword);

                if (matchKeyword) {
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
        if (btnReset) {
            btnReset.addEventListener('click', function () {
                if (searchInput) searchInput.value = '';
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
                if (btnGrid) btnGrid.classList.remove('active');
                if (btnList) btnList.classList.add('active');
                localStorage.setItem('sakip_view_mode', 'list');
            } else {
                gridContainer.classList.remove('d-none');
                listContainer.classList.add('d-none');
                if (btnGrid) btnGrid.classList.add('active');
                if (btnList) btnList.classList.remove('active');
                localStorage.setItem('sakip_view_mode', 'grid');
            }
        }

        if (btnGrid) btnGrid.addEventListener('click', () => setViewMode('grid'));
        if (btnList) btnList.addEventListener('click', () => setViewMode('list'));

        const savedMode = localStorage.getItem('sakip_view_mode') || 'grid';
        setViewMode(savedMode);
    });

    // Modal Hapus Global
    function openDeleteModal(id, title, actionUrl) {
        const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        document.getElementById('deleteItemTitle').textContent = title;
        document.getElementById('deleteForm').action = actionUrl;
        modal.show();
    }
</script>
@endpush