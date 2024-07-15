<header class="bg-white">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="md:flex md:items-center md:gap-12">
                <p class="text-3xl font-medium">E<span class="text-[#0D9488]">-Wartawan</span></p>
            </div>

            <div class="hidden md:block">
                @if (auth()->check() && auth()->user()->role == 'user')
                    <nav aria-label="Global">
                        <ul class="flex items-center gap-6 text-sm">
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> About </a>
                            </li>
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Careers </a>
                            </li>
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> History </a>
                            </li>
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Services </a>
                            </li>
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Projects </a>
                            </li>
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Blog </a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <div class="sm:flex sm:gap-4">
                    @if (auth()->check())
                        @if (auth()->user()->role == 'user')
                            <a class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white shadow"
                                href="#">
                                Ajukan Sebagai Wartawan
                            </a>
                        @elseif(auth()->user()->role == 'wartawan')
                            <a class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white shadow"
                                href="{{ route('berita.create') }}">
                                Tambah Berita
                            </a>
                            <a class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white shadow"
                                href="{{ route('wartawan.kelola') }}">
                                Kelola Berita
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
                    @endif
                </div>

                <div class="block md:hidden">
                    <button class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
<hr>
