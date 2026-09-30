@extends('landingpage.layouts.app')
@section('title', 'Tugas Pokok dan Fungsi')
    <link rel="stylesheet" href="{{ asset('assets/css/share-page.css') }}">

@section('content')
    <!-- Hero Section -->
    <section class="tf-hero">
        <div class="tf-hero-overlay"></div>
        <div class="tf-hero-content">
            <div class="hero-badge">Duties & Functions</div>
            <h1 class="tf-title">TUGAS DAN FUNGSI</h1>
            <p class="tf-subtitle">Badan Kesatuan Bangsa dan Politik Kota Bandung</p>

        </div>
    </section>

    <!-- Tugas Pokok dan Fungsi -->
    <section class="tf-content-section" id="main-content">
        <div class="tf-container">
            <div class="section-header" data-aos="fade-up" data-aos-duration="800">
                <span class="section-badge">Landasan Operasional</span>
                <h2 class="section-title">Tugas Pokok dan Fungsi</h2>
                <p class="section-subtitle">Kewenangan dan tanggung jawab Badan Kesatuan Bangsa dan Politik Kota Bandung dalam menjalankan perannya di lingkungan pemerintahan Kota Bandung</p>
            </div>
            
            @if ($visimisis)
                <div class="tf-cards-container" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="tf-card tugas-card">
                        <div class="tf-card-header">
                            <div class="tf-content-icon">
                                <i class="fas fa-tasks"></i>
                            </div>
                            <h3 class="tf-card-title">Tugas Pokok</h3>
                        </div>
                        
                        <div class="tf-content-body tugas-content">
                            <!-- Tugas Pokok content will be here -->
                            <div class="tugas-pokok-content"></div>
                        </div>
                    </div>
                    
                    <div class="tf-card fungsi-card">
                        <div class="tf-card-header">
                            <div class="tf-content-icon">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <h3 class="tf-card-title">Fungsi</h3>
                        </div>
                        
                        <div class="tf-content-body fungsi-content">
                            <!-- Fungsi content will be here -->
                            <div class="fungsi-content"></div>
                        </div>
                    </div>
                </div>
                
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Get the content from the database
                        const tupoksiContent = {!! json_encode($visimisis->first()->tupoksi ?? '') !!};
                        
                        // Create a temporary div to parse the HTML content
                        const tempDiv = document.createElement('div');
                        tempDiv.innerHTML = tupoksiContent;
                        
                        // Find where Tugas Pokok ends and Fungsi begins
                        const paragraphs = tempDiv.querySelectorAll('p, strong, ol');
                        let foundTugasPokok = false;
                        let foundFungsi = false;
                        let tugasPokokElements = [];
                        let fungsiElements = [];
                        
                        // Iterate through elements to separate content
                        for (const element of paragraphs) {
                            const text = element.textContent.trim();
                            
                            // Check for Tugas Pokok section but don't include the heading itself
                            if (text.includes('Tugas Pokok') || text.includes('TUGAS POKOK')) {
                                foundTugasPokok = true;
                                // Don't add the heading element itself to avoid duplication
                                continue;
                            }
                            
                            // Check for Fungsi section but don't include the heading itself
                            if (text.includes('Fungsi') || text.includes('FUNGSI')) {
                                foundFungsi = true;
                                // Don't add the heading element itself to avoid duplication
                                continue;
                            }
                            
                            // Add elements to their respective collections
                            if (foundFungsi) {
                                fungsiElements.push(element.cloneNode(true));
                            } else if (foundTugasPokok) {
                                tugasPokokElements.push(element.cloneNode(true));
                            }
                        }
                        
                        // If we don't find explicit sections, make a reasonable split
                        if (!foundFungsi && !foundTugasPokok && paragraphs.length > 0) {
                            // Check if we have ordered lists to work with
                            const allLists = tempDiv.querySelectorAll('ol');
                            if (allLists.length >= 2) {
                                // First list goes to Tugas Pokok (but skip any heading)
                                const firstListContent = [];
                                let currentElement = allLists[0];
                                while (currentElement && 
                                    !currentElement.textContent.includes('Fungsi') && 
                                    !currentElement.textContent.includes('FUNGSI')) {
                                    firstListContent.push(currentElement.cloneNode(true));
                                    currentElement = currentElement.nextElementSibling;
                                }
                                tugasPokokElements = firstListContent;
                                
                                // Second list goes to Fungsi (but skip any heading)
                                fungsiElements = [allLists[1]];
                            } else {
                                // If no clear sections, try to split content evenly
                                const midpoint = Math.ceil(paragraphs.length / 2);
                                tugasPokokElements = Array.from(paragraphs).slice(0, midpoint)
                                    .filter(el => !el.textContent.includes('Tugas Pokok') && 
                                                !el.textContent.includes('TUGAS POKOK'))
                                    .map(el => el.cloneNode(true));
                                    
                                fungsiElements = Array.from(paragraphs).slice(midpoint)
                                    .filter(el => !el.textContent.includes('Fungsi') && 
                                                !el.textContent.includes('FUNGSI'))
                                    .map(el => el.cloneNode(true));
                            }
                        }
                        
                        // Create HTML content for each section, filtering out any remaining headings
                        const tugasPokokHTML = tugasPokokElements
                            .filter(el => {
                                const text = el.textContent.trim();
                                return !text.includes('Tugas Pokok') && !text.includes('TUGAS POKOK');
                            })
                            .map(el => el.outerHTML)
                            .join('');
                        
                        const fungsiHTML = fungsiElements
                            .filter(el => {
                                const text = el.textContent.trim();
                                return !text.includes('Fungsi') && !text.includes('FUNGSI');
                            })
                            .map(el => el.outerHTML)
                            .join('');
                        
                        // Insert content into respective containers
                        document.querySelector('.tugas-pokok-content').innerHTML = 
                            tugasPokokHTML || '<p>Data Tugas Pokok belum tersedia.</p>';
                        
                        document.querySelector('.fungsi-content').innerHTML = 
                            fungsiHTML || '<p>Data Fungsi belum tersedia.</p>';
                    });
                </script>
            @else
                <div class="tf-alert" data-aos="fade-up" data-aos-duration="800">
                    <i class="fas fa-info-circle"></i>
                    <span>Data Tugas Pokok dan Fungsi belum tersedia.</span>
                </div>
            @endif
        </div>
    </section>
    
    <x-share-section title="Tugas Pokok dan Fungsi Badan Kesatuan Bangsa dan Politik Kota Bandung" />

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
