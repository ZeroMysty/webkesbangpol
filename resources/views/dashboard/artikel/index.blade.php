@extends('dashboard.layouts.app')

@section('title', 'Manajemen Artikel')

@section('content')
<div class="article-page-wrapper">

    {{-- 1. HERO HEADER --}}
    <div class="article-hero-header">
        <div class="article-header-left">
            <div class="article-badge-category">
                <i class="fas fa-newspaper"></i>
                <span>Publikasi & Berita</span>
            </div>
            <h1 class="article-header-title">Koleksi Artikel & Berita</h1>
            <p class="article-header-subtitle">
                Kelola publikasi warta kegiatan, siaran pers, dan dokumentasi pelaksanaan program kerja Bakesbangpol Kota Bandung.
            </p>
        </div>
        <div class="article-header-right">
            <a href="{{ route('posts.create') }}" class="btn-tambah-article-modern">
                <i class="fas fa-plus"></i>
                <span>Tulis Artikel Baru</span>
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
    <div class="article-stats-grid">
        <div class="article-stat-card">
            <div class="article-stat-icon-wrapper stat-icon-red">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="article-stat-info">
                <span class="article-stat-value">{{ $count ?? $posts->total() }}</span>
                <span class="article-stat-label">Total Artikel Terbit</span>
            </div>
        </div>

        <div class="article-stat-card">
            <div class="article-stat-icon-wrapper stat-icon-indigo">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="article-stat-info">
                <span class="article-stat-value">{{ $thisMonthCount ?? 0 }}</span>
                <span class="article-stat-label">Terbit Bulan Ini</span>
            </div>
        </div>

        <div class="article-stat-card">
            <div class="article-stat-icon-wrapper stat-icon-emerald">
                <i class="fas fa-sitemap"></i>
            </div>
            <div class="article-stat-info">
                <span class="article-stat-value">{{ isset($bidangs) ? $bidangs->count() : 4 }} Unit</span>
                <span class="article-stat-label">Bidang Terliput</span>
            </div>
        </div>
    </div>

    {{-- 3. TOOLBAR CONTROLS --}}
    <div class="article-toolbar">
        <div class="article-toolbar-left">
            <div class="article-search-box">
                <input type="text" id="articleSearchInput" class="article-search-input" placeholder="Cari judul artikel atau topik..." autocomplete="off">
                <i class="fas fa-magnifying-glass"></i>
            </div>

            @if(isset($bidangs) && $bidangs->isNotEmpty())
                <select id="articleFilterBidang" class="article-filter-bidang" aria-label="Filter berdasarkan bidang">
                    <option value="">Semua Bidang</option>
                    @foreach($bidangs as $b)
                        <option value="{{ strtolower($b->nama_bidang) }}">{{ $b->nama_bidang }}</option>
                    @endforeach
                </select>
            @endif
        </div>

        <div class="article-toolbar-right">
            <div class="article-view-switch" role="group" aria-label="Pilihan Tampilan">
                <button type="button" class="btn-view-switch active" id="btnViewGrid" title="Tampilan Kartu Majalah">
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

    @if($posts->isEmpty())
        {{-- EMPTY STATE --}}
        <div class="article-empty-state">
            <div class="article-empty-icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <h3 class="article-empty-title">Belum Ada Artikel Dipublikasikan</h3>
            <p class="article-empty-desc">
                Saat ini belum ada warta atau artikel yang diterbitkan. Buat artikel pertama Anda untuk mempublikasikan kegiatan Bakesbangpol Kota Bandung.
            </p>
            <a href="{{ route('posts.create') }}" class="btn-tambah-article-modern">
                <i class="fas fa-plus"></i>
                <span>Tulis Artikel Pertama</span>
            </a>
        </div>
    @else
        {{-- 4. CARDS GRID VIEW (EDITORIAL MAGAZINE - NO TABLE IN TABLE) --}}
        <div class="article-cards-grid" id="articleGridContainer">
            @foreach($posts as $post)
                @php
                    $bidangName = $post->bidang->nama_bidang ?? 'Umum';
                    $programName = $post->program->nama_program ?? null;
                    $postDate = $post->created_at ? \Carbon\Carbon::parse($post->created_at)->format('d M Y') : '-';
                    $imageUrl = $post->image ? asset('images/posts/' . $post->image) : null;
                    $excerpt = Str::limit(strip_tags($post->content), 95, '...');
                @endphp

                <div class="article-card item-article" 
                     data-title="{{ strtolower($post->title) }}" 
                     data-excerpt="{{ strtolower(strip_tags($post->content)) }}"
                     data-bidang="{{ strtolower($bidangName) }}">
                    
                    {{-- Media Area --}}
                    <div class="article-thumbnail-box">
                        @if($imageUrl)
                            <img src="{{ $imageUrl }}" alt="{{ $post->title }}" class="article-thumbnail-img" loading="lazy">
                        @else
                            <div class="article-thumbnail-placeholder">
                                <i class="fas fa-image"></i>
                                <span>Tanpa Gambar</span>
                            </div>
                        @endif

                        <div class="article-overlay-badge-wrap">
                            <span class="article-badge-bidang" title="{{ $bidangName }}">
                                <i class="fas fa-tag"></i> {{ $bidangName }}
                            </span>

                            <span class="article-chip-date">
                                <i class="far fa-calendar-alt"></i> {{ $postDate }}
                            </span>
                        </div>
                    </div>

                    {{-- Body Area --}}
                    <div class="article-card-body">
                        @if($programName)
                            <span class="article-program-pill" title="{{ $programName }}">
                                <i class="fas fa-layer-group"></i> {{ $programName }}
                            </span>
                        @endif

                        <h3 class="article-card-title">
                            <a href="{{ route('posts.edit', $post->id) }}" title="{{ $post->title }}">
                                {{ $post->title }}
                            </a>
                        </h3>

                        <p class="article-card-excerpt">
                            {{ $excerpt }}
                        </p>
                    </div>

                    {{-- Footer Area --}}
                    <div class="article-card-footer">
                        @if($post->slug)
                            <a href="{{ route('isi-artikel', $post->slug) }}" target="_blank" class="btn-read-preview" title="Lihat di Web Publik">
                                <span>Lihat Web</span>
                                <i class="fas fa-arrow-up-right-from-square"></i>
                            </a>
                        @else
                            <span class="text-muted small">Draft</span>
                        @endif

                        <div class="article-actions-group">
                            @if($post->slug)
                                <a href="{{ route('isi-artikel', $post->slug) }}" 
                                   target="_blank" 
                                   class="btn-article-action btn-action-view" 
                                   title="Lihat Pratinjau Publik"
                                   data-bs-toggle="tooltip">
                                    <i class="fas fa-eye"></i>
                                </a>
                            @endif

                            <a href="{{ route('posts.edit', $post->id) }}" 
                               class="btn-article-action btn-action-edit" 
                               title="Edit Artikel"
                               data-bs-toggle="tooltip">
                                <i class="fas fa-pen-to-square"></i>
                            </a>

                            <button type="button" 
                                    class="btn-article-action btn-action-delete" 
                                    title="Hapus Artikel"
                                    data-bs-toggle="tooltip"
                                    onclick="openDeleteArticleModal('{{ $post->id }}', '{{ addslashes($post->title) }}', '{{ $imageUrl }}')">
                                <i class="fas fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- 5. LIST VIEW (FLOATING ROW ITEMS - NO TABLE IN TABLE) --}}
        <div class="article-list-container d-none" id="articleListContainer">
            @foreach($posts as $post)
                @php
                    $bidangName = $post->bidang->nama_bidang ?? 'Umum';
                    $programName = $post->program->nama_program ?? null;
                    $postDate = $post->created_at ? \Carbon\Carbon::parse($post->created_at)->format('d M Y') : '-';
                    $imageUrl = $post->image ? asset('images/posts/' . $post->image) : null;
                    $excerpt = Str::limit(strip_tags($post->content), 120, '...');
                @endphp

                <div class="article-list-item item-article" 
                     data-title="{{ strtolower($post->title) }}" 
                     data-excerpt="{{ strtolower(strip_tags($post->content)) }}"
                     data-bidang="{{ strtolower($bidangName) }}">
                    
                    <div class="article-list-left">
                        <div class="article-list-thumbnail-box">
                            @if($imageUrl)
                                <img src="{{ $imageUrl }}" alt="{{ $post->title }}" class="article-list-thumbnail-img" loading="lazy">
                            @else
                                <div class="article-thumbnail-placeholder" style="font-size:0.75rem;">
                                    <i class="fas fa-image" style="font-size:1.4rem;"></i>
                                </div>
                            @endif
                        </div>

                        <div class="article-list-content">
                            <div class="article-list-meta-top">
                                <span class="badge-bidang-pill-small">
                                    <i class="fas fa-tag me-1"></i> {{ $bidangName }}
                                </span>
                                @if($programName)
                                    <span class="text-muted small" title="{{ $programName }}">
                                        <i class="fas fa-layer-group me-1 text-danger"></i> {{ Str::limit($programName, 30) }}
                                    </span>
                                @endif
                                <span class="text-muted small">
                                    <i class="far fa-clock me-1"></i> {{ $postDate }}
                                </span>
                            </div>

                            <div class="article-list-title">
                                <a href="{{ route('posts.edit', $post->id) }}" title="{{ $post->title }}">
                                    {{ $post->title }}
                                </a>
                            </div>

                            <p class="article-list-excerpt">
                                {{ $excerpt }}
                            </p>
                        </div>
                    </div>

                    <div class="article-list-right">
                        @if($post->slug)
                            <a href="{{ route('isi-artikel', $post->slug) }}" 
                               target="_blank" 
                               class="btn-article-action btn-action-view" 
                               title="Lihat Pratinjau Publik"
                               data-bs-toggle="tooltip">
                                <i class="fas fa-eye"></i>
                            </a>
                        @endif

                        <a href="{{ route('posts.edit', $post->id) }}" 
                           class="btn-article-action btn-action-edit" 
                           title="Edit Artikel"
                           data-bs-toggle="tooltip">
                            <i class="fas fa-pen-to-square"></i>
                        </a>

                        <button type="button" 
                                class="btn-article-action btn-action-delete" 
                                title="Hapus Artikel"
                                data-bs-toggle="tooltip"
                                onclick="openDeleteArticleModal('{{ $post->id }}', '{{ addslashes($post->title) }}', '{{ $imageUrl }}')">
                            <i class="fas fa-trash-can"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- No Search Match --}}
        <div id="noArticleMatch" class="article-empty-state d-none">
            <div class="article-empty-icon">
                <i class="fas fa-magnifying-glass"></i>
            </div>
            <h4 class="article-empty-title">Tidak Ada Artikel Yang Sesuai</h4>
            <p class="article-empty-desc">
                Pencarian atau filter bidang yang dipilih tidak menemukan artikel yang cocok. Silakan coba kata kunci lain.
            </p>
        </div>

        {{-- Pagination --}}
        @if($posts->hasPages())
            <div class="d-flex justify-content-end mt-4">
                {{ $posts->links('pagination::bootstrap-5') }}
            </div>
        @endif
    @endif

</div>

{{-- MODAL KONFIRMASI HAPUS ELEGAN --}}
<div class="modal fade modal-article-delete" id="modalDeleteArticle" tabindex="-1" aria-labelledby="modalDeleteArticleLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-delete-icon-box" style="width:68px;height:68px;border-radius:50%;background:#FEF2F2;color:#DC2626;display:inline-flex;align-items:center;justify-content:center;font-size:1.85rem;margin-bottom:1rem;">
                    <i class="fas fa-trash-can"></i>
                </div>
                <h4 class="fw-bold text-dark mb-1" id="modalDeleteArticleLabel">Hapus Artikel Ini?</h4>
                <p class="text-muted small mb-3">
                    Artikel dan file gambar terkait akan dihapus secara permanen dari server dan web publik.
                </p>

                <img id="deleteArticleThumb" src="" alt="Thumbnail" class="modal-article-thumb-preview d-none">

                <div class="modal-article-title-highlight" id="deleteArticleTitle">
                    <!-- Dynamic Title -->
                </div>
            </div>

            <div class="modal-footer justify-content-center border-0 pb-4">
                <button type="button" class="btn btn-light px-4 rounded-pill" data-bs-dismiss="modal">
                    Batal
                </button>
                <form id="formDeleteArticle" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger px-4 rounded-pill fw-bold">
                        <i class="fas fa-trash-can me-1"></i> Ya, Hapus Artikel
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
        // Tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Filter Logic
        const searchInput = document.getElementById('articleSearchInput');
        const bidangFilter = document.getElementById('articleFilterBidang');
        const items = document.querySelectorAll('.item-article');
        const noMatchBox = document.getElementById('noArticleMatch');
        const gridContainer = document.getElementById('articleGridContainer');
        const listContainer = document.getElementById('articleListContainer');

        function filterArticles() {
            const keyword = searchInput ? searchInput.value.toLowerCase().trim() : '';
            const selectedBidang = bidangFilter ? bidangFilter.value.toLowerCase().trim() : '';
            let visibleCount = 0;

            items.forEach(item => {
                const title = item.getAttribute('data-title') || '';
                const excerpt = item.getAttribute('data-excerpt') || '';
                const bidang = item.getAttribute('data-bidang') || '';

                const matchesKeyword = !keyword || title.includes(keyword) || excerpt.includes(keyword);
                const matchesBidang = !selectedBidang || bidang.includes(selectedBidang);

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

        if (searchInput) {
            searchInput.addEventListener('input', filterArticles);
        }

        if (bidangFilter) {
            bidangFilter.addEventListener('change', filterArticles);
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
                localStorage.setItem('article_view_mode', 'list');
            } else {
                listContainer.classList.add('d-none');
                gridContainer.classList.remove('d-none');
                btnGrid.classList.add('active');
                btnList.classList.remove('active');
                localStorage.setItem('article_view_mode', 'grid');
            }
        }

        if (btnGrid && btnList) {
            btnGrid.addEventListener('click', () => setViewMode('grid'));
            btnList.addEventListener('click', () => setViewMode('list'));

            const savedMode = localStorage.getItem('article_view_mode');
            if (savedMode === 'list') {
                setViewMode('list');
            }
        }
    });

    // Delete Modal
    function openDeleteArticleModal(id, title, imageUrl) {
        const modal = new bootstrap.Modal(document.getElementById('modalDeleteArticle'));
        const form = document.getElementById('formDeleteArticle');
        const titleBox = document.getElementById('deleteArticleTitle');
        const thumbImg = document.getElementById('deleteArticleThumb');

        form.action = `/posts/${id}`;
        titleBox.textContent = title;

        if (imageUrl && imageUrl.trim() !== '') {
            thumbImg.src = imageUrl;
            thumbImg.classList.remove('d-none');
        } else {
            thumbImg.classList.add('d-none');
        }

        modal.show();
    }
</script>
@endpush
