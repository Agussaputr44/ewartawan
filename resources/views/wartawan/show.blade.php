@extends('layout.primary')

@section('content')
<div class="container mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-4">{{ $berita->judul }}</h1>
        <p class="text-gray-700 mb-2">Kategori: <span class="font-semibold">{{ $berita->kategori->nama_kategori }}</span></p>
        <p class="text-gray-700 mb-4">Ditulis oleh: <span class="font-semibold">{{ $berita->user->nama }}</span></p>

        <div class="w-full overflow-hidden rounded-lg mb-6">
            <img src="{{ asset('storage/foto/' . $berita->foto) }}" alt="{{ $berita->judul }}" class="w-full h-auto object-cover">
        </div>

        <div class="prose max-w-none mb-8">
            <p>{{ $berita->konten }}</p>
        </div>

        <a href="{{ route('berita.index') }}" class="inline-block px-6 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-sm">Kembali</a>
    </div>
</div>
@endsection
