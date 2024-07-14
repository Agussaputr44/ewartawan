<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriBeritaTable extends Migration
{
    public function up()
    {
        Schema::create('kategori_berita', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nama_kategori');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_berita');
    }
}
