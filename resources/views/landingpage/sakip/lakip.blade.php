@extends('landingpage.layouts.app')
@section('title', 'Laporan Akuntanbilitas Kinerja Instansi Pemerintahan')

@section('content')
    <x-dokumen-hero
        badge="AKIP Report"
        title="LAPORAN AKUNTANBILITAS KINERJA INSTANSI PEMERINTAHAN"
        subtitle="Badan Kesatuan Bangsa dan Politik Kota Bandung"
        lead="Dokumen Pertanggungjawaban Kinerja Yang Menyajikan Informasi Pencapaian Sasaran Strategis Dan Hasil Pelaksanaan Program, Sebagai Wujud Transparansi Dan Akuntabilitas Instansi Pemerintah Kepada Publik"
    />

    <x-dokumen-list
        :items="$lakips"
        documentName="Laporan Akuntanbilitas Kinerja"
    />

    <x-share-section title="Laporan Akuntanbilitas Kinerja Instansi Pemerintahan Badan Kesatuan Bangsa dan Politik Kota Bandung" />
@endsection