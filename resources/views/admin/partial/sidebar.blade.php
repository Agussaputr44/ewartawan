<!-- resources/views/admin/partial/sidebar.blade.php -->
<div class="flex h-screen flex-col justify-between border-e bg-gray-50 w-64">
    <div class="px-4 py-6">
        <div class="flex-shrink-0 md:mr-0 ml-4">
            <p class="text-2xl font-medium">E<span class="text-[#0D9488]">-Wartawan</span></p>
        </div>

        <ul class="mt-6 space-y-1">
            <li>
                <a href="{{ route('admin') }}"
                    class="block rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
            </li>
            <li>
                <details class="group [&_summary::-webkit-details-marker]:hidden">
                    <summary
                        class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                        <span class="text-sm font-medium"><i class="fas fa-cogs mr-2"></i> Kelola</span>
                        <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </summary>
                    <ul class="mt-2 space-y-1 px-4">
                        <li><a href="{{ route('kelola.user') }}"
                                class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                                <i class="fas fa-users mr-2"></i> Kelola User
                            </a></li>
                        <li><a href="{{ route('kelola.berita') }}"
                                class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                                <i class="fas fa-newspaper mr-2"></i> Kelola Berita
                            </a></li>
                        <li><a href="{{ route('kelola.komentar') }}"
                                class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                                <i class="fas fa-comments mr-2"></i> Kelola Komentar
                            </a></li>
                    </ul>
                </details>
            </li>
        </ul>
    </div>
    <div class="sticky inset-x-0 bottom-0 border-t border-gray-100">
        <div class="flex flex-col items-center p-4">
            <div class="flex items-center gap-2 bg-[#0D9488] p-4 text-white w-full justify-center">
                <div>
                    <p class="text-xs text-center">
                        <strong class="block font-medium">{{ $user->nama }}</strong>
                        <span>{{ $user->email }}</span>
                    </p>
                </div>
            </div>
            <button onclick="openLogoutModal()" class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-600 w-full mt-4">
                Logout
            </button>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Logout -->
<div id="logoutModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block overflow-hidden transform transition-all align-middle bg-white rounded-lg shadow-xl sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start sm:justify-center">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Konfirmasi Logout</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">Anda yakin ingin logout?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Logout
                    </button>
                </form>
                <button type="button" onclick="closeLogoutModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function openLogoutModal() {
        document.getElementById('logoutModal').classList.remove('hidden');
    }
    
    function closeLogoutModal() {
        document.getElementById('logoutModal').classList.add('hidden');
    }
    </script>
    