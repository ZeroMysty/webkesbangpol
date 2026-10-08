@extends('dashboard.layouts.app')

@section('title', 'Daftar Bidang')

@section('content')
<div class="bidang-page-wrapper">

    {{-- 1. HERO HEADER --}}
    <div class="bidang-hero-header">
        <div class="bidang-header-left">
            <div class="bidang-badge-category">
                <i class="fas fa-sitemap"></i>
                <span>Struktur Organisasi</span>
            </div>
            <h1 class="bidang-header-title">Bidang & Divisi Kerja</h1>
            <p class="bidang-header-subtitle">
                Kelola pembagian bidang tugas serta koordinasi program kerja Badan Kesatuan Bangsa dan Politik Kota Bandung.
            </p>
        </div>
        <div class="bidang-header-right">
            <a href="{{ route('bidangs.create') }}" class="btn-tambah-bidang-modern">
                <i class="fas fa-plus"></i>
                <span>Tambah Bidang</span>
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
    <div class="bidang-stats-grid">
        <div class="bidang-stat-card">
            <div class="bidang-stat-icon-wrapper stat-icon-red">
                <i class="fas fa-sitemap"></i>
            </div>
            <div class="bidang-stat-info">
                <span class="bidang-stat-value">{{ $count ?? $bidangs->total() }}</span>
                <span class="bidang-stat-label">Total Bidang Terdaftar</span>
            </div>
        </div>

        <div class="bidang-stat-card">
            <div class="bidang-stat-icon-wrapper stat-icon-indigo">
                <i class="fas fa-layer-group"></i>
            </div>
            <div class="bidang-stat-info">
                <span class="bidang-stat-value">{{ $totalPrograms ?? 0 }}</span>
                <span class="bidang-stat-label">Program Kerja Terhubung</span>
            </div>
        </div>

        <div class="bidang-stat-card">
            <div class="bidang-stat-icon-wrapper stat-icon-emerald">
                <i class="fas fa-shield-halved"></i>
            </div>
            <div class="bidang-stat-info">
                <span class="bidang-stat-value">100%</span>
                <span class="bidang-stat-label">Status Unit Aktif</span>
            </div>
        </div>
    </div>

    {{-- 3. TOOLBAR (SEARCH & VIEW SWITCHER) --}}
    <div class="bidang-toolbar">
        <div class="bidang-search-box">
            <input type="text" id="bidangSearchInput" class="bidang-search-input" placeholder="Cari nama bidang atau nomor urut..." autocomplete="off">
            <i class="fas fa-magnifying-glass"></i>
        </div>

        <div class="bidang-toolbar-actions">
            <div class="bidang-view-switch" role="group" aria-label="Pilihan Tampilan">
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

    @if($bidangs->isEmpty())
        {{-- EMPTY STATE --}}
        <div class="bidang-empty-state">
            <div class="bidang-empty-icon">
                <i class="fas fa-folder-open"></i>
            </div>
            <h3 class="bidang-empty-title">Belum Ada Data Bidang</h3>
            <p class="bidang-empty-desc">
                Saat ini belum ada data bidang yang terdaftar di sistem. Silakan tambahkan bidang baru untuk mengelola struktur organisasi.
            </p>
            <a href="{{ route('bidangs.create') }}" class="btn-tambah-bidang-modern">
                <i class="fas fa-plus"></i>
                <span>Tambah Bidang Pertama</span>
            </a>
        </div>
    @else
        {{-- 4. GRID CARDS VIEW (DEFAULT - NO TABLE IN TABLE) --}}
        <div class="bidang-cards-grid" id="bidangGridContainer">
            @foreach($bidangs as $bidang)
                @php
                    $namaLower = strtolower($bidang->nama_bidang);
                    $iconClass = 'fa-sitemap';
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

                <div class="bidang-card item-bidang" 
                     data-name="{{ strtolower($bidang->nama_bidang) }}" 
                     data-no="{{ strtolower($bidang->no_bidang) }}">
                    
                    {{-- Card Top --}}
                    <div class="bidang-card-top">
                        <div class="bidang-avatar-badge">
                            <div class="bidang-avatar-icon {{ $themeClass }}">
                                <i class="fas {{ $iconClass }}"></i>
                            </div>
                            <span class="bidang-number-chip">
                                Bidang #{{ $bidang->no_bidang }}
                            </span>
                        </div>

                        <div class="bidang-card-actions">
                            <a href="{{ route('bidangs.edit', $bidang->id) }}" 
                               class="btn-card-action btn-action-edit" 
                               title="Edit Bidang"
                               data-bs-toggle="tooltip">
                                <i class="fas fa-pen-to-square"></i>
                            </a>

                            <button type="button" 
                                    class="btn-card-action btn-action-delete" 
                                    title="Hapus Bidang"
                                    data-bs-toggle="tooltip"
                                    onclick="openDeleteModal('{{ $bidang->id }}', '{{ addslashes($bidang->nama_bidang) }}', '{{ $bidang->programs_count ?? 0 }}')">
                                <i class="fas fa-trash-can"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Card Body --}}
                    <div class="bidang-card-body">
                        <h3 class="bidang-card-title" title="{{ $bidang->nama_bidang }}">
                            {{ $bidang->nama_bidang }}
                        </h3>

                        <div class="bidang-card-tags">
                            <span class="badge-tag-program">
                                <i class="fas fa-layer-group"></i>
                                <span><strong>{{ $bidang->programs_count ?? 0 }}</strong> Program Kerja</span>
                            </span>

                            <span class="badge-tag-status">
                                <span class="status-dot-pulse"></span>
                                <span>Aktif</span>
                            </span>
                        </div>
                    </div>

                    {{-- Card Footer --}}
                    <div class="bidang-card-footer">
                        <a href="{{ route('programs.index') }}" class="btn-card-view-programs">
                            <span>Kelola Program</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>

                        <span class="bidang-card-meta-date">
                            <i class="far fa-clock me-1"></i> {{ $bidang->created_at ? $bidang->created_at->format('d M Y') : 'Terdaftar' }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- 5. LIST VIEW (FLOATING ROW ITEMS - NO TABLE IN TABLE) --}}
        <div class="bidang-list-container d-none" id="bidangListContainer">
            @foreach($bidangs as $bidang)
                @php
                    $namaLower = strtolower($bidang->nama_bidang);
                    $iconClass = 'fa-sitemap';
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

                <div class="bidang-list-item item-bidang" 
                     data-name="{{ strtolower($bidang->nama_bidang) }}" 
                     data-no="{{ strtolower($bidang->no_bidang) }}">
                    
                    <div class="bidang-list-left">
                        <div class="bidang-list-avatar {{ $themeClass }}">
                            <i class="fas {{ $iconClass }}"></i>
                        </div>

                        <div class="bidang-list-content">
                            <div class="bidang-list-title">
                                {{ $bidang->nama_bidang }}
                            </div>
                            <div class="bidang-list-submeta">
                                <span class="bidang-number-chip">
                                    Bidang #{{ $bidang->no_bidang }}
                                </span>
                                <span class="badge-tag-program">
                                    <i class="fas fa-layer-group"></i>
                                    <span><strong>{{ $bidang->programs_count ?? 0 }}</strong> Program</span>
                                </span>
                                <span class="badge-tag-status">
                                    <span class="status-dot-pulse"></span>
                                    <span>Aktif</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="bidang-list-right">
                        <a href="{{ route('programs.index') }}" class="btn-card-view-programs me-2 d-none d-md-inline-flex">
                            <span>Program</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>

                        <div class="bidang-card-actions">
                            <a href="{{ route('bidangs.edit', $bidang->id) }}" 
                               class="btn-card-action btn-action-edit" 
                               title="Edit Bidang"
                               data-bs-toggle="tooltip">
                                <i class="fas fa-pen-to-square"></i>
                            </a>

                            <button type="button" 
                                    class="btn-card-action btn-action-delete" 
                                    title="Hapus Bidang"
                                    data-bs-toggle="tooltip"
                                    onclick="openDeleteModal('{{ $bidang->id }}', '{{ addslashes($bidang->nama_bidang) }}', '{{ $bidang->programs_count ?? 0 }}')">
                                <i class="fas fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- No Search Result Feedback --}}
        <div id="noSearchMatch" class="bidang-empty-state d-none">
            <div class="bidang-empty-icon">
                <i class="fas fa-magnifying-glass"></i>
            </div>
            <h4 class="bidang-empty-title">Tidak Ada Bidang Yang Cocok</h4>
            <p class="bidang-empty-desc">
                Pencarian untuk kata kunci tersebut tidak menemukan hasil. Silakan periksa kembali ejaan atau nomor bidang.
            </p>
        </div>

        {{-- Pagination jika ada lebih banyak data --}}
        @if($bidangs->hasPages())
            <div class="d-flex justify-content-end mt-4">
                {{ $bidangs->links('pagination::bootstrap-5') }}
            </div>
        @endif
    @endif

</div>

{{-- MODAL KONFIRMASI HAPUS ELEGAN --}}
<div class="modal fade modal-bidang-delete" id="modalDeleteBidang" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-delete-icon-box">
                    <i class="fas fa-triangle-exclamation"></i>
                </div>
                <h4 class="fw-bold text-dark mb-2" id="modalDeleteLabel">Hapus Data Bidang?</h4>
                <p class="text-muted small mb-1">
                    Tindakan ini tidak dapat dibatalkan. Bidang yang dipilih akan dihapus secara permanen dari sistem.
                </p>

                <div class="modal-bidang-name-highlight" id="deleteBidangName">
                    <!-- Dynamic Name -->
                </div>

                <div id="deleteWarningRelated" class="alert alert-warning py-2 px-3 small text-start d-none mb-0">
                    <i class="fas fa-exclamation-circle me-1"></i>
                    Bidang ini memiliki <strong id="deleteRelatedCount">0</strong> program kerja terkait. Harap pindahkan atau hapus program tersebut terlebih dahulu.
                </div>
            </div>

            <div class="modal-bidang-footer">
                <button type="button" class="btn-modal-cancel" data-bs-dismiss="modal">
                    Batal
                </button>
                <form id="formDeleteBidang" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-modal-delete">
                        <i class="fas fa-trash-can me-1"></i> Ya, Hapus Bidang
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
        // Initialize Tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Search Filter
        const searchInput = document.getElementById('bidangSearchInput');
        const items = document.querySelectorAll('.item-bidang');
        const noMatchBox = document.getElementById('noSearchMatch');
        const gridContainer = document.getElementById('bidangGridContainer');
        const listContainer = document.getElementById('bidangListContainer');

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                const keyword = this.value.toLowerCase().trim();
                let visibleCount = 0;

                items.forEach(item => {
                    const name = item.getAttribute('data-name') || '';
                    const no = item.getAttribute('data-no') || '';

                    if (name.includes(keyword) || no.includes(keyword)) {
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
                localStorage.setItem('bidang_view_mode', 'list');
            } else {
                listContainer.classList.add('d-none');
                gridContainer.classList.remove('d-none');
                btnGrid.classList.add('active');
                btnList.classList.remove('active');
                localStorage.setItem('bidang_view_mode', 'grid');
            }
        }

        if (btnGrid && btnList) {
            btnGrid.addEventListener('click', () => setViewMode('grid'));
            btnList.addEventListener('click', () => setViewMode('list'));

            // Load saved preference
            const savedMode = localStorage.getItem('bidang_view_mode');
            if (savedMode === 'list') {
                setViewMode('list');
            }
        }
    });

    // Delete Modal Trigger
    function openDeleteModal(id, name, programsCount) {
        const modal = new bootstrap.Modal(document.getElementById('modalDeleteBidang'));
        const form = document.getElementById('formDeleteBidang');
        const nameBox = document.getElementById('deleteBidangName');
        const warningBox = document.getElementById('deleteWarningRelated');
        const countSpan = document.getElementById('deleteRelatedCount');

        form.action = `/bidangs/${id}`;
        nameBox.textContent = name;

        if (parseInt(programsCount) > 0) {
            warningBox.classList.remove('d-none');
            countSpan.textContent = programsCount;
        } else {
            warningBox.classList.add('d-none');
        }

        modal.show();
    }
</script>
@endpush
