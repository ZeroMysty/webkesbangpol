@extends('landingpage.layouts.app')
@section('title', 'Dasar Hukum')

@push('styles')
    @vite(['resources/css/landingpage-profile.css'])
    <link rel="stylesheet" href="{{ asset('assets/css/share-page.css') }}">
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="visimisi-hero">
        <div class="visimisi-hero-overlay"></div>
        <div class="visimisi-hero-content">
            <div class="hero-badge">Law Reference</div>
            <h1 class="visimisi-title">LANDASAN HUKUM</h1>
            <p class="visimisi-subtitle">Badan Kesatuan Bangsa dan Politik Kota Bandung</p>

        </div>
        <div class="hero-shape"></div>
    </section>
        
    <!-- Main Content Section -->
    <section class="dasarhukum-section">
      <div class="container py-5">
        <div class="row justify-content-center mb-3">

          <!-- Gabungkan Sort & Search dalam satu container -->
          <div class="row justify-content-center mb-5">
            <div class="col-md-10">
              <div class="combined-filter-search">
                <!-- Sort/Filter -->
                <div class="filter-container d-flex flex-wrap gap-2">
                  <select class="form-select" id="bidangFilter" onchange="filterByBidang(this.value)">
                    <option value="">Semua Bidang</option>
                    @foreach($groupedHukums as $bidangName => $hukums)
                      <option value="{{ $bidangName }}">{{ $bidangName }}</option>
                    @endforeach
                  </select>
                </div>
                
                <!-- Search -->
                <div class="search-container">
                  <input type="text" class="form-control search-input" id="searchInput" placeholder="Cari dokumen hukum..." onkeyup="filterItems(this.value)" autocomplete="off">
                  <i class="fas fa-search search-icon"></i>
                </div>
              </div>
            </div>
          </div>

        <!-- Bidang Sections -->
        @forelse($groupedHukums as $bidangName => $hukums)
          <div class="bidang-section mb-5">
            <h2 class="bidang-title">{{ $bidangName }}</h2>
            <div class="bidang-divider"></div>
            
            <!-- Hukum List -->
            <div class="hukum-list">
              @foreach($hukums as $hukum)
                <div class="hukum-item">
                  <div class="hukum-header" onclick="toggleContent(this)">
                    <div class="hukum-info">
                      <h4 class="hukum-title">{{ $hukum->jenis_peraturan_lengkap }} No. {{ $hukum->nomor_peraturan }} Tahun {{ $hukum->tahun_peraturan }}</h4>
                    </div>
                  </div>
                    <div class="hukum-content">
                      <span class="label-tentang">Tentang :</span>
                      <span class="isi-tentang">{!! $hukum->tentang !!}</span>
                    </div>
                </div>
              @endforeach
            </div>
          </div>
        @empty
          <div class="text-center py-5">
            <div class="empty-state">
              <i class="fas fa-file-alt empty-icon"></i>
              <h3 class="mt-3">Belum ada data hukum</h3>
              <p class="text-muted">Dokumen dasar hukum belum tersedia saat ini.</p>
            </div>
          </div>
        @endforelse
      </div>
    </section>

    <x-share-section title="Landasan Hukum Badan Kesatuan Bangsa dan Politik Kota Bandung" />

    <script>
      function toggleContent(header) {
        const content = header.nextElementSibling;
        const icon = header.querySelector('.toggle-icon');
        const isActive = header.classList.contains('active');
        
        // Close all other open items
        document.querySelectorAll('.hukum-header').forEach(el => el.classList.remove('active'));
        document.querySelectorAll('.hukum-content').forEach(el => el.classList.remove('active'));
        document.querySelectorAll('.toggle-icon').forEach(el => el.textContent = '+');
        
        // Toggle current item
        if (!isActive) {
          header.classList.add('active');
          content.classList.add('active');
          icon.textContent = '−';
        }
      }
      
      function filterItems(keyword) {
        keyword = keyword.toLowerCase();
        
        // Hide/show the items
        document.querySelectorAll('.hukum-item').forEach(item => {
          const text = item.innerText.toLowerCase();
          const isVisible = text.includes(keyword);
          item.style.display = isVisible ? 'block' : 'none';
        });
        
        // Hide/show the bidang sections
        document.querySelectorAll('.bidang-section').forEach(section => {
          const hasVisibleItems = Array.from(section.querySelectorAll('.hukum-item')).some(
            item => item.style.display !== 'none'
          );
          section.style.display = hasVisibleItems ? 'block' : 'none';
        });
      }
    </script>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
          // Smooth scroll for anchor links
          document.querySelectorAll('a[href^="#"]').forEach(anchor => {
              anchor.addEventListener('click', function(e) {
                  e.preventDefault();
                  
                  const targetId = this.getAttribute('href');
                  const targetElement = document.querySelector(targetId);
                  
                  if (targetElement) {
                      window.scrollTo({
                          top: targetElement.offsetTop - 80, // Offset for fixed header if needed
                          behavior: 'smooth'
                      });
                  }
              });
          });
      });
    </script>

    <script>
      function filterByBidang(bidangName) {
        bidangName = bidangName.toLowerCase();
        
        document.querySelectorAll('.bidang-section').forEach(section => {
          const title = section.querySelector('.bidang-title').innerText.toLowerCase();
          section.style.display = (!bidangName || title === bidangName) ? 'block' : 'none';
        });
      }
    </script>

@endsection