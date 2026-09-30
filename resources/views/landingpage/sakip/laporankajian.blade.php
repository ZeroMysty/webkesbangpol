@extends('landingpage.layouts.app')
@section('title', 'Laporan Kajian')

@section('content')
    <x-dokumen-hero
        badge="Laporan Kajian"
        title="LAPORAN KAJIAN"
        subtitle="Badan Kesatuan Bangsa dan Politik Kota Bandung"
        lead="Dokumen Kajian Dan Penelitian Sebagai Hasil Evaluasi Dan Rekomendasi Kebijakan Dalam Rangka Menjaga Kondusivitas Dan Akuntabilitas Pemerintahan"
    />

    <x-dokumen-list
        :items="$laporankajians"
        documentName="Laporan Kajian"
    />

    <x-share-section title="Laporan Kajian Badan Kesatuan Bangsa dan Politik Kota Bandung" />
@endsection
