@extends('layout.primary')

@section('content')
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-black">Data Media</h1>
        <p class="mt-2 text-lg text-gray-600">Yang Bekerja sama dengan Dinas Kominfo tahun anggaran 2023</p>
    </div>

    <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
        <div class="flex items-center space-x-2 mb-4 sm:mb-0">
            {{-- Placeholder for additional controls if needed --}}
        </div>
        <div class="w-full sm:w-auto ml-7">
            <input type="search" placeholder="search" class="border border-gray-300 rounded p-2 w-64">
        </div>
    </div>

    <div class="overflow-x-auto px-4 sm:px-0">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="w-full bg-gray-100 text-gray-600">
                    <th class="px-6 py-3 border-b border-gray-300 text-left text-sm leading-4 font-medium">NO</th>
                    <th class="px-6 py-3 border-b border-gray-300 text-left text-sm leading-4 font-medium">Nama Wartawan</th>
                    <th class="px-6 py-3 border-b border-gray-300 text-left text-sm leading-4 font-medium">Nama Media</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wartawan as $index => $journalist)
                    <tr>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $journalist->nama }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $journalist->media }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex flex-col sm:flex-row justify-between items-center mt-4">
        <div class="text-gray-600 mb-4 sm:mb-0">
            {{-- Showing {{ $journalists->firstItem() }} to {{ $journalists->lastItem() }} of {{ $journalists->total() }} entries --}}
        </div>
        <div class="flex items-center space-x-2">
            {{-- {{ $journalists->links('pagination::tailwind') }} --}}
        </div>
    </div>
</div>
@endsection
