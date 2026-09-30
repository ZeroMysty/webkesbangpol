@extends('landingpage.layouts.app')
@section('title', 'Rencana Strategis')

@section('content')
    <x-dokumen-hero
        badge="STRATEGY"
        title="RENCANA STRATEGIS"
        subtitle="Badan Kesatuan Bangsa dan Politik Kota Bandung"
        lead="Dokumen perencanaan jangka menengah yang memuat visi, misi, tujuan, sasaran, strategi, dan arah kebijakan untuk mencapai target pembangunan selama periode lima tahun"
    />

    <x-dokumen-list
        :items="$renstras"
        documentName="Rencana Strategis"
    />

    <x-share-section title="Rencana Strategis Badan Kesatuan Bangsa dan Politik Kota Bandung" />
@endsection