@extends('landingpage.layouts.app')
@section('title', 'Pengukuran Kerja')

@section('content')
    <x-dokumen-hero
        badge="Job Evaluation"
        title="PENGUKURAN KERJA"
        subtitle="Badan Kesatuan Bangsa dan Politik Kota Bandung"
        lead="Dokumen Evaluasi Yang Berisi Capaian Pelaksanaan Program Dan Kegiatan, Digunakan Untuk Menilai Efektivitas Kinerja Dalam Mencapai Tujuan Dan Sasaran Pembangunan"
    />

    <x-dokumen-list
        :items="$ukurkerjas"
        documentName="Pengukuran Kerja"
    />

    <x-share-section title="Pengukuran Kerja Badan Kesatuan Bangsa dan Politik Kota Bandung" />
@endsection