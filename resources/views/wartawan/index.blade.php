@extends('layout.primary')
@section('content')
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

        <div class="max-w-2xl text-center mx-auto mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Read our latest news</h2>
            <p class="mt-1 text-gray-600 dark:text-neutral-400">We've helped some great companies brand, design and get to market.</p>
        </div>
        
        <div class="max-w-[85rem] px-4 py-8 sm:px-6 lg:px-8 lg:py-18 mx-auto">
            <!-- Grid -->
            <div class="grid lg:grid-cols-2 gap-6">
                @foreach($beritas as $berita)
                    <a class="group relative block rounded-xl" href="{{ route('berita.show', $berita->id) }}">
                        <div class="flex-shrink-0 relative rounded-xl overflow-hidden w-full h-[350px] before:absolute before:inset-x-0 before:z-[1] before:size-full before:bg-gradient-to-t before:from-gray-900/70">
                            <img class="size-full absolute top-0 start-0 object-cover" src="{{ $berita->foto }}" alt="{{ $berita->judul }}">
                        </div>
                        <div class="absolute top-0 inset-x-0 z-10">
                            <div class="p-4 flex flex-col h-full sm:p-6">
                                <!-- Avatar -->
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="size-[46px] border-2 border-white rounded-full" src="{{ $berita->foto }}" alt="{{ $berita->excerpt }}">
                                    </div>
                                    <div class="ms-2.5 sm:ms-4">
                                        <h4 class="font-semibold text-white">{{ $berita->excerpt }}</h4>
                                        <p class="text-xs text-white/80">{{ $berita->created_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                                <!-- End Avatar -->
                            </div>
                        </div>
                        <div class="absolute bottom-0 inset-x-0 z-10">
                            <div class="flex flex-col h-full p-4 sm:p-6">
                                <h3 class="text-lg sm:text-3xl font-semibold text-white group-hover:text-white/80">{{ $berita->title }}</h3>
                                <p class="mt-2 text-white/80">{{ $berita->excerpt }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="text-center mt-8">
            <div class="inline-block bg-white border shadow-sm rounded-full dark:bg-neutral-900 dark:border-neutral-800">
                <div class="py-3 px-4 flex items-center gap-x-2">
                    <p class="text-gray-600 dark:text-neutral-400">Want to read more?</p>
                    <a class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium dark:text-blue-500" href="{{ route('berita.index') }}">
                        Go here
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection
