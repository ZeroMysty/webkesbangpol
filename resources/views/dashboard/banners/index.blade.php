@extends('dashboard.layouts.app')

@section('title', 'Banner Beranda')

@section('content')
<div class="banner-page-wrapper">

    {{-- 1. HERO HEADER --}}
    <div class="banner-hero-header">
        <div class="banner-header-left">
            <div class="banner-badge-category">
                <i class="fas fa-image"></i>
                <span>Media Promosi & Banner</span>
            </div>
            <h1 class="banner-header-title">Manajemen Banner Beranda</h1>
            <p class="banner-header-subtitle">
                Kelola foto spanduk visual, slider utama, dan informasi sorotan pada beranda website Bakesbangpol Kota Bandung.
            </p>
        </div>
        <div class="banner-header-right">
            <a href="{{ route('banners.create') }}" class="btn-tambah-banner-modern">
                <i class="fas fa-plus"></i>
                <span>Tambah Banner Baru</span>
            </a>
        </div>
    </div>

    {{-- Session Feedback --}}
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
    <div class="banner-stats-grid">
        <div class="banner-stat-card">
            <div class="banner-stat-icon-wrapper stat-icon-red">
                <i class="fas fa-image"></i>
            </div>
            <div class="banner-stat-info">
                <span class="banner-stat-value">{{ $count ?? $banners->total() }}</span>
                <span class="banner-stat-label">Total Banner Tersedia</span>
            </div>
        </div>

        <div class="banner-stat-card">
            <div class="banner-stat-icon-wrapper stat-icon-indigo">
                <i class="fas fa-sliders"></i>
            </div>
            <div class="banner-stat-info">
                <span class="banner-stat-value">Aktif</span>
                <span class="banner-stat-label">Slider Beranda Utama</span>
            </div>
        </div>

        <div class="banner-stat-card">
            <div class="banner-stat-icon-wrapper stat-icon-emerald">
                <i class="fas fa-expand"></i>
            </div>
            <div class="banner-stat-info">
                <span class="banner-stat-value">16 : 9</span>
                <span class="banner-stat-label">Rasio Tampilan Optimal</span>
            </div>
        </div>
    </div>

    {{-- 3. TOOLBAR CONTROLS --}}
    <div class="banner-toolbar">
        <div class="banner-search-box">
            <input type="text" id="bannerSearchInput" class="banner-search-input" placeholder="Cari judul banner atau caption..." autocomplete="off">
            <i class="fas fa-magnifying-glass"></i>
        </div>

        <div class="banner-toolbar-actions">
            <div class="banner-view-switch" role="group" aria-label="Pilihan Tampilan">
                <button type="button" class="btn-view-switch active" id="btnViewGrid" title="Tampilan Kartu Visual">
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

    @if($banners->isEmpty())
        {{-- EMPTY STATE --}}
        <div class="banner-empty-state">
            <div class="banner-empty-icon">
                <i class="fas fa-image"></i>
            </div>
            <h3 class="banner-empty-title">Belum Ada Banner Ditambahkan</h3>
            <p class="banner-empty-desc">
                Saat ini belum ada banner yang ditampilkan pada beranda website. Tambahkan banner visual pertama Anda sekarang.
            </p>
            <a href="{{ route('banners.create') }}" class="btn-tambah-banner-modern">
                <i class="fas fa-plus"></i>
                <span>Tambah Banner Pertama</span>
            </a>
        </div>
    @else
        {{-- 4. CARDS GRID VIEW (PANORAMIC BANNER - NO TABLE IN TABLE) --}}
        <div class="banner-cards-grid" id="bannerGridContainer">
            @foreach($banners as $banner)
                @php
                    $bannerDate = $banner->created_at ? \Carbon\Carbon::parse($banner->created_at)->format('d M Y') : '-';
                    $imageUrl = asset('images/banner/' . $banner->gambar_upload);
                @endphp

                <div class="banner-card item-banner" 
                     data-title="{{ strtolower($banner->judul) }}" 
                     data-caption="{{ strtolower($banner->caption) }}">
                    
                    {{-- Media Area --}}
                    <div class="banner-thumbnail-box btn-preview-banner" 
                         data-img="{{ $imageUrl }}" 
                         data-title="{{ $banner->judul }}" 
                         data-caption="{{ $banner->caption }}"
                         title="Klik untuk pratinjau penuh">
                        <img src="{{ $imageUrl }}" alt="{{ $banner->judul }}" class="banner-thumbnail-img" loading="lazy">

                        <div class="banner-overlay-top">
                            <span class="banner-badge-chip">
                                <i class="fas fa-desktop"></i> Slider #{{ $loop->iteration }}
                            </span>

                            <span class="banner-date-chip">
                                <i class="far fa-calendar-alt"></i> {{ $bannerDate }}
                            </span>
                        </div>

                        <div class="banner-preview-overlay">
                            <i class="fas fa-magnifying-glass-plus"></i>
                        </div>
                    </div>

                    {{-- Body Area --}}
                    <div class="banner-card-body">
                        <h3 class="banner-card-title" title="{{ $banner->judul }}">
                            {{ $banner->judul }}
                        </h3>

                        <p class="banner-card-caption" title="{{ $banner->caption }}">
                            "{{ $banner->caption }}"
                        </p>
                    </div>

                    {{-- Footer Area --}}
                    <div class="banner-card-footer">
                        <button type="button" 
                                class="btn btn-sm btn-light rounded-pill px-3 text-muted fw-bold small btn-preview-banner" 
                                data-img="{{ $imageUrl }}" 
                                data-title="{{ $banner->judul }}" 
                                data-caption="{{ $banner->caption }}">
                            <i class="fas fa-eye me-1"></i> Pratinjau
                        </button>

                        <div class="banner-card-actions">
                            <a href="{{ route('banners.edit', $banner->id) }}" 
                               class="btn-banner-action btn-action-edit" 
                               title="Edit Banner"
                               data-bs-toggle="tooltip">
                                <i class="fas fa-pen-to-square"></i>
                            </a>

                            <button type="button" 
                                    class="btn-banner-action btn-action-delete btn-delete-banner" 
                                    title="Hapus Banner"
                                    data-bs-toggle="tooltip"
                                    data-id="{{ $banner->id }}"
                                    data-title="{{ $banner->judul }}"
                                    data-img="{{ $imageUrl }}">
                                <i class="fas fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- 5. LIST VIEW (FLOATING ROW ITEMS - NO TABLE IN TABLE) --}}
        <div class="banner-list-container d-none" id="bannerListContainer">
            @foreach($banners as $banner)
                @php
                    $bannerDate = $banner->created_at ? \Carbon\Carbon::parse($banner->created_at)->format('d M Y') : '-';
                    $imageUrl = asset('images/banner/' . $banner->gambar_upload);
                @endphp

                <div class="banner-list-item item-banner" 
                     data-title="{{ strtolower($banner->judul) }}" 
                     data-caption="{{ strtolower($banner->caption) }}">
                    
                    <div class="banner-list-left">
                        <div class="banner-list-thumbnail-box btn-preview-banner" 
                             data-img="{{ $imageUrl }}" 
                             data-title="{{ $banner->judul }}" 
                             data-caption="{{ $banner->caption }}"
                             title="Klik untuk pratinjau penuh">
                            <img src="{{ $imageUrl }}" alt="{{ $banner->judul }}" class="banner-list-thumbnail-img" loading="lazy">
                        </div>

                        <div class="banner-list-content">
                            <div class="banner-list-meta-top">
                                <span class="badge bg-danger-subtle text-danger fw-bold rounded-pill px-2 py-1 small">
                                    Slider #{{ $loop->iteration }}
                                </span>
                                <span class="text-muted small">
                                    <i class="far fa-clock me-1"></i> {{ $bannerDate }}
                                </span>
                            </div>

                            <div class="banner-list-title">
                                {{ $banner->judul }}
                            </div>

                            <p class="banner-list-caption">
                                "{{ $banner->caption }}"
                            </p>
                        </div>
                    </div>

                    <div class="banner-list-right">
                        <button type="button" 
                                class="btn-banner-action btn-action-view btn-preview-banner" 
                                title="Lihat Foto"
                                data-bs-toggle="tooltip"
                                data-img="{{ $imageUrl }}" 
                                data-title="{{ $banner->judul }}" 
                                data-caption="{{ $banner->caption }}">
                            <i class="fas fa-eye"></i>
                        </button>

                        <a href="{{ route('banners.edit', $banner->id) }}" 
                           class="btn-banner-action btn-action-edit" 
                           title="Edit Banner"
                           data-bs-toggle="tooltip">
                            <i class="fas fa-pen-to-square"></i>
                        </a>

                        <button type="button" 
                                class="btn-banner-action btn-action-delete btn-delete-banner" 
                                title="Hapus Banner"
                                data-bs-toggle="tooltip"
                                data-id="{{ $banner->id }}"
                                data-title="{{ $banner->judul }}"
                                data-img="{{ $imageUrl }}">
                            <i class="fas fa-trash-can"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- No Search Match --}}
        <div id="noBannerMatch" class="banner-empty-state d-none">
            <div class="banner-empty-icon">
                <i class="fas fa-magnifying-glass"></i>
            </div>
            <h4 class="banner-empty-title">Tidak Ada Banner Yang Sesuai</h4>
            <p class="banner-empty-desc">
                Pencarian tidak menemukan banner dengan kata kunci tersebut. Silakan coba judul atau caption lain.
            </p>
        </div>

        {{-- Pagination --}}
        @if($banners->hasPages())
            <div class="d-flex justify-content-end mt-4">
                {{ $banners->links('pagination::bootstrap-5') }}
            </div>
        @endif
    @endif

</div>

{{-- MODAL PRATINJAU FOTO FULL --}}
<div class="modal fade modal-banner-preview" id="modalPreviewBanner" tabindex="-1" aria-hidden="true" style="background: rgba(0,0,0,0.7);">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
            <div class="modal-header border-0 pb-0 pt-3 px-4 d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="modal-title fw-bold text-dark mb-0" id="previewBannerTitle">Pratinjau Banner</h5>
                    <p class="text-muted small mb-0 mt-1" id="previewBannerCaption"></p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-4">
                <img id="previewBannerImage" src="" alt="Banner Preview" class="img-fluid rounded-3 shadow-sm w-100" style="max-height: 540px; object-fit: contain;">
            </div>
        </div>
    </div>
</div>

{{-- MODAL KONFIRMASI HAPUS ELEGAN --}}
<div class="modal fade modal-banner-delete" id="modalDeleteBanner" tabindex="-1" aria-labelledby="modalDeleteBannerLabel" aria-hidden="true" style="background: rgba(0,0,0,0.6);">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-body text-center p-4">
                <div style="width:68px;height:68px;border-radius:50%;background:#FEF2F2;color:#DC2626;display:inline-flex;align-items:center;justify-content:center;font-size:1.85rem;margin-bottom:1rem;">
                    <i class="fas fa-trash-can"></i>
                </div>
                <h4 class="fw-bold text-dark mb-1" id="modalDeleteBannerLabel">Hapus Banner Ini?</h4>
                <p class="text-muted small mb-3">
                    File spanduk/banner akan dihapus secara permanen dari server dan tidak akan muncul lagi di slider beranda.
                </p>

                <img id="deleteBannerThumb" src="" alt="Thumbnail" class="modal-banner-thumb-preview">

                <div class="modal-banner-title-highlight" id="deleteBannerTitle">
                    <!-- Dynamic Title -->
                </div>
            </div>

            <div class="modal-footer justify-content-center border-0 pb-4">
                <button type="button" class="btn btn-light px-4 rounded-pill" data-bs-dismiss="modal">
                    Batal
                </button>
                <form id="formDeleteBanner" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger px-4 rounded-pill fw-bold">
                        <i class="fas fa-trash-can me-1"></i> Ya, Hapus Banner
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
        // Safe Tooltips
        if (window.bootstrap && bootstrap.Tooltip) {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        }

        // Search Filter
        const searchInput = document.getElementById('bannerSearchInput');
        const items = document.querySelectorAll('.item-banner');
        const noMatchBox = document.getElementById('noBannerMatch');
        const gridContainer = document.getElementById('bannerGridContainer');
        const listContainer = document.getElementById('bannerListContainer');

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                const keyword = this.value.toLowerCase().trim();
                let visibleCount = 0;

                items.forEach(item => {
                    const title = item.getAttribute('data-title') || '';
                    const caption = item.getAttribute('data-caption') || '';

                    if (title.includes(keyword) || caption.includes(keyword)) {
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
                localStorage.setItem('banner_view_mode', 'list');
            } else {
                listContainer.classList.add('d-none');
                gridContainer.classList.remove('d-none');
                btnGrid.classList.add('active');
                btnList.classList.remove('active');
                localStorage.setItem('banner_view_mode', 'grid');
            }
        }

        if (btnGrid && btnList) {
            btnGrid.addEventListener('click', () => setViewMode('grid'));
            btnList.addEventListener('click', () => setViewMode('list'));

            const savedMode = localStorage.getItem('banner_view_mode');
            if (savedMode === 'list') {
                setViewMode('list');
            }
        }

        // UNIVERSAL MODAL OPEN/CLOSE HELPERS
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

        // Event delegation for preview clicks
        document.addEventListener('click', function (e) {
            const previewTrigger = e.target.closest('.btn-preview-banner');
            if (previewTrigger) {
                e.preventDefault();
                e.stopPropagation();

                const img = previewTrigger.getAttribute('data-img');
                const title = previewTrigger.getAttribute('data-title');
                const caption = previewTrigger.getAttribute('data-caption');

                const modalEl = document.getElementById('modalPreviewBanner');
                document.getElementById('previewBannerImage').src = img || '';
                document.getElementById('previewBannerTitle').textContent = title || 'Pratinjau Banner';
                const captionEl = document.getElementById('previewBannerCaption');
                if (captionEl) {
                    captionEl.textContent = caption ? `"${caption}"` : '';
                }

                showModal(modalEl);
                return;
            }

            // Event delegation for delete clicks
            const deleteTrigger = e.target.closest('.btn-delete-banner');
            if (deleteTrigger) {
                e.preventDefault();
                e.stopPropagation();

                const id = deleteTrigger.getAttribute('data-id');
                const title = deleteTrigger.getAttribute('data-title');
                const img = deleteTrigger.getAttribute('data-img');

                const modalEl = document.getElementById('modalDeleteBanner');
                document.getElementById('formDeleteBanner').action = `/banners/${id}`;
                document.getElementById('deleteBannerTitle').textContent = title || '';
                const thumbImg = document.getElementById('deleteBannerThumb');
                if (thumbImg) {
                    thumbImg.src = img || '';
                }

                showModal(modalEl);
                return;
            }

            // Event delegation for close buttons or backdrop clicks
            const closeBtn = e.target.closest('[data-bs-dismiss="modal"]');
            if (closeBtn) {
                e.preventDefault();
                const modalEl = closeBtn.closest('.modal');
                hideModal(modalEl);
                return;
            }

            // Click outside modal-content (backdrop click)
            if (e.target.classList.contains('modal') && e.target.classList.contains('show')) {
                hideModal(e.target);
            }
        });

        // ESC key to close any open modal
        window.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal.show').forEach(m => hideModal(m));
            }
        });
    });
</script>
@endpush
