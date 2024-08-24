@extends('admin.partial.primary')

@section('content')
<div class="p-6 bg-white border-b border-gray-200">
    <h2 class="text-2xl font-semibold leading-tight">Kelola Berita</h2>

    <!-- Button to Open Create Modal -->
    <button onclick="openCreateModal()" class="bg-[#0D9488] text-white px-4 py-2 rounded-md">Tambah Berita</button>

    <div class="overflow-x-auto mt-6">
        <table class="min-w-full bg-white dark:bg-gray-800">
            <thead>
                <tr class="bg-[#0D9488]">
                    <th class="px-6 py-3 border-b border-gray-200">No</th>
                    <th class="px-6 py-3 border-b border-gray-200">Judul</th>
                    <th class="px-6 py-3 border-b border-gray-200">Isi</th>
                    <th class="px-6 py-3 border-b border-gray-200">Foto</th>
                    <th class="px-6 py-3 border-b border-gray-200">Kategori</th>
                    <th class="px-6 py-3 border-b border-gray-200">Status</th>
                    <th class="px-6 py-3 border-b border-gray-200">Ditulis Pada</th>
                    <th class="px-6 py-3 border-b border-gray-200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($beritas as $berita)
                <tr class="border-b border-gray-200 dark:border-gray-600 text-center">
                    <td class="px-6 py-4 border-b border-gray-200">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $berita->judul }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $berita->konten }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">
                        @if ($berita->foto)
                        <img src="{{ asset('storage/foto/' . $berita->foto) }}" alt="{{ $berita->judul }}"
                            class="w-16 h-16 object-cover rounded-md">
                        @else
                        <span class="text-gray-500">No photo</span>
                        @endif
                    </td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">
                        {{ $berita->kategori->nama_kategori }}
                    </td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $berita->status }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $berita->created_at->format('d M, Y') }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">
                        <button onclick="openEditModal({{ $berita }})" class="text-blue-600 hover:underline">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </button>
                        <button onclick="openDeleteModal({{ $berita->id }})"
                            class="text-red-600 hover:underline ml-2">
                            <i class="fas fa-trash mr-1"></i>Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block overflow-hidden transform transition-all align-middle bg-white rounded-lg shadow-xl sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start sm:justify-center">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Konfirmasi Hapus</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">Anda yakin ingin menghapus berita ini?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <form id="deleteForm" method="POST" action="" class="w-full">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Hapus
                    </button>
                </form>
                <button type="button" onclick="closeDeleteModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0D9488] sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Berita -->
<div id="createModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block overflow-hidden transform transition-all align-middle bg-white rounded-lg shadow-xl sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start sm:justify-center">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Tambah Berita</h3>
                        <div class="mt-2">
                            <form action="{{ route('kelola.berita.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mt-4">
                                    <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                                    <input type="text" name="judul" id="judul" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0D9488] focus:ring focus:ring-[#0D9488] focus:ring-opacity-50 sm:text-sm">
                                </div>

                                <div class="mt-4">
                                    <label for="konten" class="block text-sm font-medium text-gray-700">Isi</label>
                                    <textarea name="konten" id="konten" rows="4" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0D9488] focus:ring focus:ring-[#0D9488] focus:ring-opacity-50 sm:text-sm"></textarea>
                                </div>

                                <div class="mt-4">
                                    <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
                                    <input type="file" name="foto" id="foto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>

                                <div class="mt-4">
                                    <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                                    <select name="kategori_id" id="kategori" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0D9488] focus:ring focus:ring-[#0D9488] focus:ring-opacity-50 sm:text-sm">
                                        @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-4">
                                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                    <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0D9488] focus:ring focus:ring-[#0D9488] focus:ring-opacity-50 sm:text-sm">
                                        <option value="pending">Pending</option>
                                        <option value="published">Published</option>
                                    </select>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#0D9488] text-base font-medium text-white hover:bg-[#0D9488] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0D9488] sm:text-sm">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" onclick="closeCreateModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0D9488] sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Berita -->
<div id="editModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block overflow-hidden transform transition-all align-middle bg-white rounded-lg shadow-xl sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start sm:justify-center">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Edit Berita</h3>
                        <div class="mt-2">
                            <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mt-4">
                                    <label for="editJudul" class="block text-sm font-medium text-gray-700">Judul</label>
                                    <input type="text" name="judul" id="editJudul" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0D9488] focus:ring focus:ring-[#0D9488] focus:ring-opacity-50 sm:text-sm">
                                </div>

                                <div class="mt-4">
                                    <label for="editKonten" class="block text-sm font-medium text-gray-700">Isi</label>
                                    <textarea name="konten" id="editKonten" rows="4" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0D9488] focus:ring focus:ring-[#0D9488] focus:ring-opacity-50 sm:text-sm"></textarea>
                                </div>

                                <div class="mt-4">
                                    <label for="editFoto" class="block text-sm font-medium text-gray-700">Foto</label>
                                    <input type="file" name="foto" id="editFoto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>

                                <div class="mt-4">
                                    <label for="editKategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                                    <select name="kategori_id" id="editKategori" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0D9488] focus:ring focus:ring-[#0D9488] focus:ring-opacity-50 sm:text-sm">
                                        @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-4">
                                    <label for="editStatus" class="block text-sm font-medium text-gray-700">Status</label>
                                    <select name="status" id="editStatus" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0D9488] focus:ring focus:ring-[#0D9488] focus:ring-opacity-50 sm:text-sm">
                                        <option value="pending">Pending</option>
                                        <option value="published">Published</option>
                                    </select>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#0D9488] text-base font-medium text-white hover:bg-[#0D9488] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0D9488] sm:text-sm">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" onclick="closeEditModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0D9488] sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function openDeleteModal(id) {
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteForm').action = '/kelola/berita/delete/' + id;
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    function openCreateModal() {
        document.getElementById('createModal').classList.remove('hidden');
    }

    function closeCreateModal() {
        document.getElementById('createModal').classList.add('hidden');
    }

    function openEditModal(berita) {
        document.getElementById('editForm').action = `/admin/kelola/berita/${berita.id}/edit`;
        document.getElementById('editJudul').value = berita.judul;
        document.getElementById('editKonten').value = berita.konten;
        document.getElementById('editKategori').value = berita.kategori_id;
        document.getElementById('editStatus').value = berita.status;
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>
@endsection
