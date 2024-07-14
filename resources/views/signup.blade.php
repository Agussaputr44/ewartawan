<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Wartawan Sign Up</title>
    @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-4">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-neutral-900 dark:border-neutral-700">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign Up</h1>
                    <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                        Have an account yet?
                        <a class="text-[#0D9488] decoration-2 hover:underline font-medium dark:text-[#0D9488]"
                            href="../examples/html/signup.html">Sign in here</a>
                    </p>
                </div>

                <div class="mt-5">
                    <form action="{{ route('post-signup') }}" method="POST">
                        @csrf
                        <div class="grid gap-y-4">
                            <div>
                                <label for="nama" class="block text-sm mb-2 dark:text-white">Nama</label>
                                <div class="relative">
                                    <input type="text" id="nama" name="nama"
                                        class="py-3 px-4 border block w-full border-gray-200 rounded-lg text-sm focus:border-[#0D9488] focus:ring-[#0D9488] disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        required />
                                </div>
                            </div>
                            <div>
                                <label for="email" class="block text-sm mb-2 dark:text-white">Email</label>
                                <div class="relative">
                                    <input type="email" id="email" name="email"
                                        class="py-3 px-4 border block w-full border-gray-200 rounded-lg text-sm focus:border-[#0D9488] focus:ring-[#0D9488] disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        required />
                                </div>
                            </div>
                            <div>
                                <label for="nomor_telepon" class="block text-sm mb-2 dark:text-white">Nomor
                                    Telepon</label>
                                <div class="relative">
                                    <input type="text" id="nomor_telepon" name="nomor_telepon"
                                        class="py-3 px-4 border block w-full border-gray-200 rounded-lg text-sm focus:border-[#0D9488] focus:ring-[#0D9488] disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        required />
                                </div>
                            </div>
                            <div>
                                <label for="gender" class="block text-sm mb-2 dark:text-white">Gender</label>
                                <div class="relative">
                                    <select id="gender" name="gender"
                                        class="py-3 px-4 border block w-full border-gray-200 rounded-lg text-sm focus:border-[#0D9488] focus:ring-[#0D9488] disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        required>
                                        <option value="pria">Pria</option>
                                        <option value="wanita">Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="password" class="block text-sm mb-2 dark:text-white">Password</label>
                                <div class="relative">
                                    <input type="password" id="password" name="password"
                                        class="py-3 px-4 border block w-full border-gray-200 rounded-lg text-sm focus:border-[#0D9488] focus:ring-[#0D9488] disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        required />
                                </div>
                            </div>
                            <button type="submit"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-[#0D9488] text-white hover:bg-[#13AB9C] disabled:opacity-50 disabled:pointer-events-none">Sign
                                Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
