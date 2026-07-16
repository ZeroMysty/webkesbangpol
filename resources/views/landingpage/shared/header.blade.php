{{-- Style header sudah dipindahkan ke public/assets/css/landingpage-shared.css --}}

<!-- Backdrop untuk Focus Mode & Mobile Menu -->
<div class="nav-backdrop" id="navBackdrop" onclick="closeMobileMenu()"></div>

<div class="nav-wrapper" id="mainNav">
    <nav class="navbar navbar-expand-lg navbar-pill container-fluid">
        <a href="/" class="brand-logo d-flex align-items-center text-decoration-none">
            <img src="{{ asset('images/component/logo3.png') }}" alt="Logo">
            <img src="{{ asset('images/component/logo1-2.png') }}" alt="Logo" class="ms-2">
            <div class="ms-3 text-white fw-bold brand-text" style="line-height: 1.1; font-size: 0.8rem;">
                BADAN KESATUAN BANGSA DAN POLITIK<br>KOTA BANDUNG
            </div>
        </a>

        <!-- Burger Button untuk Mobile -->
        <button class="navbar-toggler border-0 text-white shadow-none" type="button" onclick="toggleMobileMenu()" aria-label="Toggle navigation">
            <i class="fas fa-bars" style="font-size: 1.3rem;"></i>
        </button>

        <div class="navbar-collapse" id="navbarContent">
            <!-- Header khusus Offcanvas Mobile -->
            <div class="mobile-menu-header">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('images/component/logo1-2.png') }}" alt="Logo" style="height: 35px;">
                    <span class="ms-2 text-white fw-bold" style="font-size: 0.9rem;">KESBANGPOL</span>
                </div>
                <button class="btn-close-menu" onclick="closeMobileMenu()">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <ul class="navbar-nav ms-auto gap-2">
                <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" onclick="toggleDropdown(event, this)">
                        Profil <i class="fas fa-chevron-down ms-1 chevron-icon"></i>
                    </a>
                    <div class="mega-menu"><div class="row">
                        <div class="col-md-4">
                            <div class="mega-menu-title">Tentang Kami</div>
                            <a href="{{ route('tampilvisimisi') }}">Visi Misi</a>
                            <a href="{{ route('tampiltugasfungsi') }}">Tugas dan Fungsi</a>
                            <a href="{{ route('tampilstruktur') }}">Struktur Organisasi</a>
                        </div>
                        <div class="col-md-4">
                            <div class="mega-menu-title">Lembaga</div>
                            <a href="{{ route('tampildasarhukum') }}">Landasan Hukum</a>
                            <a href="{{ route('tampilprogram') }}">Program & Kegiatan</a>
                            <a href="{{ route('tampilsejarah') }}">Sejarah</a>
                        </div>
                        <div class="col-md-4"><div class="mega-menu-empty">Informasi kelembagaan Kesbangpol Kota Bandung yang mencakup visi misi hingga sejarah.</div></div>
                    </div></div>
                </li>

                <li class="nav-item"><a class="nav-link" href="{{ route('semua-artikel')}}">Artikel</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" onclick="toggleDropdown(event, this)">
                        SAKIP <i class="fas fa-chevron-down ms-1 chevron-icon"></i>
                    </a>
                    <div class="mega-menu"><div class="row">
                        <div class="col-md-4">
                            <div class="mega-menu-title">Perencanaan</div>
                            <a href="{{ route('tampiliku') }}">IKU</a>
                            <a href="{{ route('tampilrenja') }}">RENJA</a>
                            <a href="{{ route('tampilrenstra') }}">RENSTRA</a>
                        </div>
                        <div class="col-md-4">
                            <div class="mega-menu-title">Evaluasi</div>
                            <a href="{{ route('tampilukurkerja') }}">Pengukuran Kerja</a>
                            <a href="{{ route('tampillakip') }}">Laporan AKIP</a>
                        </div>
                        <div class="col-md-4"><div class="mega-menu-empty">Dokumen akuntabilitas kinerja disusun sebagai transparansi publik.</div></div>
                    </div></div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" onclick="toggleDropdown(event, this)">
                        Mitra <i class="fas fa-chevron-down ms-1 chevron-icon"></i>
                    </a>
                    <div class="mega-menu"><div class="row">
                        <div class="col-md-4">
                            <div class="mega-menu-title">Pemerintahan</div>
                            <a href="{{ route('tampilmitra') }}">Semua Mitra</a>
                            <a href="{{ route('mitra.detail', ['kategori' => 'forkopimda']) }}">FORKOPIMDA</a>
                        </div>
                        <div class="col-md-4">
                            <div class="mega-menu-title">Lembaga</div>
                            <a href="{{ route('mitra.detail', ['kategori' => 'bnn']) }}">BNN</a>
                            <a href="{{ route('mitra.detail', ['kategori' => 'partai-politik']) }}">Partai Politik</a>
                            <a href="{{ route('mitra.detail', ['kategori' => 'fkdm']) }}">FKDM</a>
                        </div>
                        <div class="col-md-4"><div class="mega-menu-empty">Mitra strategis dalam menjaga kondusivitas kota.</div></div>
                    </div></div>
                </li>

                <li class="nav-item"><a class="nav-link" href="https://layanan.bandung.go.id" target="_blank">Pelayanan</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" onclick="toggleDropdown(event, this)">
                        Informasi <i class="fas fa-chevron-down ms-1 chevron-icon"></i>
                    </a>
                    <div class="mega-menu"><div class="row">
                        <div class="col-md-4">
                            <div class="mega-menu-title">Pemilu</div>
                            <a href="{{ route('pemilu.index') }}">Pusat Info Pemilu</a>
                        </div>
                        <div class="col-md-4">
                            <div class="mega-menu-title">Data Ormas</div>
                            <a href="{{ route('tampil-data-ormas') }}">Direktori Data Ormas</a>
                        </div>
                        <div class="col-md-4">
                            <div class="mega-menu-title">Statistik</div>
                            <a href="{{ route('tampil-jumlah-potensi-konflik') }}">Potensi Konflik</a>
                        </div>
                    </div></div>
                </li>
            </ul>
        </div>
    </nav>
</div>

<script>
    // 1. SMART SCROLL NAVBAR
    let lastScrollTop = 0;
    window.addEventListener('scroll', function() {
        const nav = document.getElementById('mainNav');
        const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
        
        // Efek Scrolled (Pill)
        if (currentScroll > 50) { 
            nav.classList.add('scrolled'); 
        } else { 
            nav.classList.remove('scrolled'); 
        }
        
        // Smart Hide/Show Navbar
        if (currentScroll > lastScrollTop && currentScroll > 200) {
            // Scroll Down & sudah lewat header
            nav.classList.add('nav-hidden');
            // Tutup dropdown di desktop agar layar bersih
            if (window.innerWidth >= 992) {
                closeAllDropdowns();
            }
        } else {
            // Scroll Up
            nav.classList.remove('nav-hidden');
        }
        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    });

    // 2. OFFCANVAS MOBILE MENU LOGIC
    const navbarContent = document.getElementById('navbarContent');
    const navBackdrop = document.getElementById('navBackdrop');

    function toggleMobileMenu() {
        navbarContent.classList.toggle('show-offcanvas');
        navBackdrop.classList.toggle('show');
        document.body.classList.toggle('menu-open');
    }

    function closeMobileMenu() {
        navbarContent.classList.remove('show-offcanvas');
        navBackdrop.classList.remove('show');
        document.body.classList.remove('menu-open');
        closeAllDropdowns();
    }

    // 3. DROPDOWN TOGGLE LOGIC
    function toggleDropdown(event, element) {
        event.preventDefault(); 
        event.stopPropagation();
        
        if (window.innerWidth < 992) {
            const parent = element.parentElement;
            const isActive = parent.classList.contains('is-active');
            closeAllDropdowns();
            if (!isActive) parent.classList.add('is-active');
        }
    }

    function closeAllDropdowns() {
        document.querySelectorAll('.nav-item.dropdown').forEach(el => el.classList.remove('is-active'));
    }

    // 4. FOCUS MODE (BLUR BACKDROP ON HOVER) - KHUSUS DESKTOP
    const navItemsDropdown = document.querySelectorAll('.nav-item.dropdown');
    navItemsDropdown.forEach(item => {
        item.addEventListener('mouseenter', () => {
            if (window.innerWidth >= 992) {
                navBackdrop.classList.add('show');
            }
        });
        item.addEventListener('mouseleave', () => {
            if (window.innerWidth >= 992) {
                navBackdrop.classList.remove('show');
            }
        });
    });

    // Klik di luar menu untuk menutup
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.nav-item.dropdown') && !e.target.closest('#navbarContent') && !e.target.closest('.navbar-toggler')) {
            closeAllDropdowns();
        }
    });

    // 5. AUTO ACTIVE LINK HIGHLIGHT
    document.addEventListener('DOMContentLoaded', () => {
        const currentUrl = window.location.href;
        const navLinks = document.querySelectorAll('.nav-link');
        
        navLinks.forEach(link => {
            if (link.getAttribute('href') === '#' || link.getAttribute('href') === '') return;
            
            if (currentUrl === link.href || currentUrl.startsWith(link.href + '/') || currentUrl.startsWith(link.href + '?')) {
                link.closest('.nav-item').classList.add('active');
            }
        });
        
        const megaLinks = document.querySelectorAll('.mega-menu a');
        megaLinks.forEach(link => {
            if (currentUrl === link.href || currentUrl.startsWith(link.href + '/') || currentUrl.startsWith(link.href + '?')) {
                link.style.color = '#b01015';
                link.style.fontWeight = '600';
                link.style.backgroundColor = '#fdf2f2';
                const parentDropdown = link.closest('.nav-item.dropdown');
                if (parentDropdown) parentDropdown.classList.add('active');
            }
        });
        
        // Aturan khusus: Homepage
        if(currentUrl === window.location.origin + '/') {
            navLinks.forEach(l => l.closest('.nav-item').classList.remove('active'));
            const homeLink = document.querySelector('.nav-link[href="/"]');
            if (homeLink) homeLink.closest('.nav-item').classList.add('active');
        }
    });
</script>