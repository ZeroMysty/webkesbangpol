@extends('dashboard.layouts.app')

@section('title', 'Galeri Kegiatan')

@section('content')
<div class="galeri-page-wrapper">

    {{-- 1. HERO HEADER --}}
    <div class="galeri-hero-header">
        <div class="galeri-header-left">
            <div class="galeri-badge-category">
                <i class="fas fa-images"></i>
                <span>Dokumentasi Visual</span>
            </div>
            <h1 class="galeri-header-title">Galeri Foto Kegiatan</h1>
            <p class="galeri-header-subtitle">
                Kelola album dokumentasi kegiatan, liputan lapangan, dan arsip program kerja Badan Kesatuan Bangsa dan Politik Kota Bandung.
            </p>
        </div>
        <div class="galeri-header-right">
            <a href="{{ route('galeris.create') }}" class="btn-tambah-galeri-modern">
                <i class="fas fa-plus"></i>
                <span>Tambah Galeri Baru</span>
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
    <div class="galeri-stats-grid">
        <div class="galeri-stat-card">
            <div class="galeri-stat-icon-wrapper stat-icon-red">
                <i class="fas fa-images"></i>
            </div>
            <div class="galeri-stat-info">
                <span class="galeri-stat-value">{{ $count ?? $galeris->total() }}</span>
                <span class="galeri-stat-label">Total Foto Kegiatan</span>
            </div>
        </div>

        <div class="galeri-stat-card">
            <div class="galeri-stat-icon-wrapper stat-icon-indigo">
                <i class="fas fa-layer-group"></i>
            </div>
            <div class="galeri-stat-info">
                <span class="galeri-stat-value">{{ isset($programs) ? $programs->count() : '-' }} Unit</span>
                <span class="galeri-stat-label">Program Terdokumentasi</span>
            </div>
        </div>

        <div class="galeri-stat-card">
            <div class="galeri-stat-icon-wrapper stat-icon-emerald">
                <i class="fas fa-camera"></i>
            </div>
            <div class="galeri-stat-info">
                <span class="galeri-stat-value">HD</span>
                <span class="galeri-stat-label">Kualitas Arsip Visual</span>
            </div>
        </div>
    </div>

    {{-- 3. TOOLBAR CONTROLS --}}
    <div class="galeri-toolbar">
        <div class="galeri-toolbar-left">
            <div class="galeri-search-box">
                <input type="text" id="galeriSearchInput" class="galeri-search-input" placeholder="Cari nama kegiatan atau judul foto..." autocomplete="off">
                <i class="fas fa-magnifying-glass"></i>
            </div>

            @if(isset($programs) && $programs->isNotEmpty())
                <select id="galeriFilterProgram" class="galeri-filter-program" aria-label="Filter berdasarkan program kegiatan">
                    <option value="">Semua Program</option>
                    @foreach($programs as $p)
                        <option value="{{ strtolower($p->nama_program) }}">{{ $p->nama_program }}</option>
                    @endforeach
                </select>
            @endif
        </div>

        <div class="galeri-toolbar-right">
            <div class="galeri-view-switch" role="group" aria-label="Pilihan Tampilan">
                <button type="button" class="btn-view-switch active" id="btnViewGrid" title="Tampilan Kartu Foto">
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

    @if($galeris->isEmpty())
        {{-- EMPTY STATE --}}
        <div class="galeri-empty-state">
            <div class="galeri-empty-icon">
                <i class="fas fa-images"></i>
            </div>
            <h3 class="galeri-empty-title">Belum Ada Galeri Foto</h3>
            <p class="galeri-empty-desc">
                Saat ini belum ada dokumentasi foto kegiatan yang diunggah. Mulai unggah arsip foto kegiatan pertama Anda.
            </p>
            <a href="{{ route('galeris.create') }}" class="btn-tambah-galeri-modern">
                <i class="fas fa-plus"></i>
                <span>Tambah Foto Pertama</span>
            </a>
        </div>
    @else
        {{-- 4. CARDS GRID VIEW (PHOTOGRAPHY - NO TABLE IN TABLE) --}}
        <div class="galeri-cards-grid" id="galeriGridContainer">
            @foreach($galeris as $galeri)
                @php
                    $programName = $galeri->program->nama_program ?? 'Kegiatan Umum';
                    $galeriDate = $galeri->created_at ? \Carbon\Carbon::parse($galeri->created_at)->format('d M Y') : '-';
                    $imageUrl = asset('images/gallery/' . $galeri->gambar_upload);
                @endphp

                <div class="galeri-card item-galeri" 
                     data-title="{{ strtolower($galeri->judul) }}" 
                     data-program="{{ strtolower($programName) }}">
                    
                    {{-- Media Area --}}
                    <div class="galeri-thumbnail-box btn-preview-galeri" 
                         data-img="{{ $imageUrl }}" 
                         data-title="{{ $galeri->judul }}" 
                         data-program="{{ $programName }}"
                         title="Klik untuk melihat foto penuh">
                        <img src="{{ $imageUrl }}" alt="{{ $galeri->judul }}" class="galeri-thumbnail-img" loading="lazy">

                        <div class="galeri-overlay-top">
                            <span class="galeri-program-badge" title="{{ $programName }}">
                                <i class="fas fa-layer-group"></i> {{ $programName }}
                            </span>

                            <span class="galeri-date-chip">
                                <i class="far fa-calendar-alt"></i> {{ $galeriDate }}
                            </span>
                        </div>

                        <div class="galeri-preview-overlay">
                            <i class="fas fa-magnifying-glass-plus"></i>
                        </div>
                    </div>

                    {{-- Body Area --}}
                    <div class="galeri-card-body">
                        <span class="galeri-program-pill" title="{{ $programName }}">
                            <i class="fas fa-tag"></i> {{ $programName }}
                        </span>

                        <h3 class="galeri-card-title" title="{{ $galeri->judul }}">
                            {{ $galeri->judul }}
                        </h3>
                    </div>

                    {{-- Footer Area --}}
                    <div class="galeri-card-footer">
                        <button type="button" 
                                class="btn btn-sm btn-light rounded-pill px-3 text-muted fw-bold small btn-preview-galeri" 
                                data-img="{{ $imageUrl }}" 
                                data-title="{{ $galeri->judul }}" 
                                data-program="{{ $programName }}">
                            <i class="fas fa-eye me-1"></i> Lihat Foto
                        </button>

                        <div class="galeri-card-actions">
                            <a href="{{ route('galeris.edit', $galeri->id) }}" 
                               class="btn-galeri-action btn-action-edit" 
                               title="Edit Galeri"
                               data-bs-toggle="tooltip">
                                <i class="fas fa-pen-to-square"></i>
                            </a>

                            <button type="button" 
                                    class="btn-galeri-action btn-action-delete btn-delete-galeri" 
                                    title="Hapus Foto"
                                    data-bs-toggle="tooltip"
                                    data-id="{{ $galeri->id }}"
                                    data-title="{{ $galeri->judul }}"
                                    data-img="{{ $imageUrl }}">
                                <i class="fas fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- 5. LIST VIEW (FLOATING ROW ITEMS - NO TABLE IN TABLE) --}}
        <div class="galeri-list-container d-none" id="galeriListContainer">
            @foreach($galeris as $galeri)
                @php
                    $programName = $galeri->program->nama_program ?? 'Kegiatan Umum';
                    $galeriDate = $galeri->created_at ? \Carbon\Carbon::parse($galeri->created_at)->format('d M Y') : '-';
                    $imageUrl = asset('images/gallery/' . $galeri->gambar_upload);
                @endphp

                <div class="galeri-list-item item-galeri" 
                     data-title="{{ strtolower($galeri->judul) }}" 
                     data-program="{{ strtolower($programName) }}">
                    
                    <div class="galeri-list-left">
                        <div class="galeri-list-thumbnail-box btn-preview-galeri" 
                             data-img="{{ $imageUrl }}" 
                             data-title="{{ $galeri->judul }}" 
                             data-program="{{ $programName }}"
                             title="Klik untuk melihat foto penuh">
                            <img src="{{ $imageUrl }}" alt="{{ $galeri->judul }}" class="galeri-list-thumbnail-img" loading="lazy">
                        </div>

                        <div class="galeri-list-content">
                            <div class="galeri-list-meta-top">
                                <span class="badge bg-danger-subtle text-danger fw-bold rounded-pill px-2 py-1 small">
                                    <i class="fas fa-layer-group me-1"></i> {{ $programName }}
                                </span>
                                <span class="text-muted small">
                                    <i class="far fa-clock me-1"></i> {{ $galeriDate }}
                                </span>
                            </div>

                            <div class="galeri-list-title">
                                {{ $galeri->judul }}
                            </div>
                        </div>
                    </div>

                    <div class="galeri-list-right">
                        <button type="button" 
                                class="btn-galeri-action btn-action-view btn-preview-galeri" 
                                title="Lihat Foto"
                                data-bs-toggle="tooltip"
                                data-img="{{ $imageUrl }}" 
                                data-title="{{ $galeri->judul }}" 
                                data-program="{{ $programName }}">
                            <i class="fas fa-eye"></i>
                        </button>

                        <a href="{{ route('galeris.edit', $galeri->id) }}" 
                           class="btn-galeri-action btn-action-edit" 
                           title="Edit Galeri"
                           data-bs-toggle="tooltip">
                            <i class="fas fa-pen-to-square"></i>
                        </a>

                        <button type="button" 
                                class="btn-galeri-action btn-action-delete btn-delete-galeri" 
                                title="Hapus Foto"
                                data-bs-toggle="tooltip"
                                data-id="{{ $galeri->id }}"
                                data-title="{{ $galeri->judul }}"
                                data-img="{{ $imageUrl }}">
                            <i class="fas fa-trash-can"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- No Search Match --}}
        <div id="noGaleriMatch" class="galeri-empty-state d-none">
            <div class="galeri-empty-icon">
                <i class="fas fa-magnifying-glass"></i>
            </div>
            <h4 class="galeri-empty-title">Tidak Ada Foto Kegiatan Yang Sesuai</h4>
            <p class="galeri-empty-desc">
                Pencarian atau filter program tidak menemukan hasil yang cocok. Silakan coba kata kunci lain.
            </p>
        </div>

        {{-- Pagination --}}
        @if($galeris->hasPages())
            <div class="d-flex justify-content-end mt-4">
                {{ $galeris->links('pagination::bootstrap-5') }}
            </div>
        @endif
    @endif

</div>

{{-- MODAL PRATINJAU FOTO FULL --}}
<div class="modal fade modal-galeri-preview" id="modalPreviewGaleri" tabindex="-1" aria-hidden="true" style="background: rgba(0,0,0,0.75);">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
            <div class="modal-header border-0 pb-0 pt-3 px-4 d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="modal-title fw-bold text-dark mb-0" id="previewGaleriTitle">Dokumentasi Kegiatan</h5>
                    <span class="badge bg-danger-subtle text-danger rounded-pill px-2 py-1 small mt-1 d-inline-block" id="previewGaleriProgram"></span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-4">
                <img id="previewGaleriImage" src="" alt="Galeri Preview" class="img-fluid rounded-3 shadow-sm w-100" style="max-height: 540px; object-fit: contain;">
            </div>
        </div>
    </div>
</div>

{{-- MODAL KONFIRMASI HAPUS ELEGAN --}}
<div class="modal fade modal-galeri-delete" id="modalDeleteGaleri" tabindex="-1" aria-labelledby="modalDeleteGaleriLabel" aria-hidden="true" style="background: rgba(0,0,0,0.6);">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-body text-center p-4">
                <div style="width:68px;height:68px;border-radius:50%;background:#FEF2F2;color:#DC2626;display:inline-flex;align-items:center;justify-content:center;font-size:1.85rem;margin-bottom:1rem;">
                    <i class="fas fa-trash-can"></i>
                </div>
                <h4 class="fw-bold text-dark mb-1" id="modalDeleteGaleriLabel">Hapus Foto Kegiatan Ini?</h4>
                <p class="text-muted small mb-3">
                    File foto dokumentasi akan dihapus secara permanen dari server dan tidak akan muncul lagi di galeri publik.
                </p>

                <img id="deleteGaleriThumb" src="" alt="Thumbnail" class="modal-galeri-thumb-preview">

                <div class="modal-galeri-title-highlight" id="deleteGaleriTitle">
                    <!-- Dynamic Title -->
                </div>
            </div>

            <div class="modal-footer justify-content-center border-0 pb-4">
                <button type="button" class="btn btn-light px-4 rounded-pill" data-bs-dismiss="modal">
                    Batal
                </button>
                <form id="formDeleteGaleri" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger px-4 rounded-pill fw-bold">
                        <i class="fas fa-trash-can me-1"></i> Ya, Hapus Foto
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

        // Filter Logic
        const searchInput = document.getElementById('galeriSearchInput');
        const programFilter = document.getElementById('galeriFilterProgram');
        const items = document.querySelectorAll('.item-galeri');
        const noMatchBox = document.getElementById('noGaleriMatch');
        const gridContainer = document.getElementById('galeriGridContainer');
        const listContainer = document.getElementById('galeriListContainer');

        function filterGaleri() {
            const keyword = searchInput ? searchInput.value.toLowerCase().trim() : '';
            const selectedProgram = programFilter ? programFilter.value.toLowerCase().trim() : '';
            let visibleCount = 0;

            items.forEach(item => {
                const title = item.getAttribute('data-title') || '';
                const program = item.getAttribute('data-program') || '';

                const matchesKeyword = !keyword || title.includes(keyword) || program.includes(keyword);
                const matchesProgram = !selectedProgram || program.includes(selectedProgram);

                if (matchesKeyword && matchesProgram) {
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
            searchInput.addEventListener('input', filterGaleri);
        }

        if (programFilter) {
            programFilter.addEventListener('change', filterGaleri);
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
                localStorage.setItem('galeri_view_mode', 'list');
            } else {
                listContainer.classList.add('d-none');
                gridContainer.classList.remove('d-none');
                btnGrid.classList.add('active');
                btnList.classList.remove('active');
                localStorage.setItem('galeri_view_mode', 'grid');
            }
        }

        if (btnGrid && btnList) {
            btnGrid.addEventListener('click', () => setViewMode('grid'));
            btnList.addEventListener('click', () => setViewMode('list'));

            const savedMode = localStorage.getItem('galeri_view_mode');
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
            const previewTrigger = e.target.closest('.btn-preview-galeri');
            if (previewTrigger) {
                e.preventDefault();
                e.stopPropagation();

                const img = previewTrigger.getAttribute('data-img');
                const title = previewTrigger.getAttribute('data-title');
                const program = previewTrigger.getAttribute('data-program');

                const modalEl = document.getElementById('modalPreviewGaleri');
                document.getElementById('previewGaleriImage').src = img || '';
                document.getElementById('previewGaleriTitle').textContent = title || 'Dokumentasi Kegiatan';
                const programEl = document.getElementById('previewGaleriProgram');
                if (programEl) {
                    programEl.textContent = program || '';
                }

                showModal(modalEl);
                return;
            }

            // Event delegation for delete clicks
            const deleteTrigger = e.target.closest('.btn-delete-galeri');
            if (deleteTrigger) {
                e.preventDefault();
                e.stopPropagation();

                const id = deleteTrigger.getAttribute('data-id');
                const title = deleteTrigger.getAttribute('data-title');
                const img = deleteTrigger.getAttribute('data-img');

                const modalEl = document.getElementById('modalDeleteGaleri');
                document.getElementById('formDeleteGaleri').action = `/galeris/${id}`;
                document.getElementById('deleteGaleriTitle').textContent = title || '';
                const thumbImg = document.getElementById('deleteGaleriThumb');
                if (thumbImg) {
                    thumbImg.src = img || '';
                }

                showModal(modalEl);
                return;
            }

            // Event delegation for close buttons
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
