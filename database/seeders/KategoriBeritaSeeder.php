<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriBerita;

class KategoriBeritaSeeder extends Seeder
{
    public function run()
    {
        KategoriBerita::create(['nama_kategori' => 'Politik']);
        KategoriBerita::create(['nama_kategori' => 'Ekonomi']);
        KategoriBerita::create(['nama_kategori' => 'Olahraga']);
        KategoriBerita::create(['nama_kategori' => 'Teknologi']);
        KategoriBerita::create(['nama_kategori' => 'Hiburan']);
    }
}
