@extends('layout.primary')

@section('content')
    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <a href="{{ route('redaktur.index') }}"
            class="py-2 my-2 mx-auto px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-300 bg-gray-100 text-gray-700 hover:bg-gray-200 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700">
            Kembali
        </a>

        <div class="p-6 bg-white border-b border-gray-200">
            <h2 class="text-2xl font-semibold leading-tight">Kelola Komentar</h2>

            <table class="min-w-full mt-6 bg-white rounded-lg shadow">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200">No</th>
                        <th class="px-6 py-3 border-b border-gray-200">User</th>
                        <th class="px-6 py-3 border-b border-gray-200">Isi Komentar</th>
                        <th class="px-6 py-3 border-b border-gray-200">Status</th>
                        <th class="px-6 py-3 border-b border-gray-200">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($komentars as $index => $komentar)
                        <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-100' }} text-center">
                            <td class="px-6 py-4 border-b border-gray-200">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 border-b border-gray-200">{{ $komentar->user->nama }}</td>
                            <td class="px-6 py-4 border-b border-gray-200">{{ $komentar->isi_komentar }}</td>
                            <td class="px-6 py-4 border-b border-gray-200">{{ ucfirst($komentar->status_komentar) }}</td>
                            <td class="px-6 py-4 border-b border-gray-200">
                                <button
                                    onclick="openEditModal({{ $komentar->id_komentar }}, '{{ $komentar->status_komentar }}')"
                                    class="text-blue-600 hover:text-blue-900">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button onclick="openDeleteModal({{ $komentar->id_komentar }})"
                                    class="text-red-600 hover:text-red-900 ml-2">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{-- {{ $komentars->links() }} --}}
            </div>
        </div>

        <!-- Modal Konfirmasi Hapus -->
        <div id="deleteModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block overflow-hidden transform transition-all align-middle bg-white rounded-lg shadow-xl sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start sm:justify-center">
                            <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Konfirmasi Hapus</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">Anda yakin ingin menghapus komentar ini?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <form id="deleteForm" method="POST" action="" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                Hapus
                            </button>
                        </form>
                        <button type="button" onclick="closeDeleteModal()"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Komentar -->
        <div id="editModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block overflow-hidden transform transition-all align-middle bg-white rounded-lg shadow-xl sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start sm:justify-center">
                            <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Edit Status Komentar</h3>
                                <div class="mt-2">
                                    <form id="editForm" action="" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mt-4">
                                            <label for="editStatus"
                                                class="block text-sm font-medium text-gray-700">Status</label>
                                            <select name="status_komentar" id="editStatus"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0D9488] focus:ring focus:ring-[#0D9488] focus:ring-opacity-50 sm:text-sm">
                                                <option value="pending">Pending</option>
                                                <option value="accepted">Accepted</option>
                                            </select>
                                        </div>

                                        <div class="mt-4">
                                            <button type="submit"
                                                class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#0D9488] text-base font-medium text-white hover:bg-[#0D9488] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0D9488] sm:text-sm">
                                                Simpan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" onclick="closeEditModal()"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0D9488] sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(id) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteForm').action = '/redaktur/komentar/delete/' + id;
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        function openEditModal(id, status) {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editForm').action = '/redaktur/komentar/update/' + id;
            document.getElementById('editStatus').value = status;
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>
@endsection
