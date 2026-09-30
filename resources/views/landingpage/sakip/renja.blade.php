@extends('landingpage.layouts.app')
@section('title', 'Rencana Kerja')

@section('content')
    <x-dokumen-hero
        badge="Work Plan"
        title="RENCANA KERJA"
        subtitle="Badan Kesatuan Bangsa dan Politik Kota Bandung"
        lead="Dokumen perencanaan tahunan yang memuat program dan kegiatan yang diperlukan untuk mencapai sasaran pembangunan"
    />

    <x-dokumen-list
        :items="$renjas"
        documentName="Rencana Kerja"
    />

    <x-share-section title="Rencana Kerja Badan Kesatuan Bangsa dan Politik Kota Bandung" />
@endsection