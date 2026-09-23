@extends('landingpage.layouts.app')
@section('title', 'Laporan Kajian')
    <link rel="stylesheet" href="{{ asset('assets/css/share-page.css') }}">

@section('content')
    <section class="dokumen-hero">
        <div class="dokumen-overlay"></div>
        <div class="dokumen-content">
            <div class="hero-badge">
                <span class="badge-text">Laporan Kajian</span>
            </div>
            <h1 class="dokumen-title">LAPORAN KAJIAN</h1>
            <p class="dokumen-subtitle">Badan Kesatuan Bangsa dan Politik Kota Bandung</p>
            <p class="dokumen-lead">Dokumen Kajian Dan Penelitian Sebagai Hasil Evaluasi Dan Rekomendasi Kebijakan Dalam Rangka Menjaga Kondusivitas Dan Akuntabilitas Pemerintahan</p>
        </div>
    </section>

    <div class="main-container">
        <div class="content-wrapper">
            <!-- Filter Section -->
            <div class="filter-section">
                <div class="filter-header">
                    <div class="filter-title-wrapper">
                        <h3 class="filter-title">
                            <i class="fas fa-filter filter-icon"></i>
                            Filter & Pencarian
                        </h3>
                        <p class="filter-subtitle">Temukan dokumen Laporan Kajian dengan mudah</p>
                    </div>
                </div>
                
                <div class="filter-controls">
                    <div class="filter-row">
                        <div class="filter-item">
                            <label for="tahunFilter" class="filter-label">
                                <i class="fas fa-calendar-alt"></i>
                                Tahun
                            </label>
                            <select class="filter-select" id="tahunFilter">
                                <option value="">Semua Tahun</option>
                                @php
                                    $years = $laporankajians->pluck('tahun')->unique()->sort()->reverse();
                                @endphp
                                @foreach($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="filter-item">
                            <label for="searchInput" class="filter-label">
                                <i class="fas fa-search"></i>
                                Pencarian
                            </label>
                            <input type="text" class="filter-input" id="searchInput" placeholder="Masukkan kata kunci...">
                        </div>
                        
                        <div class="filter-item">
                            <label for="sortOrder" class="filter-label">
                                <i class="fas fa-sort"></i>
                                Urutkan
                            </label>
                            <select class="filter-select" id="sortOrder">
                                <option value="newest">Terbaru</option>
                                <option value="oldest">Terlama</option>
                                <option value="title">Judul A-Z</option>
                                <option value="title-desc">Judul Z-A</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div id="tableView" class="table-section">
                <div class="table-wrapper">
                    <div class="table-container">
                        <table class="dokumen-table">
                            <thead>
                                <tr>
                                    <th width="5%" class="table-header-number">No</th>
                                    <th width="15%" class="table-header-year">Tahun</th>
                                    <th width="50%" class="table-header-title">Judul Dokumen</th>
                                    <th width="30%" class="table-header-actions">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="laporankajianTableBody">
                                @forelse($laporankajians as $index => $laporankajian)
                                <tr class="laporankajian-item table-row" data-year="{{ $laporankajian->tahun }}" data-title="{{ $laporankajian->title }}" data-index="{{ $index + 1 }}">
                                    <td class="item-number table-cell-number">
                                        <span class="row-number">{{ $index + 1 }}</span>
                                    </td>
                                    <td class="table-cell-year">
                                        <span class="badge badge-year">{{ $laporankajian->tahun }}</span>
                                    </td>
                                    <td class="table-cell-title">
                                        <div class="document-title">{{ $laporankajian->title }}</div>
                                    </td>
                                    <td class="table-cell-actions">
                                        <a href="{{ asset($laporankajian->file_upload) }}" target="_blank" class="btn btn-preview">
                                            <i class="fas fa-eye"></i> Preview
                                        </a>
                                        <a href="{{ asset($laporankajian->file_upload_wm) }}" class="btn btn-download" download>
                                            <i class="fas fa-download"></i> Unduh
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr class="empty-row">
                                    <td colspan="4" class="empty-cell">
                                        <div class="empty-state">
                                            <i class="fas fa-folder-open empty-icon"></i>
                                            <p class="empty-text">Tidak ada data Laporan Kajian yang tersedia</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Pagination -->
            <div class="pagination-wrapper">
                {{ $laporankajians->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <!-- Bagian Share -->
    <section class="share-section py-4">
        <div class="container">
            <div class="page-share p-3 rounded shadow-sm" style="background: #ffffff;">
                <h3 class="share-title mb-3">
                    <i class="fas fa-share-alt"></i>
                    Bagikan Halaman Ini
                </h3>
                <div class="share-options d-flex gap-3">
                    <a href="https://www.tiktok.com/" 
                        target="_blank" class="share-icon tiktok" title="Bagikan ke TikTok">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="https://www.instagram.com/" 
                        target="_blank" class="share-icon instagram" title="Bagikan ke Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send?text={{ urlencode('Laporan Kajian Badan Kesatuan Bangsa dan Politik Kota Bandung') }}%20{{ urlencode(request()->fullUrl()) }}" 
                        target="_blank" class="share-icon whatsapp" title="Bagikan ke WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="mailto:?subject={{ urlencode('Laporan Kajian Badan Kesatuan Bangsa dan Politik Kota Bandung') }}&body={{ urlencode('Saya ingin berbagi halaman menarik ini: ' . request()->fullUrl()) }}" 
                        class="share-icon email" title="Bagikan via Email">
                        <i class="fas fa-envelope"></i>
                    </a>
                    <a href="javascript:void(0)" onclick="copyToClipboard()" 
                        class="share-icon copy" title="Salin Link">
                        <i class="fas fa-link"></i>
                    </a>
                </div>
            </div>

            <!-- Toast Notification -->
            <div id="copyToast" class="copy-toast hidden">
                <i class="fas fa-check-circle"></i>
                Link berhasil disalin!
            </div>
        </div>
    </section>

    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/landingpage-dokumen.css') }}">
@endpush

    <!-- Script Share & Filter -->
    <script>
        function copyToClipboard() {
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(window.location.href).then(() => {
                    showToast();
                }).catch(() => {
                    fallbackCopyToClipboard();
                });
            } else {
                fallbackCopyToClipboard();
            }
        }

        function fallbackCopyToClipboard() {
            const tempInput = document.createElement('input');
            tempInput.value = window.location.href;
            document.body.appendChild(tempInput);
            tempInput.select();
            tempInput.setSelectionRange(0, 99999);
            document.execCommand('copy');
            document.body.removeChild(tempInput);
            showToast();
        }

        function showToast() {
            const toast = document.getElementById('copyToast');
            toast.classList.remove('hidden');
            toast.classList.add('show');
            
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => {
                    toast.classList.add('hidden');
                }, 300);
            }, 3000);
        }

        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.getElementById('searchInput');
            const tahunFilter = document.getElementById('tahunFilter');
            const sortOrder = document.getElementById('sortOrder');
            const tableBody = document.getElementById('laporankajianTableBody');

            const allRows = Array.from(tableBody.querySelectorAll('tr.laporankajian-item'));

            function filterAndSortTable() {
                const keyword = searchInput.value.toLowerCase();
                const selectedYear = tahunFilter.value;
                const sortBy = sortOrder.value;

                let rows = allRows.filter(row => {
                    const rowYear = row.dataset.year;
                    const rowTitle = row.dataset.title.toLowerCase();
                    return (
                        (selectedYear === '' || rowYear === selectedYear) &&
                        (keyword === '' || rowTitle.includes(keyword))
                    );
                });

                rows.sort((a, b) => {
                    const titleA = a.dataset.title.toLowerCase();
                    const titleB = b.dataset.title.toLowerCase();
                    const yearA = parseInt(a.dataset.year);
                    const yearB = parseInt(b.dataset.year);

                    switch (sortBy) {
                        case 'newest':
                            return yearB - yearA;
                        case 'oldest':
                            return yearA - yearB;
                        case 'title':
                            return titleA.localeCompare(titleB);
                        case 'title-desc':
                            return titleB.localeCompare(titleA);
                        default:
                            return 0;
                    }
                });

                if (rows.length === 0) {
                    tableBody.innerHTML = `
                        <tr class="empty-row">
                            <td colspan="4" class="empty-cell">
                                <div class="empty-state">
                                    <i class="fas fa-search empty-icon"></i>
                                    <p class="empty-text">Tidak ada data Laporan Kajian yang sesuai dengan filter</p>
                                </div>
                            </td>
                        </tr>
                    `;
                    return;
                }

                const fragment = document.createDocumentFragment();
                rows.forEach((row, index) => {
                    row.querySelector('.item-number .row-number').textContent = index + 1;
                    fragment.appendChild(row);
                });

                tableBody.innerHTML = '';
                tableBody.appendChild(fragment);
            }

            [searchInput, tahunFilter, sortOrder].forEach(el => {
                if (el) {
                    el.addEventListener('input', filterAndSortTable);
                    el.addEventListener('change', filterAndSortTable);
                }
            });
        });
    </script>
@endsection
