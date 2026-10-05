@extends('landingpage.layouts.app')
@section('title', 'Indikator Kinerja Utama')

@section('content')
    <x-dokumen-hero
        badge="Performance Indicators"
        title="INDIKATOR KINERJA UTAMA"
        subtitle="Badan Kesatuan Bangsa dan Politik Kota Bandung"
        lead="Dokumen yang memuat ukuran kinerja utama sebagai acuan dalam mengukur keberhasilan pencapaian tujuan dan sasaran strategis instansi"
    />

    <x-dokumen-list
        :items="$ikus"
        documentName="Indikator Kinerja Utama"
    />

    <x-share-section title="Indikator Kinerja Utama Badan Kesatuan Bangsa dan Politik Kota Bandung" />
@endsection