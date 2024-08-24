@extends('layout.primary')
@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-8">Panduan Aplikasi E-Wartawan</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="#apa-itu-ewartawan" class="block p-6 bg-white rounded-lg shadow-md hover:bg-gray-100">
                <h2 class="text-2xl font-semibold mb-2">Apa itu E-Wartawan</h2>
                <p class="text-gray-600">Penjelasan tentang apa itu E-Wartawan, tujuan dibuatnya aplikasi ini, dan bagaimana
                    aplikasi ini bisa membantu wartawan dalam pekerjaan mereka.</p>
            </a>
            <a href="#fitur-ewartawan" class="block p-6 bg-white rounded-lg shadow-md hover:bg-gray-100">
                <h2 class="text-2xl font-semibold mb-2">Fitur apa saja yang Ditawarkan E-Wartawan</h2>
                <p class="text-gray-600">Daftar dan penjelasan fitur-fitur yang tersedia di E-Wartawan, seperti pembuatan
                    berita, manajemen berita, dan fitur tambahan lainnya yang mendukung aktivitas wartawan.</p>
            </a>
            <a href="#kategori-media" class="block p-6 bg-white rounded-lg shadow-md hover:bg-gray-100">
                <h2 class="text-2xl font-semibold mb-2">Kategori Media apa saja yang diatur oleh E-Wartawan</h2>
                <p class="text-gray-600">Informasi tentang berbagai kategori media yang diatur oleh E-Wartawan, seperti
                    berita cetak, berita online, televisi, dan radio.</p>
            </a>
            <a href="#manual-book" class="block p-6 bg-white rounded-lg shadow-md hover:bg-gray-100">
                <h2 class="text-2xl font-semibold mb-2">Penggunaan E-Wartawan</h2>
                <p class="text-gray-600">Buku panduan pengguna yang berisi langkah-langkah dan petunjuk penggunaan aplikasi
                    E-Wartawan secara lengkap, mulai dari login, navigasi, penggunaan fitur, hingga tips dan trik.</p>
            </a>
        </div>

    </div>
@endsection
