<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    /* Wrapper buat ngilangin putih-putih di pinggir */
    .nav-wrapper {
        position: sticky;
        top: 0;
        z-index: 9999;
        transition: all 0.4s ease;
        background-color: #b01015; /* Merah Kesbangpol */
        width: 100%;
    }

    /* NORMAL STATE (ATAS) - Full Width */
    .navbar-pill {
        background-color: #b01015;
        width: 100%;
        transition: all 0.4s ease;
        padding: 15px 50px;
    }

    /* SCROLLED STATE (JADI PILL) */
    .nav-wrapper.scrolled { background-color: transparent !important; }
    .nav-wrapper.scrolled .navbar-pill {
        border-radius: 50px;
        width: 90%; /* Pill width */
        margin: 20px auto; /* Margin atas-bawah biar gak mepet */
        padding: 10px 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    /* LOGO HD */
    .brand-logo img { height: 40px; width: auto; object-fit: contain; }

    /* MEGA MENU (STANDARD SIZE) */
    @media all and (min-width: 992px) {
        .navbar-pill .nav-item { position: static !important; }
        
        .mega-menu {
            display: none; 
            position: absolute;
            left: 5%; right: 5%; 
            top: 100%;
            padding-top: 25px; 
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            z-index: 9998;
            /* Ukuran standar biar seragam */
            min-height: 250px;
        }

        .nav-item:hover .mega-menu,
        .nav-item.is-active .mega-menu { display: block; }
    }

    .mega-menu-title {
        color: #b01015; font-weight: 700; font-size: 0.85rem;
        text-transform: uppercase; margin-bottom: 15px;
        border-bottom: 2px solid #eee; padding-bottom: 10px;
    }

    .mega-menu a {
        display: block; padding: 8px 15px; color: #555;
        text-decoration: none; border-radius: 8px;
        font-size: 0.9rem; transition: 0.2s;
    }

    .mega-menu a:hover { background: #fce4e4; color: #b01015; padding-left: 20px; }
    .nav-link { color: white !important; font-weight: 500; cursor: pointer; }
    
    /* Ruang Kosong (Isi biar gak sepi) */
    .mega-menu-empty { font-size: 0.8rem; color: #999; font-style: italic; margin-top: 10px; }
</style>

<div class="nav-wrapper" id="mainNav">
    <nav class="navbar navbar-expand-lg navbar-pill container-fluid">
        <a href="/" class="brand-logo d-flex align-items-center text-decoration-none">
            <img src="{{ asset('images/component/logo3.png') }}" alt="Logo">
            <img src="{{ asset('images/component/logo1-2.png') }}" alt="Logo" class="ms-2">
            <div class="ms-3 text-white fw-bold" style="line-height: 1.1; font-size: 0.8rem;">
                BADAN KESATUAN BANGSA DAN POLITIK<br>KOTA BANDUNG
            </div>
        </a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto gap-2">
                <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" onclick="toggleMenu(event, this)">Profil</a>
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
                    <a class="nav-link" href="#" onclick="toggleMenu(event, this)">SAKIP</a>
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
                    <a class="nav-link" href="#" onclick="toggleMenu(event, this)">Mitra</a>
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
                    <a class="nav-link" href="#" onclick="toggleMenu(event, this)">Informasi</a>
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
    // Scroll Detect
    window.addEventListener('scroll', function() {
        const nav = document.getElementById('mainNav');
        if (window.scrollY > 50) { nav.classList.add('scrolled'); } 
        else { nav.classList.remove('scrolled'); }
        document.querySelectorAll('.nav-item.dropdown').forEach(el => el.classList.remove('is-active'));
    });

    // Toggle Klik & Auto-Close
    function toggleMenu(event, element) {
        event.preventDefault(); event.stopPropagation();
        const parent = element.parentElement;
        const isActive = parent.classList.contains('is-active');
        document.querySelectorAll('.nav-item.dropdown').forEach(el => el.classList.remove('is-active'));
        if (!isActive) parent.classList.add('is-active');
    }

    document.addEventListener('click', (e) => {
        if (!e.target.closest('.nav-item.dropdown')) {
            document.querySelectorAll('.nav-item.dropdown').forEach(el => el.classList.remove('is-active'));
        }
    });
</script>