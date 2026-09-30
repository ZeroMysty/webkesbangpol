@props([
    'badge' => '',
    'title' => '',
    'subtitle' => 'Badan Kesatuan Bangsa dan Politik Kota Bandung',
    'lead' => '',
])

<section class="dokumen-hero">
    <div class="dokumen-overlay"></div>
    <div class="dokumen-content">
        @if($badge)
            <div class="hero-badge">
                <span class="badge-text">{{ $badge }}</span>
            </div>
        @endif
        <h1 class="dokumen-title">{{ $title }}</h1>
        @if($subtitle)
            <p class="dokumen-subtitle">{{ $subtitle }}</p>
        @endif
        @if($lead)
            <p class="dokumen-lead">{{ $lead }}</p>
        @endif
    </div>
</section>
