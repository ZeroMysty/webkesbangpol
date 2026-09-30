@props([
    'items',
    'documentName' => 'Dokumen',
])

@php
    $years = $items->pluck('tahun')->filter()->unique()->sort()->reverse();
@endphp

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
                    <p class="filter-subtitle">Temukan dokumen {{ $documentName }} dengan mudah</p>
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
                        <tbody id="dokumenTableBody">
                            @forelse($items as $index => $item)
                            <tr class="dokumen-item table-row" data-year="{{ $item->tahun }}" data-title="{{ $item->title }}" data-index="{{ $index + 1 }}">
                                <td class="item-number table-cell-number">
                                    <span class="row-number">{{ $index + 1 }}</span>
                                </td>
                                <td class="table-cell-year">
                                    <span class="badge badge-year">{{ $item->tahun }}</span>
                                </td>
                                <td class="table-cell-title">
                                    <div class="document-title">{{ $item->title }}</div>
                                </td>
                                <td class="table-cell-actions">
                                    <div class="action-buttons">
                                        <a href="{{ asset($item->file_upload) }}" target="_blank" class="btn btn-preview">
                                            <i class="fas fa-eye"></i>
                                            <span class="btn-text">Preview</span>
                                        </a>

                                        @php
                                            $downloadUrl = !empty($item->file_upload_wm) ? asset($item->file_upload_wm) : asset($item->file_upload);
                                        @endphp
                                        <a href="{{ $downloadUrl }}" class="btn btn-download" download>
                                            <i class="fas fa-download"></i>
                                            <span class="btn-text">Unduh</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr class="empty-row">
                                <td colspan="4" class="empty-cell">
                                    <div class="empty-state">
                                        <i class="fas fa-folder-open empty-icon"></i>
                                        <p class="empty-text">Tidak ada data {{ $documentName }} yang tersedia</p>
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
            {{ $items->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/landingpage-dokumen.css') }}">
@endpush

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById('searchInput');
        const tahunFilter = document.getElementById('tahunFilter');
        const sortOrder = document.getElementById('sortOrder');
        const tableBody = document.getElementById('dokumenTableBody');

        if (!tableBody) return;

        const allRows = Array.from(tableBody.querySelectorAll('tr.dokumen-item'));

        function filterAndSortTable() {
            const keyword = (searchInput ? searchInput.value : '').toLowerCase().trim();
            const selectedYear = tahunFilter ? tahunFilter.value : '';
            const sortBy = sortOrder ? sortOrder.value : 'newest';

            let rows = allRows.filter(row => {
                const rowYear = String(row.dataset.year || '');
                const rowTitle = String(row.dataset.title || '').toLowerCase();
                return (
                    (selectedYear === '' || rowYear === selectedYear) &&
                    (keyword === '' || rowTitle.includes(keyword))
                );
            });

            rows.sort((a, b) => {
                const titleA = String(a.dataset.title || '').toLowerCase();
                const titleB = String(b.dataset.title || '').toLowerCase();
                const yearA = parseInt(a.dataset.year, 10) || 0;
                const yearB = parseInt(b.dataset.year, 10) || 0;

                switch (sortBy) {
                    case 'newest': return yearB - yearA;
                    case 'oldest': return yearA - yearB;
                    case 'title': return titleA.localeCompare(titleB);
                    case 'title-desc': return titleB.localeCompare(titleA);
                    default: return 0;
                }
            });

            if (rows.length === 0) {
                tableBody.innerHTML = `
                    <tr class="empty-row">
                        <td colspan="4" class="empty-cell">
                            <div class="empty-state">
                                <i class="fas fa-search empty-icon"></i>
                                <p class="empty-text">Tidak ada data {{ $documentName }} yang sesuai dengan filter</p>
                            </div>
                        </td>
                    </tr>
                `;
                return;
            }

            const fragment = document.createDocumentFragment();
            rows.forEach((row, index) => {
                const numberEl = row.querySelector('.item-number .row-number');
                if (numberEl) numberEl.textContent = index + 1;
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
@endpush
