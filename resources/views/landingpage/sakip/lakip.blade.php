@extends('landingpage.layouts.app')
@section('title', 'Laporan Akuntanbilitas Kinerja Instansi Pemerintahan')
    <link rel="stylesheet" href="{{ asset('assets/css/share-page.css') }}">

@section('content')
    <section class="dokumen-hero">
        <div class="dokumen-overlay"></div>
        <div class="dokumen-content">
            <div class="hero-badge">
                <span class="badge-text">AKIP Report</span>
            </div>
            <h1 class="dokumen-title">LAPORAN AKUNTANBILITAS KINERJA INSTANSI PEMERINTAHAN</h1>
            <p class="dokumen-subtitle">Badan Kesatuan Bangsa dan Politik Kota Bandung</p>
            <p class="dokumen-lead">Dokumen Pertanggungjawaban Kinerja Yang Menyajikan Informasi Pencapaian Sasaran Strategis Dan Hasil Pelaksanaan Program, Sebagai Wujud Transparansi Dan Akuntabilitas Instansi Pemerintah Kepada Publik</p>
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
                        <p class="filter-subtitle">Temukan dokumen Laporan Akuntanbilitas Kinerja Instansi Pemerintahan dengan mudah</p>
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
                                    $years = $lakips->pluck('tahun')->unique()->sort()->reverse();
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
                            <tbody id="lakipTableBody">
                                @forelse($lakips as $index => $lakip)
                                <tr class="lakip-item table-row" data-year="{{ $lakip->tahun }}" data-title="{{ $lakip->title }}" data-index="{{ $index + 1 }}">
                                    <td class="item-number table-cell-number">
                                        <span class="row-number">{{ $index + 1 }}</span>
                                    </td>
                                    <td class="table-cell-year">
                                        <span class="badge badge-year">{{ $lakip->tahun }}</span>
                                    </td>
                                    <td class="table-cell-title">
                                        <div class="document-title">{{ $lakip->title }}</div>
                                    </td>
                                    <td class="table-cell-actions">
                                        <a href="{{ asset($lakip->file_upload) }}" target="_blank" class="btn btn-preview">
    <i class="fas fa-eye"></i> Preview
</a>
<a href="{{ asset($lakip->file_upload_wm) }}" class="btn btn-download" download>
    <i class="fas fa-download"></i> Unduh
</a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr class="empty-row">
                                    <td colspan="4" class="empty-cell">
                                        <div class="empty-state">
                                            <i class="fas fa-folder-open empty-icon"></i>
                                            <p class="empty-text">Tidak ada data Indikator Kinerja Utama yang tersedia</p>
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
                {{ $lakips->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <!-- Modal Preview -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content modern-modal">
                <div class="modal-header modern-modal-header">
                    <div class="modal-title-wrapper">
                        <h5 class="modal-title" id="previewModalLabel">
                            <i class="fas fa-file-pdf modal-icon"></i>
                            Preview Dokumen
                        </h5>
                    </div>
                    <div class="modal-actions">
                        <a id="downloadBtn" href="#" class="modal-btn modal-download" download>
                            <i class="fas fa-download"></i>
                            <span>Unduh</span>
                        </a>
                        <button type="button" class="modal-btn modal-close" data-bs-dismiss="modal">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="modal-body modern-modal-body">
                    <!-- Error message -->
                    <div id="pdfError" class="error-container" style="display: none;"></div>
                    
                    <!-- Loading indicator -->
                    <div id="pdfLoading" class="loading-container">
                        <div class="loading-spinner">
                            <div class="spinner"></div>
                        </div>
                        <p class="loading-text">Memuat dokumen...</p>
                    </div>
                    
                    <!-- Container for PDF object -->
                    <div id="pdfContainer" class="pdf-container"></div>
                    
                    <!-- Canvas for PDF.js fallback -->
                    <canvas id="pdfCanvas" class="pdf-canvas"></canvas>
                </div>
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
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                        target="_blank" class="share-icon facebook" title="Bagikan ke Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode('Laporan AKIP Badan Kesatuan Bangsa dan Politik Kota Bandung') }}" 
                        target="_blank" class="share-icon twitter" title="Bagikan ke Twitter">
                        <i class="fab fa-x-twitter"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send?text={{ urlencode('Laporan AKIP Badan Kesatuan Bangsa dan Politik Kota Bandung') }}%20{{ urlencode(request()->fullUrl()) }}" 
                        target="_blank" class="share-icon whatsapp" title="Bagikan ke WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="mailto:?subject={{ urlencode('Laporan AKIP Badan Kesatuan Bangsa dan Politik Kota Bandung') }}&body={{ urlencode('Saya ingin berbagi halaman menarik ini: ' . request()->fullUrl()) }}" 
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

        <!-- Script Share -->
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
            tempInput.setSelectionRange(0, 99999); // For mobile devices
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
    </script>
    
    <script>
        // Enhanced JavaScript for PDF preview
        document.addEventListener("DOMContentLoaded", function () {
            const previewButtons = document.querySelectorAll('.preview-btn');
            const previewModalLabel = document.getElementById('previewModalLabel');
            const downloadBtn = document.getElementById('downloadBtn');
            const errorDiv = document.getElementById('pdfError');
            const pdfContainer = document.getElementById('pdfContainer');
            const pdfLoading = document.getElementById('pdfLoading');
            
            // PDF.js rendering function - untuk direct URL
            const renderPdfWithPdfJs = async (url, isPdfData = false) => {
                try {
                    pdfLoading.style.display = 'block';
                    errorDiv.style.display = 'none';
                    
                    // Clear previous content
                    pdfContainer.innerHTML = '';
                    
                    // Create viewer container
                    const viewerContainer = document.createElement('div');
                    viewerContainer.style.width = '100%';
                    viewerContainer.style.height = '500px';
                    viewerContainer.style.overflow = 'auto';
                    viewerContainer.style.border = '1px solid #ccc';
                    pdfContainer.appendChild(viewerContainer);
                    
                    // Load PDF document using PDF.js
                    let loadingTask;
                    if (isPdfData) {
                        loadingTask = pdfjsLib.getDocument({data: url}); // url adalah binary data dalam kasus ini
                    } else {
                        loadingTask = pdfjsLib.getDocument(url);
                    }
                    
                    const pdf = await loadingTask.promise;
                    // console.log(`PDF loaded successfully. Number of pages: ${pdf.numPages}`);
                    
                    // SELALU buat navigasi jika ada lebih dari 1 halaman
                    if (pdf.numPages > 1) {
                        const navDiv = document.createElement('div');
                        navDiv.className = 'text-center mb-2';
                        navDiv.innerHTML = `
                            <div class="btn-group" role="group">
                                <button id="prevPage" class="btn btn-sm btn-outline-secondary" disabled>
                                    <i class="fas fa-chevron-left"></i> Prev
                                </button>
                                <span class="btn btn-sm btn-outline-secondary" id="pageInfo">
                                    Page <span id="currentPage">1</span> of ${pdf.numPages}
                                </span>
                                <button id="nextPage" class="btn btn-sm btn-outline-secondary">
                                    Next <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        `;
                        pdfContainer.insertBefore(navDiv, viewerContainer);
                        
                        // Set up navigation handlers
                        let currentPageNum = 1;
                        const currentPageElem = document.getElementById('currentPage');
                        const pageContainers = {};
                        
                        // Fungsi untuk membuat semua container halaman
                        const setupPageContainers = () => {
                            // Buat container untuk halaman pertama
                            const firstPageContainer = document.createElement('div');
                            firstPageContainer.id = `page-1`;
                            firstPageContainer.className = 'pdf-page mb-2';
                            viewerContainer.appendChild(firstPageContainer);
                            pageContainers[1] = firstPageContainer;
                        };
                        
                        // Setup halaman pertama
                        setupPageContainers();
                        
                        document.getElementById('prevPage').addEventListener('click', () => {
                            if (currentPageNum > 1) {
                                // Sembunyikan halaman saat ini
                                if (pageContainers[currentPageNum]) {
                                    pageContainers[currentPageNum].style.display = 'none';
                                }
                                
                                currentPageNum--;
                                
                                // Buat container jika belum ada
                                if (!pageContainers[currentPageNum]) {
                                    const pageContainer = document.createElement('div');
                                    pageContainer.id = `page-${currentPageNum}`;
                                    pageContainer.className = 'pdf-page mb-2';
                                    viewerContainer.appendChild(pageContainer);
                                    pageContainers[currentPageNum] = pageContainer;
                                } else {
                                    pageContainers[currentPageNum].style.display = 'block';
                                }
                                
                                // Render halaman jika belum pernah dirender
                                if (pageContainers[currentPageNum].childElementCount === 0) {
                                    renderPage(currentPageNum);
                                }
                                
                                // Update UI
                                currentPageElem.textContent = currentPageNum;
                                document.getElementById('nextPage').disabled = false;
                                if (currentPageNum === 1) {
                                    document.getElementById('prevPage').disabled = true;
                                }
                            }
                        });
                        
                        document.getElementById('nextPage').addEventListener('click', () => {
                            if (currentPageNum < pdf.numPages) {
                                // Sembunyikan halaman saat ini
                                if (pageContainers[currentPageNum]) {
                                    pageContainers[currentPageNum].style.display = 'none';
                                }
                                
                                currentPageNum++;
                                
                                // Buat container jika belum ada
                                if (!pageContainers[currentPageNum]) {
                                    const pageContainer = document.createElement('div');
                                    pageContainer.id = `page-${currentPageNum}`;
                                    pageContainer.className = 'pdf-page mb-2';
                                    viewerContainer.appendChild(pageContainer);
                                    pageContainers[currentPageNum] = pageContainer;
                                } else {
                                    pageContainers[currentPageNum].style.display = 'block';
                                }
                                
                                // Render halaman jika belum pernah dirender
                                if (pageContainers[currentPageNum].childElementCount === 0) {
                                    renderPage(currentPageNum);
                                }
                                
                                // Update UI
                                currentPageElem.textContent = currentPageNum;
                                document.getElementById('prevPage').disabled = false;
                                if (currentPageNum === pdf.numPages) {
                                    document.getElementById('nextPage').disabled = true;
                                }
                            }
                        });
                        
                        // Function to render a specific page
                        const renderPage = async (pageNumber) => {
                            // Get the page container
                            const pageContainer = pageContainers[pageNumber];
                            if (!pageContainer) {
                                console.error(`Page container for page ${pageNumber} not found`);
                                return;
                            }
                            
                            // Show loading indicator
                            pageContainer.innerHTML = '<div class="text-center py-5"><div class="spinner-border text-primary" role="status"></div></div>';
                            
                            try {
                                // Get the page
                                const page = await pdf.getPage(pageNumber);
                                
                                // Clear loading indicator
                                pageContainer.innerHTML = '';
                                
                                // Create canvas for this page
                                const canvas = document.createElement('canvas');
                                const context = canvas.getContext('2d');
                                pageContainer.appendChild(canvas);
                                
                                // Calculate scale to fit width
                                const viewport = page.getViewport({ scale: 1 });
                                const containerWidth = viewerContainer.clientWidth - 30; // Account for padding
                                const scale = containerWidth / viewport.width;
                                const scaledViewport = page.getViewport({ scale });
                                
                                // Set canvas dimensions
                                canvas.width = scaledViewport.width;
                                canvas.height = scaledViewport.height;
                                
                                // Render the page
                                const renderContext = {
                                    canvasContext: context,
                                    viewport: scaledViewport
                                };
                                
                                await page.render(renderContext).promise;
                                
                                // Hide loading indicator if on first page
                                if (pageNumber === 1) {
                                    pdfLoading.style.display = 'none';
                                }
                                
                            } catch (error) {
                                console.error(`Error rendering page ${pageNumber}:`, error);
                                pageContainer.innerHTML = `<div class="alert alert-danger">Error rendering page ${pageNumber}: ${error.message}</div>`;
                                if (pageNumber === 1) {
                                    pdfLoading.style.display = 'none';
                                }
                            }
                        };
                        
                        // Initial render of first page
                        renderPage(1);
                        
                    } else {
                        // Just render the single page
                        const page = await pdf.getPage(1);
                        
                        // Create canvas
                        const canvas = document.createElement('canvas');
                        const context = canvas.getContext('2d');
                        viewerContainer.appendChild(canvas);
                        
                        // Calculate scale to fit width
                        const viewport = page.getViewport({ scale: 1 });
                        const containerWidth = viewerContainer.clientWidth - 30; // Account for padding
                        const scale = containerWidth / viewport.width;
                        const scaledViewport = page.getViewport({ scale });
                        
                        // Set canvas dimensions
                        canvas.width = scaledViewport.width;
                        canvas.height = scaledViewport.height;
                        
                        // Render the page
                        const renderContext = {
                            canvasContext: context,
                            viewport: scaledViewport
                        };
                        
                        await page.render(renderContext).promise;
                        pdfLoading.style.display = 'none';
                    }
                    
                    return true;
                } catch (error) {
                    console.error('PDF.js rendering error:', error);
                    throw error;
                }
            };
            
            // Base64 PDF loader (untuk mengatasi AdBlock) - Menggunakan renderer yang sama
            const loadPdfFromBase64 = async (filename) => {
                try {
                    pdfLoading.style.display = 'block';
                    errorDiv.style.display = 'none';
                    
                    // Fetch dokumen sebagai base64
                    const response = await fetch(`/serve-document-lakip/${encodeURIComponent(filename)}`);
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    
                    const data = await response.json();
                    
                    // Buat bytes dari base64
                    const pdfData = atob(data.content);
                    const pdfBytes = new Uint8Array(pdfData.length);
                    for (let i = 0; i < pdfData.length; i++) {
                        pdfBytes[i] = pdfData.charCodeAt(i);
                    }
                    
                    // Gunakan fungsi renderer utama dengan data PDF
                    return await renderPdfWithPdfJs(pdfBytes, true);
                    
                } catch (error) {
                    console.error('Error loading PDF from base64:', error);
                    throw error;
                }
            };
            
            // Improved PDF loading with AdBlock mitigation
            const loadPdf = async (filename) => {
                // Show loading state
                pdfLoading.style.display = 'block';
                errorDiv.style.display = 'none';
                pdfContainer.innerHTML = '';
                
                try {
                    // Solusi 1: Coba metode Base64
                        // console.log('Mencoba memuat PDF dengan metode Base64');
                        await loadPdfFromBase64(filename);
                        return true;
                    
                } catch (error1) {
                    console.warn('Loading via Base64 route failed:', error1);
                    
                    try {
                        // Solusi 2: Coba gunakan view-doc sebagai route alternatif
                        const alternativeUrl = `/secure-file-lakip/${encodeURIComponent(filename)}`;
                        // console.log('Mencoba memuat PDF melalui route alternatif:', alternativeUrl);
                        
                        await renderPdfWithPdfJs(alternativeUrl);
                        return true;
                        
                    } catch (error2) {
                        console.warn('Alternative loading failed:', error2);
                        
                        try {
                            // Solusi 3: Coba metode object tag
                            // console.log('Mencoba memuat dengan object tag');
                            
                            pdfContainer.innerHTML = `
                                <object 
                                    data="/secure-file-lakip/${encodeURIComponent(filename)}" 
                                    type="application/pdf" 
                                    width="100%" 
                                    height="500px"
                                    style="border: 1px solid #ccc;">
                                    <div class="text-center p-5">
                                        <p>Browser Anda tidak mendukung tampilan PDF secara langsung.</p>
                                        <a href="/secure-file-lakip/${encodeURIComponent(filename)}" class="btn btn-primary" target="_blank">
                                            <i class="fas fa-external-link-alt"></i> Buka PDF di Tab Baru
                                        </a>
                                    </div>
                                </object>
                            `;
                            
                            pdfLoading.style.display = 'none';
                            return true;
                            
                        } catch (error3) {
                            // Jika semua metode gagal, berikan link download
                            console.error('All loading strategies failed');
                            
                            pdfContainer.innerHTML = `
                                <div class="text-center p-5">
                                    <div class="alert alert-warning">
                                        <p><i class="fas fa-exclamation-triangle"></i> Tidak dapat menampilkan preview PDF secara langsung.</p>
                                        <p>Hal ini bisa disebabkan oleh pengaturan browser atau ekstensi seperti AdBlock.</p>
                                        <a href="/file-content-lakip/${encodeURIComponent(filename)}" class="btn btn-primary" download="${filename}">
                                            <i class="fas fa-download"></i> Unduh PDF
                                        </a>
                                    </div>
                                </div>
                            `;
                            
                            pdfLoading.style.display = 'none';
                            return false;
                        }
                    }
                }
            };
            
            // Handler for preview buttons
            previewButtons.forEach(button => {
                button.addEventListener('click', async function () {
                    const filename = this.getAttribute('data-file');
                    const title = this.getAttribute('data-title');
                    const downloadUrl = this.getAttribute('data-download-url'); // ← ambil dari data attribute baru

                    previewModalLabel.textContent = `Preview: ${title}`;

                    // Set tombol download ke file watermark
                    if (downloadUrl) {
                        downloadBtn.setAttribute('href', downloadUrl);
                        const downloadFilename = downloadUrl.split('/').pop();
                        downloadBtn.setAttribute('download', downloadFilename);
                    } else {
                        // fallback jika data-download-url tidak ada
                        downloadBtn.setAttribute('href', `/file-content-lakip/${encodeURIComponent(filename)}`);
                        downloadBtn.setAttribute('download', filename);
                    }

                    // Reset tampilan awal modal
                    errorDiv.innerHTML = '';
                    errorDiv.style.display = 'none';
                    pdfContainer.innerHTML = '';
                    pdfCanvas.style.display = 'none';
                    pdfLoading.style.display = 'block';

                    try {
                        // Check if file exists
                        const debugResponse = await fetch(`/debug-file-lakip/${encodeURIComponent(filename)}`);

                        if (!debugResponse.ok) {
                            throw new Error(`Server returned ${debugResponse.status}: ${debugResponse.statusText}`);
                        }

                        const contentType = debugResponse.headers.get('content-type');
                        if (!contentType || !contentType.includes('application/json')) {
                            throw new Error('Debug endpoint did not return JSON. Check if the route is properly defined.');
                        }

                        const debugInfo = await debugResponse.json();

                        if (!debugInfo.file_exists) {
                            errorDiv.innerHTML = `
                                <div class="alert alert-warning">
                                    <strong>File tidak ditemukan di server.</strong><br>
                                </div>
                            `;
                            errorDiv.style.display = 'block';
                            pdfLoading.style.display = 'none';
                            return;
                        }

                        // Load PDF original
                        await loadPdf(filename);
                        pdfLoading.style.display = 'none';

                    } catch (error) {
                        pdfLoading.style.display = 'none';
                        errorDiv.innerHTML = `
                            <div class="alert alert-danger">
                                <strong>Gagal memuat dokumen</strong><br>
                                Error: ${error.message || 'Unknown error'}<br>
                                <hr>
                                <p>Silakan coba cara berikut:</p>
                                <ul class="text-start">
                                    <li>Gunakan tombol download untuk membuka dokumen secara langsung</li>
                                    <li>Refresh halaman dan coba lagi</li>
                                </ul>
                            </div>
                        `;
                        errorDiv.style.display = 'block';
                        console.error('Error loading PDF:', error);
                    }
                });
            });


            const searchInput = document.getElementById('searchInput');
            const tahunFilter = document.getElementById('tahunFilter');
            const sortOrder = document.getElementById('sortOrder');
            const tableBody = document.getElementById('lakipTableBody');

            // Simpan semua baris asli sekali saja
            const allRows = Array.from(tableBody.querySelectorAll('tr.lakip-item'));

            function filterAndSortTable() {
                const keyword = searchInput.value.toLowerCase();
                const selectedYear = tahunFilter.value;
                const sortBy = sortOrder.value;

                // Filter dari data asli, bukan dari DOM yang sudah termodifikasi
                let rows = allRows.filter(row => {
                    const rowYear = row.dataset.year;
                    const rowTitle = row.dataset.title.toLowerCase();
                    return (
                        (selectedYear === '' || rowYear === selectedYear) &&
                        (keyword === '' || rowTitle.includes(keyword))
                    );
                });

                // Sort
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

                // Render ulang
                if (rows.length === 0) {
                    tableBody.innerHTML = `
                        <tr class="empty-row">
                            <td colspan="4" class="empty-cell">
                                <div class="empty-state">
                                    <i class="fas fa-search empty-icon"></i>
                                    <p class="empty-text">Tidak ada data Indikator Kinerja Utama yang sesuai dengan filter</p>
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
                el.addEventListener('input', filterAndSortTable);
                el.addEventListener('change', filterAndSortTable);
            });

        });
    </script>
@endsection