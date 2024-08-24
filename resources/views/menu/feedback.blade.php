@extends('layout.primary')

@section('content')
    <!-- Comment Form -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="mx-auto max-w-2xl">
            <div class="text-center">
                <h2 class="text-xl text-gray-800 font-bold sm:text-3xl dark:text-white">
                    Berikan Kritik Dan Saran Anda
                </h2>
            </div>

            <!-- Card -->
            <div class="mt-5 p-4 relative z-10 bg-white border rounded-xl sm:mt-10 md:p-10 dark:bg-neutral-900 dark:border-neutral-700">
                <form method="POST" action="{{ route('komentar.store') }}">
                    @csrf
                    <div>
                        <label for="isi_komentar" class="block mb-2 text-sm font-medium dark:text-white">Kritik & Saran</label>
                        <div class="mt-1">
                            <textarea id="isi_komentar" name="isi_komentar" rows="3" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Masukkan Kritik Dan Saran..."></textarea>
                        </div>
                    </div>

                    <div class="mt-6 grid">
                        <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">Submit</button>
                    </div>
                </form>
            </div>
            <!-- End Card -->

            <!-- Display Accepted Comments -->
            <div class="mt-10">
                <h3 class="text-lg text-gray-800 font-bold dark:text-white">Komentar yang Sudah Diterima</h3>
                @foreach($komentars as $comment)
                    <div class="mt-4 p-4 bg-white rounded-xl dark:bg-neutral-900 dark:border-neutral-700">
                        <div class="mb-2">
                            <strong class="text-sm font-medium dark:text-white">{{ $comment->user->nama }}</strong>
                            <span class="text-xs text-gray-500 dark:text-gray-400">{{ $comment->created_at->format('d M Y, H:i') }}</span>
                        </div>
                        <p class="text-sm dark:text-neutral-400">{{ $comment->isi_komentar }}</p>
                    </div>
                @endforeach
            </div>
            <!-- End Display Accepted Comments -->
        </div>
    </div>
    <!-- End Comment Form -->
@endsection
