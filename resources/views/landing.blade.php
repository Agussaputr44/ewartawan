@extends('layout.primary')
@section('content')
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

        <div class="max-w-2xl text-center mx-auto mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Baca Berita Terbaru</h2>
            <p class="mt-1 text-gray-600 dark:text-neutral-400">Temukan berita yang anda sukai</p>
        </div>
        
        <div class="grid lg:grid-cols-3 gap-6">
            @foreach($beritas as $berita)
                <a class="group relative block rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300" href="{{ route('user.berita.id', $berita->id) }}">
                    <div class="h-[350px]">
                        <img class="w-full h-full object-cover" src="{{ asset('storage/foto/' . $berita->foto) }}" alt="{{ $berita->judul }}">
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-4">
                            <div class="flex-shrink-0">
                                <img class="w-10 h-10 object-cover rounded-full border-2 border-white" src="{{ asset('storage/foto/' . $berita->foto)}}" alt="{{ $berita->judul }}">
                            </div>
                            <div class="ml-3">
                                <h4 class="font-semibold text-gray-800">{{ $berita->user->nama }}</h4>
                                <p class="text-xs text-gray-600">{{ $berita->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 transition duration-300">{{ $berita->judul }}</h3>
                        <p class="mt-2 text-gray-600">{{ \Illuminate\Support\Str::limit($berita->konten, 150, '...') }}</p>
                        <p class="mt-2 text-blue-600 font-medium hover:underline">Baca Selengkapnya</p>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <div class="inline-block bg-white border shadow-sm rounded-full dark:bg-neutral-900 dark:border-neutral-800">
                <div class="py-3 px-4 flex items-center gap-x-2">
                    <p class="text-gray-600 dark:text-neutral-400">Ingin membaca lebih banyak lagi?</p>
                    <a class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium dark:text-blue-500" href="{{ route('berita.index') }}">
                        Klik di sini
                        <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection
