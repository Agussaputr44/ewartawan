@extends('layout.primary')

@section('content')
<div class="container">
    <h1>Edit Berita</h1>
    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ $berita->judul }}" required>
        </div>
        <div class="form-group">
            <label for="konten">Konten</label>
            <textarea name="konten" id="konten" class="form-control" required>{{ $berita->konten }}</textarea>
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
        </div>
        <div class="form-group">
            <label for="kategori_id">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($berita->kategori_id == $category->id) selected @endif>{{ $category->nama }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
