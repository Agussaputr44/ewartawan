@extends('layout.primary')

@section('content')
    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <a href="{{ route('redaktur.index') }}"
            class="py-2 my-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-300 bg-gray-100 text-gray-700 hover:bg-gray-200 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700">
            Kembali
        </a>
        <form action="{{ route('redaktur.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Card -->
            <div class="bg-white rounded-xl shadow dark:bg-neutral-900">
                <div class="pt-0 p-4 sm:pt-0 sm:p-7">
                    <!-- Grid -->
                    <div class="space-y-4 sm:space-y-6">

                        <div class="space-y-2">
                            <label for="judul"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                                Judul
                            </label>
                            <input id="judul" name="judul" type="text"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Enter judul" value="{{ $berita->judul }}" required>
                        </div>

                        <div class="space-y-2">
                            <label for="konten"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                                Konten
                            </label>
                            <textarea id="konten" name="konten"
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                rows="6" placeholder="Enter konten" required>{{ $berita->konten }}</textarea>
                        </div>

                        <div class="space-y-2">
                            <label for="foto"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                                Foto
                            </label>
                            <label for="foto"
                                class="group p-4 sm:p-7 block cursor-pointer text-center border-2 border-dashed border-gray-200 rounded-lg focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 dark:border-neutral-700">
                                <input id="foto" name="foto" type="file" class="sr-only">
                                <span class="flex justify-center">
                                    <img src="{{ asset('storage/foto/' . $berita->foto) }}"
                                        alt="{{ $berita->judul }}" class="rounded-lg h-32 w-32 object-cover">
                                </span>
                                <span class="mt-2 block text-sm text-gray-800 dark:text-neutral-200">
                                    Browse your device or <span class="group-hover:text-blue-700 text-blue-600">drag 'n
                                        drop'</span>
                                </span>
                                <span class="mt-1 block text-xs text-gray-500 dark:text-neutral-500">
                                    Maximum file size is 2 MB
                                </span>
                            </label>
                        </div>

                        <div class="space-y-2">
                            <label for="kategori_id"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                                Kategori
                            </label>
                            <select id="kategori_id" name="kategori_id"
                                class="text-black py-2 px-3 pe-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                <option value="" selected class="text-black">Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if($berita->kategori_id == $category->id) selected @endif class="text-black">{{ $category->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label for="status"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                                Status
                            </label>
                            <select id="status" name="status"
                                class="text-black py-2 px-3 pe-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                <option value="pending" @if($berita->status == 'pending') selected @endif class="text-black">Pending</option>
                                <option value="published" @if($berita->status == 'published') selected @endif class="text-black">Published</option>
                            </select>
                        </div>

                    </div>
                    <!-- End Grid -->

                    <div class="mt-5 flex justify-center gap-x-2">
                        <button type="submit"
                            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </form>
    </div>
@endsection
