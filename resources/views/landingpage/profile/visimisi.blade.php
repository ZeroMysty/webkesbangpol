@extends('landingpage.layouts.app')
@section('title', 'Visi Misi')
    <link rel="stylesheet" href="{{ asset('assets/css/share-page.css') }}">
    
@section('content')
    <!-- Hero Section -->
    <section class="visimisi-hero">
        <div class="visimisi-hero-overlay"></div>
        <div class="visimisi-hero-content">
            <div class="hero-badge">About Us</div>
            <h1 class="visimisi-title">VISI DAN MISI</h1>
            <p class="visimisi-subtitle">Badan Kesatuan Bangsa dan Politik Kota Bandung</p>

        </div>
        <div class="hero-shape"></div>
    </section>

<!-- Visi & Misi Section -->
    <section class="visimisi-section" id="main-content">
        <div class="visimisi-container">
            <div class="section-header">
                <span class="section-badge">Arah & Tujuan</span>
                <h2 class="section-title">Kebijakan Strategis</h2>
                <p class="section-subtitle">Landasan fundamental yang membentuk arah kebijakan dan perencanaan strategis Bakesbangpol Kota Bandung</p>
            </div>

            @if ($visimisis)
                <div class="visimisi-content-wrapper">
                    <div class="visimisi-box visi-box" data-aos="fade-right" data-aos-duration="800">
                        <div class="visimisi-header">

                            <div class="visimisi-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <h2 class="visimisi-heading">Visi</h2>
                        </div>
                        <div class="visimisi-content">
                            {!! $visimisis->first()->visi !!}
                        </div>
                    </div>
                    
                    <div class="visimisi-box misi-box" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
                        <div class="visimisi-header">
                            <div class="visimisi-icon">
                                <i class="fas fa-tasks"></i>
                            </div>
                            <h2 class="visimisi-heading">Misi</h2>
                        </div>
                            <div class="visimisi-content misi-content">
                            @php
                                // Process the mission text to convert a single paragraph with numbered items into a proper list
                                if ($visimisis) {
                                    $misiText = $visimisis->first()->misi;
                                    
                                    // Check if the content is a paragraph with numbered items
                                    if (strpos($misiText, '<p>') !== false && strpos($misiText, '1.') !== false) {
                                        // Extract the content between <p> tags
                                        preg_match('/<p>(.*?)<\/p>/s', $misiText, $matches);
                                        if (isset($matches[1])) {
                                            $content = $matches[1];
                                            // Split by numbered items (looking for digit followed by period)
                                            $items = preg_split('/(\d+\.\s)/', $content, -1, PREG_SPLIT_DELIM_CAPTURE);
                                            
                                            if (count($items) > 1) {
                                                $formattedList = '<ul class="misi-list">';
                                                
                                                // Start from index 1 to skip the first empty element
                                                for ($i = 1; $i < count($items); $i += 2) {
                                                    if (isset($items[$i+1])) {
                                                        $formattedList .= '<li><div class="misi-number">' . trim($items[$i][0]) . '</div><span>' . trim($items[$i+1]) . '</span></li>';
                                                    }
                                                }
                                                
                                                $formattedList .= '</ul>';
                                                echo $formattedList;
                                            } else {
                                                echo $misiText; // If splitting doesn't work, output the original
                                            }
                                        } else {
                                            echo $misiText; // If pattern doesn't match, output the original
                                        }
                                    } else {
                                        echo $misiText; // If not the expected format, output the original
                                    }
                                }
                            @endphp
                        </div>
                    </div>
                </div>
            @else
                <div class="tf-alert">
                    <i class="fas fa-info-circle"></i>
                    <span>Data Visi dan Misi belum tersedia.</span>
                </div>
            @endif
        </div>
        
        
    </section>

    <x-share-section title="Visi Misi Badan Kesatuan Bangsa dan Politik Kota Bandung" />

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
@endsection