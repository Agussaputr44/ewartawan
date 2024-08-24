<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-Wartawan Sign In</title>

    @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-4">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-neutral-900 dark:border-neutral-700">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">
                        Sign in
                    </h1>
                    <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                        Don't have an account yet?
                        <a href="{{ route('get-signup') }}"
                            class="text-[#0D9488] decoration-2 hover:underline font-medium dark:text-[#0D9488]">
                            Sign Up here
                        </a>
                    </p>
                </div>

                <div class="mt-5">
                    <form action="{{ route('post-signin') }}" method="POST">
                        @csrf
                        <div class="grid gap-y-4">
                            <div>
                                <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
                                <div class="relative">
                                    <input type="email" id="email" name="email"
                                        class="py-3 px-4 border block w-full border-gray-200 rounded-lg text-sm focus:border-[#0D9488] focus:ring-[#0D9488] disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        required aria-describedby="email-error" />
                                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                                        <svg class="size-5 text-red-500" width="16" height="16"
                                            fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                        </svg>
                                    </div>
                                </div>
                                <p class="hidden text-xs text-red-600 mt-2" id="email-error">
                                    Please include a valid email address so we can get back to you
                                </p>
                            </div>

                            <div>
                                <div class="flex justify-between items-center">
                                    <label for="password" class="block text-sm mb-2 dark:text-white">Password</label>
                                </div>
                                <div class="relative">
                                    <input type="password" id="password" name="password"
                                        class="py-3 border px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-[#0D9488] focus:ring-[#0D9488] disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        required aria-describedby="password-error" />
                                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                                        <svg class="size-5 text-red-500" width="16" height="16"
                                            fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                        </svg>
                                    </div>
                                </div>
                                <p class="hidden text-xs text-red-600 mt-2" id="password-error">
                                    8+ characters required
                                </p>
                            </div>

                            <div class="flex items-center">
                                <div class="flex">
                                    <input id="remember-me" name="remember-me" type="checkbox"
                                        class="shrink-0 mt-0.5 border-gray-200 rounded text-[#0D9488] focus:ring-[#0D9488] dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-[#0D9488] dark:checked:border-[#0D9488] dark:focus:ring-offset-gray-800" />
                                </div>
                                <div class="ms-3">
                                    <label for="remember-me" class="text-sm dark:text-white">Remember me</label>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-[#0D9488] text-white hover:bg-[#13AB9C] disabled:opacity-50 disabled:pointer-events-none">
                                Sign in
                            </button>
                        </div>
                    </form>
                    <!-- Tambahkan di dalam form login -->
                    @if ($errors->any())
                        <div class="text-red-500 text-sm mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</body>

</html>
