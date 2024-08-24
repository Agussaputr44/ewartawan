@extends('admin.partial.primary')

@section('content')
    <div class="p-6 bg-white border-b border-gray-200">
        <h2 class="text-2xl font-semibold leading-tight">Dashboard Admin</h2>

        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-pastel-blue p-4 rounded-lg shadow">
                <div class="flex items-center">
                    <i class="fas fa-users text-3xl text-gray-900 mr-3"></i>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Jumlah Pengguna</h3>
                        <p class="mt-2 text-3xl font-semibold text-gray-900">{{ $jumlahPengguna }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-pastel-green p-4 rounded-lg shadow">
                <div class="flex items-center">
                    <i class="fas fa-user-tie text-3xl text-gray-900 mr-3"></i>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Jumlah Wartawan</h3>
                        <p class="mt-2 text-3xl font-semibold text-gray-900">{{ $jumlahWartawan }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-pastel-pink p-4 rounded-lg shadow">
                <div class="flex items-center">
                    <i class="fas fa-newspaper text-3xl text-gray-900 mr-3"></i>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Jumlah Berita</h3>
                        <p class="mt-2 text-3xl font-semibold text-gray-900">{{ $jumlahBerita }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-pastel-yellow p-4 rounded-lg shadow">
                <div class="flex items-center">
                    <i class="fas fa-tags text-3xl text-gray-900 mr-3"></i>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Jumlah Kategori</h3>
                        <p class="mt-2 text-3xl font-semibold text-gray-900">{{ $jumlahKategori }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-pastel-purple p-4 rounded-lg shadow">
                <div class="flex items-center">
                    <i class="fas fa-comments text-3xl text-gray-900 mr-3"></i>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Jumlah Komentar</h3>
                        <p class="mt-2 text-3xl font-semibold text-gray-900">{{ $jumlahKomentar }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <h3 class="text-xl font-medium text-gray-900">Berita Terbaru</h3>
            <ul class="mt-4 space-y-2">
                @foreach ($beritaTerbaru as $berita)
                    <li class="p-4 bg-pastel-blue rounded-lg shadow">
                        <h4 class="text-lg font-medium text-gray-900">{{ $berita->judul }}</h4>
                        <p class="mt-2 text-sm text-gray-600">{{ Str::limit($berita->konten, 100) }}</p>
                        <p class="mt-2 text-sm text-gray-600">Status: {{ ucfirst($berita->status) }}</p>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="mt-6">
            <h3 class="text-xl font-medium text-gray-900">Komentar Terbaru</h3>
            <ul class="mt-4 space-y-2">
                @foreach ($komentarTerbaru as $komentar)
                    <li class="p-4 bg-pastel-green rounded-lg shadow">
                        <p class="mt-2 text-sm text-gray-600 font-bold">Pengguna: {{ $komentar->user->nama }}</p>
                        <p class="text-sm mt-2 text-gray-600">{{ $komentar->isi_komentar }}</p>
                        <p class="mt-2 text-sm text-gray-600">Status: {{ ucfirst($komentar->status_komentar) }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
