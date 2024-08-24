<header class="bg-white" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
        <div class="flex items-center lg:justify-between h-16">
            <div class="flex-shrink-0 m-64 md:mr-0 ml-4">
                <p class="text-3xl font-medium">E<span class="text-[#0D9488]">-Wartawan</span></p>
            </div>

            <!-- Tombol Hamburger untuk Mobile -->
            <button @click="isOpen = !isOpen"
                class="block md:hidden rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path x-show="!isOpen" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="isOpen" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Navigasi Utama -->
            <div class="hidden md:block">
                @if (auth()->check() && auth()->user()->role == 'user')
                    <nav aria-label="Global">
                        <ul class="flex items-center gap-6 text-sm">
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75"
                                    href="{{ route('landing') }}"> Simulasi </a>
                            </li>
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('hukum') }}">
                                    Hukum & Syarat </a>
                            </li>
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75"
                                    href="{{ route('pengumuman') }}"> Pengumuman </a>
                            </li>
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('media') }}">
                                    Data Media </a>
                            </li>
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75"
                                    href="{{ route('panduan') }}"> Panduan </a>
                            </li>
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75"
                                    href="{{ route('feedback') }}"> Testimoni </a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>

            <!-- Tombol Login/Register atau Logout -->
            <div class="flex items-center gap-4">
                <div class="sm:flex hidden sm:gap-4">
                    @auth
                        @if (auth()->user()->role == 'wartawan')
                            <a class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white shadow"
                                href="{{ route('berita.create') }}">
                                Tambah Berita
                            </a>
                            <a class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white shadow"
                                href="{{ route('wartawan.kelola') }}">
                                Kelola Berita
                            </a>
                        @elseif (auth()->user()->role == 'redaktur')
                            <a class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white shadow"
                                href="{{ route('redaktur.kelolaBerita') }}">
                                Kelola Berita
                            </a>
                            <a class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white shadow"
                                href="{{ route('redaktur.kelolaKomentar') }}">
                                Kelola Komentar
                            </a>
                        @endif
                        <div class="hidden sm:flex">
                            <a class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-600"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    @else
                        <a class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white shadow"
                            href="{{ route('get-signin') }}">
                            Login
                        </a>
                        <div class="hidden sm:flex">
                            <a class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-600"
                                href="{{ route('get-signup') }}">
                                Register
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Hamburger untuk Tampilan Mobile -->
    <div x-show="isOpen" class="md:hidden absolute top-16 left-0 w-full bg-white z-10">
        <nav aria-label="Global" class="p-4">
            <ul class="flex flex-col gap-7 text-sm">
                @if (auth()->check() && auth()->user()->role == 'user')
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('landing') }}">
                            Simulasi </a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('hukum') }}"> Hukum &
                            Syarat </a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('pengumuman') }}">
                            Pengumuman </a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('media') }}"> Data
                            Media </a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('panduan') }}">
                            Panduan </a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('feedback') }}">
                            Testimoni </a>
                    </li>
                @elseif (auth()->check() && auth()->user()->role == 'wartawan')
                    <li>
                        <a class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white shadow"
                            href="{{ route('berita.create') }}">
                            Tambah Berita
                        </a>
                    </li>
                    <li>
                        <a class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white shadow"
                            href="{{ route('wartawan.kelola') }}">
                            Kelola Berita
                        </a>
                    </li>
                    <li>
                        <a class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-600"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @elseif (auth()->check() && auth()->user()->role == 'redaktur')
                    <li>
                        <a class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white shadow"
                            href="{{ route('redaktur.kelolaBerita') }}">
                            Kelola Berita
                        </a>
                    </li>
                    <li>
                        <a class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white shadow"
                            href="{{ route('redaktur.kelolaKomentar') }}">
                            Kelola Komentar
                        </a>
                    </li>
                    <li>
                        <a class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-600"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</header>
