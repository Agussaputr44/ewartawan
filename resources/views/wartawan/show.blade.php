@extends('layout.primary')

@section('content')
<div class="container">
    <h1>{{ $berita->judul }}</h1>
    <p>Kategori: {{ $berita->kategori->nama }}</p>
    <p>Status: {{ $berita->status }}</p>
    <p>Ditulis oleh: {{ $berita->user->name }}</p>
    <div>
        <img src="{{ asset('storage/foto/' . $berita->foto) }}" alt="{{ $berita->judul }}" class="img-fluid">
    </div>
    <div class="mt-4">
        <p>{{ $berita->konten }}</p>
    </div>
    <a href="{{ route('berita.index') }}" class="btn btn-primary">Kembali</a>
</div>
@endsection
