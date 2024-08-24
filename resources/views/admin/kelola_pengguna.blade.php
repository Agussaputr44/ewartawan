@extends('admin.partial.primary')

@section('content')
<div class="p-6 bg-white border-b border-gray-200">
    <h2 class="text-2xl font-semibold leading-tight">Kelola User</h2>

    <button onclick="openModal()" class="bg-[#0D9488] text-white px-4 py-2 rounded-md">Tambah User</button>

    @foreach ($usersByRole as $role => $users)
    <div class="mt-6">
        <h3 class="text-xl font-semibold leading-tight">{{ ucfirst($role) }}</h3>

        @php
            $bgClass = '';
            switch ($role) {
                case 'admin':
                    $bgClass = 'bg-pastel-blue';
                    break;
                case 'editor':
                    $bgClass = 'bg-pastel-pink';
                    break;
                case 'wartawan':
                    $bgClass = 'bg-pastel-yellow';
                    break;
                case 'user':
                    $bgClass = 'bg-pastel-green'; // tambah kelas bg-pastel-green jika ada
                    break;
                default:
                    $bgClass = 'bg-white';
                    break;
            }
        @endphp

        <table class="min-w-full mt-2 bg-white rounded-lg shadow {{ $bgClass }}">
            <thead>
                <tr class="{{ $bgClass }}">
                    <th class="px-6 py-3 border-b border-gray-200">No</th>
                    <th class="px-6 py-3 border-b border-gray-200">Nama</th>
                    <th class="px-6 py-3 border-b border-gray-200">Email</th>
                    <th class="px-6 py-3 border-b border-gray-200">Media</th>
                    <th class="px-6 py-3 border-b border-gray-200">Role</th>
                    <th class="px-6 py-3 border-b border-gray-200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $pengguna)
                <tr class="{{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-white' }} text-center">
                    <td class="px-6 py-4 border-b border-gray-200">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ $pengguna->nama }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ $pengguna->email }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ $pengguna->media }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ ucfirst($pengguna->role) }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">
                        <button onclick="openEditModal({{ $pengguna }})" class="text-blue-600 hover:text-indigo-900">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button onclick="openDeleteModal({{ $pengguna->id }})" class="text-red-600 hover:text-red-900 ml-2">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endforeach

    <!-- Modal Tambah User -->
    <div id="userModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block overflow-hidden transform transition-all align-middle bg-white rounded-lg shadow-xl sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start sm:justify-center">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Tambah User</h3>
                            <div class="mt-2">
                                <form id="userForm" method="POST" action="{{ route('kelola.user.store') }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="POST" id="formMethod">
                                    <div class="grid gap-y-4 justify-items-center">
                                        <div class="w-full">
                                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                                            <input type="text" name="nama" id="nama" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                                        </div>
                                        <div class="w-full">
                                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                            <input type="email" name="email" id="email" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                                        </div>
                                        <div class="w-full">
                                            <label for="nomor_telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                                            <input type="text" name="nomor_telepon" id="nomor_telepon" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                                        </div>
                                        <div class="w-full">
                                            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                            <select name="gender" id="gender" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                                                <option value="pria">Pria</option>
                                                <option value="wanita">Wanita</option>
                                            </select>
                                        </div>
                                        <div class="w-full">
                                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                            <input type="password" name="password" id="password" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div class="w-full">
                                            <label for="media" class="block text-sm font-medium text-gray-700">Media</label>
                                            <input type="text" name="media" id="media" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div class="w-full">
                                            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                                            <select name="role" id="role" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                                                <option value="admin">Admin</option>
                                                <option value="redaktur">Redaktur</option>
                                                <option value="wartawan">Wartawan</option>
                                                <option value="user">User</option>
                                            </select>
                                        </div>
                                        <div class="flex items-center justify-end w-full">
                                            <button type="submit" class="px-4 py-2 bg-[#0D9488] text-white rounded-md">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" onclick="closeModal()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus User -->
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
                                <p>Apakah Anda yakin ingin menghapus pengguna ini?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <form id="deleteForm" method="POST" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Hapus</button>
                    </form>
                    <button type="button" onclick="closeDeleteModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:w-auto sm:text-sm">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit User -->
    <div id="editUserModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block overflow-hidden transform transition-all align-middle bg-white rounded-lg shadow-xl sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start sm:justify-center">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Edit User</h3>
                            <div class="mt-2">
                                <form id="editUserForm" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="userId" id="editUserId">
                                    <div class="grid gap-y-4 justify-items-center">
                                        <div class="w-full">
                                            <label for="editNama" class="block text-sm font-medium text-gray-700">Nama</label>
                                            <input type="text" name="nama" id="editNama" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                                        </div>
                                        <div class="w-full">
                                            <label for="editEmail" class="block text-sm font-medium text-gray-700">Email</label>
                                            <input type="email" name="email" id="editEmail" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                                        </div>
                                        <div class="w-full">
                                            <label for="editNomorTelepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                                            <input type="text" name="nomor_telepon" id="editNomorTelepon" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                                        </div>
                                        <div class="w-full">
                                            <label for="editGender" class="block text-sm font-medium text-gray-700">Gender</label>
                                            <select name="gender" id="editGender" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                                                <option value="pria">Pria</option>
                                                <option value="wanita">Wanita</option>
                                            </select>
                                        </div>
                                        <div class="w-full">
                                            <label for="editMedia" class="block text-sm font-medium text-gray-700">Media</label>
                                            <input type="text" name="media" id="editMedia" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div class="w-full">
                                            <label for="editRole" class="block text-sm font-medium text-gray-700">Role</label>
                                            <select name="role" id="editRole" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                                                <option value="admin">Admin</option>
                                                <option value="redaktur">Redaktur</option>
                                                <option value="wartawan">Wartawan</option>
                                                <option value="user">User</option>
                                            </select>
                                        </div>
                                        <div class="flex items-center justify-end w-full">
                                            {{-- <button type="button" onclick="closeEditModal()" class="mr-4 px-4 py-2 bg-gray-200 text-gray-700 rounded-md">Batal</button> --}}
                                            <button type="submit" class="px-4 py-2 bg-[#0D9488] text-white rounded-md">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" onclick="closeEditModal()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('userModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('userModal').classList.add('hidden');
        }

        function openDeleteModal(userId) {
            document.getElementById('deleteForm').action = `/admin/kelola/user/${userId}`;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        function openEditModal(user) {
            document.getElementById('editUserId').value = user.id;
            document.getElementById('editNama').value = user.nama;
            document.getElementById('editEmail').value = user.email;
            document.getElementById('editNomorTelepon').value = user.nomor_telepon;
            document.getElementById('editGender').value = user.gender;
            document.getElementById('editMedia').value = user.media;
            document.getElementById('editRole').value = user.role;
            document.getElementById('editUserForm').action = `/admin/kelola/user/${user.id}/edit`;
            document.getElementById('editUserModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editUserModal').classList.add('hidden');
        }
    </script>
@endsection
