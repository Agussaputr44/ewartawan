@extends('layout.primary')

@section('content')
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <a href="{{ route('redaktur.index') }}"
            class="py-2 my-2 mx-auto px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-300 bg-gray-100 text-gray-700 hover:bg-gray-200 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700">
            Kembali
        </a>
        <div class="max-w-2xl text-center mx-auto mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Kelola Berita Anda</h2>
            <p class="mt-1 text-gray-600 dark:text-neutral-400">Di sini Anda dapat mengelola berita yang telah Anda tulis.
            </p>

        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th
                            class="py-2 px-4 border-b border-gray-200 dark:border-gray-600 text-left text-sm font-semibold text-gray-600 dark:text-gray-300">
                            Judul</th>
                        <th
                            class="py-2 px-4 border-b border-gray-200 dark:border-gray-600 text-left text-sm font-semibold text-gray-600 dark:text-gray-300">
                            Isi</th>
                        <th
                            class="py-2 px-4 border-b border-gray-200 dark:border-gray-600 text-left text-sm font-semibold text-gray-600 dark:text-gray-300">
                            Foto</th>
                        <th
                            class="py-2 px-4 border-b border-gray-200 dark:border-gray-600 text-left text-sm font-semibold text-gray-600 dark:text-gray-300">
                            Kategori</th>
                        <th
                            class="py-2 px-4 border-b border-gray-200 dark:border-gray-600 text-left text-sm font-semibold text-gray-600 dark:text-gray-300">
                            Status</th>
                        <th
                            class="py-2 px-4 border-b border-gray-200 dark:border-gray-600 text-left text-sm font-semibold text-gray-600 dark:text-gray-300">
                            Tanggal</th>
                        <th
                            class="py-2 px-4 border-b border-gray-200 dark:border-gray-600 text-left text-sm font-semibold text-gray-600 dark:text-gray-300">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beritas as $berita)
                        <tr>
                            <td
                                class="py-2 px-4 border-b border-gray-200 dark:border-gray-600 text-sm text-gray-700 dark:text-gray-300">
                                {{ $berita->judul }}</td>
                            <td
                                class="py-2 px-4 border-b border-gray-200 dark:border-gray-600 text-sm text-gray-700 dark:text-gray-300">
                                {{ $berita->konten }}</td>
                            <td
                                class="py-2 px-4 border-b border-gray-200 dark:border-gray-600 text-sm text-gray-700 dark:text-gray-300">
                                @if ($berita->foto)
                                    <img src="{{ asset('storage/foto/' . $berita->foto) }}" alt="{{ $berita->judul }}"
                                        class="w-16 h-16 object-cover">
                                @else
                                    <span class="text-gray-500">No photo</span>
                                @endif
                            </td>
                            <td
                                class="py-2 px-4 border-b border-gray-200 dark:border-gray-600 text-sm text-gray-700 dark:text-gray-300">
                                {{ $berita->kategori->nama_kategori }}</td>
                            <td
                                class="py-2 px-4 border-b border-gray-200 dark:border-gray-600 text-sm text-gray-700 dark:text-gray-300">
                                {{ $berita->status }}</td>
                            <td
                                class="py-2 px-4 border-b border-gray-200 dark:border-gray-600 text-sm text-gray-700 dark:text-gray-300">
                                {{ $berita->created_at->format('d M, Y') }}</td>
                            <td
                                class="py-2 px-4 border-b border-gray-200 dark:border-gray-600 text-sm text-gray-700 dark:text-gray-300">
                                <a href="{{ route('redaktur.edit', $berita->id) }}"
                                    class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('redaktur.destroy', $berita->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
