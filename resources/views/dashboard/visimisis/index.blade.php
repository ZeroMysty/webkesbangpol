@extends('dashboard.layouts.app')

@section('title', 'Profil Organisasi')

@section('content')
<div class="container-fluid organization-profile-page">
    <div class="organization-profile-header">
        <div>
            <span class="organization-profile-eyebrow">PROFIL ORGANISASI</span>
            <h1>Visi, Misi &amp; Informasi Organisasi</h1>
            <p>Kelola informasi utama dan sejarah organisasi dalam satu tempat.</p>
        </div>
        <a href="{{ route('visimisis.create') }}" class="organization-profile-add">
            <i class="fas fa-plus"></i>
            <span>Tambah Data</span>
        </a>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif

    @forelse ($visimisis as $visimisi)
        <article class="organization-profile-card">
            <div class="organization-profile-card-header">
                <div>
                    <span class="organization-profile-record-label">DATA ORGANISASI</span>
                    <h2>Informasi Profil</h2>
                </div>
                <div class="organization-profile-actions">
                    <a href="{{ route('visimisis.edit', $visimisi->id) }}" class="organization-profile-action edit" aria-label="Edit profil organisasi" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('visimisis.destroy', $visimisi->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="organization-profile-action delete" aria-label="Hapus profil organisasi" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="organization-profile-main">
                <div class="organization-profile-sections">
                    <section class="organization-profile-section vision">
                        <div class="organization-profile-section-title">
                            <span class="organization-profile-icon"><i class="fas fa-eye"></i></span>
                            <h3>Visi</h3>
                        </div>
                        <div class="organization-profile-richtext">{!! $visimisi->visi !!}</div>
                    </section>

                    <section class="organization-profile-section">
                        <div class="organization-profile-section-title">
                            <span class="organization-profile-icon"><i class="fas fa-bullseye"></i></span>
                            <h3>Misi</h3>
                        </div>
                        <div class="organization-profile-richtext">{!! $visimisi->misi !!}</div>
                    </section>

                    <section class="organization-profile-section">
                        <div class="organization-profile-section-title">
                            <span class="organization-profile-icon"><i class="fas fa-list-check"></i></span>
                            <h3>Tugas Pokok &amp; Fungsi</h3>
                        </div>
                        <div class="organization-profile-richtext">{!! $visimisi->tupoksi !!}</div>
                    </section>

                    <section class="organization-profile-section">
                        <div class="organization-profile-section-title">
                            <span class="organization-profile-icon"><i class="fas fa-landmark"></i></span>
                            <h3>Sejarah</h3>
                        </div>
                        <div class="organization-profile-richtext">{!! $visimisi->sejarah !!}</div>
                    </section>
                </div>

                @if($visimisi->sejarah_image)
                    <aside class="organization-profile-image">
                        <span class="organization-profile-image-label">DOKUMENTASI</span>
                        <img src="{{ asset('images/component/'.$visimisi->sejarah_image) }}" alt="Dokumentasi sejarah organisasi">
                    </aside>
                @endif
            </div>
        </article>
    @empty
        <div class="organization-profile-empty">
            <span class="organization-profile-empty-icon"><i class="fas fa-building"></i></span>
            <h2>Data profil belum tersedia</h2>
            <p>Tambahkan visi, misi, tupoksi, dan sejarah organisasi untuk mulai mengelola profil.</p>
            <a href="{{ route('visimisis.create') }}" class="organization-profile-add">
                <i class="fas fa-plus"></i>
                <span>Tambah Data</span>
            </a>
        </div>
    @endforelse

    <div class="organization-profile-pagination">
        {{ $visimisis->links('pagination::bootstrap-5') }}
    </div>
</div>

<script>
    @if(session()->has('success'))
        toastr.success(@json(session('success')), 'BERHASIL!');
    @elseif(session()->has('error'))
        toastr.error(@json(session('error')), 'GAGAL!');
    @endif
</script>
@stop
