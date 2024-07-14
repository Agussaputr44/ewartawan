@extends('layout.primary')
@section('content')
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

        <div class="max-w-2xl text-center mx-auto mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight ">Read our latest news</h2>
            <p class="mt-1 text-gray-600 dark:text-neutral-400">We've helped some great companies brand, design and
                get to market.</p>
        </div>
        <div class="max-w-[85rem] px-4 py-8 sm:px-6 lg:px-8 lg:py-18 mx-auto">
            <!-- Grid -->
            <div class="grid lg:grid-cols-2 gap-6">

                <a class="group relative block rounded-xl" href="#">
                    <div
                        class="flex-shrink-0 relative rounded-xl overflow-hidden w-full h-[350px] before:absolute before:inset-x-0 before:z-[1] before:size-full before:bg-gradient-to-t before:from-gray-900/70">
                        <img class="size-full absolute top-0 start-0 object-cover"
                            src="https://images.unsplash.com/photo-1669828230990-9b8583a877ab?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1062&q=80"
                            alt="Image Description">
                    </div>

                    <div class="absolute top-0 inset-x-0 z-10">
                        <div class="p-4 flex flex-col h-full sm:p-6">
                            <!-- Avatar -->
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="size-[46px] border-2 border-white rounded-full"
                                        src="https://images.unsplash.com/photo-1669837401587-f9a4cfe3126e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                        alt="Image Description">
                                </div>
                                <div class="ms-2.5 sm:ms-4">
                                    <h4 class="font-semibold text-white">
                                        Gloria
                                    </h4>
                                    <p class="text-xs text-white/80">
                                        Jan 09, 2021
                                    </p>
                                </div>
                            </div>
                            <!-- End Avatar -->
                        </div>
                    </div>

                    <div class="absolute bottom-0 inset-x-0 z-10">
                        <div class="flex flex-col h-full p-4 sm:p-6">
                            <h3 class="text-lg sm:text-3xl font-semibold text-white group-hover:text-white/80">
                                Facebook is creating a news section in Watch to feature breaking news
                            </h3>
                            <p class="mt-2 text-white/80">
                                Facebook launched the Watch platform in August
                            </p>
                        </div>
                    </div>
                </a>



                <a class="group relative block rounded-xl" href="#">
                    <div
                        class="flex-shrink-0 relative rounded-xl overflow-hidden w-full h-[350px] before:absolute before:inset-x-0 before:z-[1] before:size-full before:bg-gradient-to-t before:from-gray-900/70">
                        <img class="size-full absolute top-0 start-0 object-cover"
                            src="https://images.unsplash.com/photo-1611625618313-68b87aaa0626?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1064&q=80"
                            alt="Image Description">
                    </div>

                    <div class="absolute top-0 inset-x-0 z-10">
                        <div class="p-4 flex flex-col h-full sm:p-6">
                            <!-- Avatar -->
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="size-[46px] border-2 border-white rounded-full"
                                        src="https://images.unsplash.com/photo-1669837401587-f9a4cfe3126e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                        alt="Image Description">
                                </div>
                                <div class="ms-2.5 sm:ms-4">
                                    <h4 class="font-semibold text-white">
                                        Gloria
                                    </h4>
                                    <p class="text-xs text-white/80">
                                        May 30, 2021
                                    </p>
                                </div>
                            </div>
                            <!-- End Avatar -->
                        </div>
                    </div>

                    <div class="absolute bottom-0 inset-x-0 z-10">
                        <div class="flex flex-col h-full p-4 sm:p-6">
                            <h3 class="text-lg sm:text-3xl font-semibold text-white group-hover:text-white/80">
                                What CFR (Conversations, Feedback, Recognition) really is about
                            </h3>
                            <p class="mt-2 text-white/80">
                                For a lot of people these days, Measure What Matters.
                            </p>
                        </div>
                    </div>
                </a>

            </div>

        </div>
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-18 mx-auto">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10 lg:mb-14">
                <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-neutral-900 dark:border-neutral-800"
                    href="#">
                    <div class="aspect-w-16 aspect-h-9">
                        <img class="w-full object-cover rounded-t-xl"
                            src="https://images.unsplash.com/photo-1668869713519-9bcbb0da7171?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=988&q=80"
                            alt="Image Description">
                    </div>
                    <div class="p-4 md:p-5">
                        <p class="mt-2 text-xs uppercase text-gray-600 dark:text-neutral-400">
                            Product
                        </p>
                        <h3
                            class="mt-2 text-lg font-medium text-gray-800 dark:text-neutral-300 dark:group-hover:text-white">
                            Better is when everything works together
                        </h3>
                    </div>
                </a>


                <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-neutral-900 dark:border-neutral-800"
                    href="#">
                    <div class="aspect-w-16 aspect-h-9">
                        <img class="w-full object-cover rounded-t-xl"
                            src="https://images.unsplash.com/photo-1668584054035-f5ba7d426401?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3465&q=80"
                            alt="Image Description">
                    </div>
                    <div class="p-4 md:p-5">
                        <p class="mt-2 text-xs uppercase text-gray-600 dark:text-neutral-400">
                            Business
                        </p>
                        <h3
                            class="mt-2 text-lg font-medium text-gray-800 dark:text-neutral-300 dark:group-hover:text-white">
                            What CFR really is about
                        </h3>
                    </div>
                </a>

                <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-neutral-900 dark:border-neutral-800"
                    href="#">
                    <div class="aspect-w-16 aspect-h-9">
                        <img class="w-full object-cover rounded-t-xl"
                            src="https://images.unsplash.com/photo-1668863699009-1e3b4118675d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3387&q=80"
                            alt="Image Description">
                    </div>
                    <div class="p-4 md:p-5">
                        <p class="mt-2 text-xs uppercase text-gray-600 dark:text-neutral-400">
                            Business
                        </p>
                        <h3
                            class="mt-2 text-lg font-medium text-gray-800 dark:text-neutral-300 dark:group-hover:text-white">
                            Should Product Owners think like entrepreneurs?
                        </h3>
                    </div>
                </a>

                <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-neutral-900 dark:border-neutral-800"
                    href="#">
                    <div class="aspect-w-16 aspect-h-9">
                        <img class="w-full object-cover rounded-t-xl"
                            src="https://images.unsplash.com/photo-1668584054131-d5721c515211?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1064&q=80"
                            alt="Image Description">
                    </div>
                    <div class="p-4 md:p-5">
                        <p class="mt-2 text-xs uppercase text-gray-600 dark:text-neutral-400">
                            Facilitate
                        </p>
                        <h3
                            class="mt-2 text-lg font-medium text-gray-800 dark:text-neutral-300 dark:group-hover:text-white">
                            Announcing Front Strategies: Ready-to-use rules
                        </h3>
                    </div>
                </a>
            </div>


        </div>
        <div class="max-w-[85rem] px-4 py-8 sm:px-6 lg:px-8 lg:py-18 mx-auto">
            <!-- Grid -->
            <div class="grid lg:grid-cols-2 gap-6">

                <a class="group relative block rounded-xl" href="#">
                    <div
                        class="flex-shrink-0 relative rounded-xl overflow-hidden w-full h-[350px] before:absolute before:inset-x-0 before:z-[1] before:size-full before:bg-gradient-to-t before:from-gray-900/70">
                        <img class="size-full absolute top-0 start-0 object-cover"
                            src="https://images.unsplash.com/photo-1669828230990-9b8583a877ab?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1062&q=80"
                            alt="Image Description">
                    </div>

                    <div class="absolute top-0 inset-x-0 z-10">
                        <div class="p-4 flex flex-col h-full sm:p-6">
                            <!-- Avatar -->
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="size-[46px] border-2 border-white rounded-full"
                                        src="https://images.unsplash.com/photo-1669837401587-f9a4cfe3126e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                        alt="Image Description">
                                </div>
                                <div class="ms-2.5 sm:ms-4">
                                    <h4 class="font-semibold text-white">
                                        Gloria
                                    </h4>
                                    <p class="text-xs text-white/80">
                                        Jan 09, 2021
                                    </p>
                                </div>
                            </div>
                            <!-- End Avatar -->
                        </div>
                    </div>

                    <div class="absolute bottom-0 inset-x-0 z-10">
                        <div class="flex flex-col h-full p-4 sm:p-6">
                            <h3 class="text-lg sm:text-3xl font-semibold text-white group-hover:text-white/80">
                                Facebook is creating a news section in Watch to feature breaking news
                            </h3>
                            <p class="mt-2 text-white/80">
                                Facebook launched the Watch platform in August
                            </p>
                        </div>
                    </div>
                </a>



                <a class="group relative block rounded-xl" href="#">
                    <div
                        class="flex-shrink-0 relative rounded-xl overflow-hidden w-full h-[350px] before:absolute before:inset-x-0 before:z-[1] before:size-full before:bg-gradient-to-t before:from-gray-900/70">
                        <img class="size-full absolute top-0 start-0 object-cover"
                            src="https://images.unsplash.com/photo-1611625618313-68b87aaa0626?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1064&q=80"
                            alt="Image Description">
                    </div>

                    <div class="absolute top-0 inset-x-0 z-10">
                        <div class="p-4 flex flex-col h-full sm:p-6">
                            <!-- Avatar -->
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="size-[46px] border-2 border-white rounded-full"
                                        src="https://images.unsplash.com/photo-1669837401587-f9a4cfe3126e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                        alt="Image Description">
                                </div>
                                <div class="ms-2.5 sm:ms-4">
                                    <h4 class="font-semibold text-white">
                                        Gloria
                                    </h4>
                                    <p class="text-xs text-white/80">
                                        May 30, 2021
                                    </p>
                                </div>
                            </div>
                            <!-- End Avatar -->
                        </div>
                    </div>

                    <div class="absolute bottom-0 inset-x-0 z-10">
                        <div class="flex flex-col h-full p-4 sm:p-6">
                            <h3 class="text-lg sm:text-3xl font-semibold text-white group-hover:text-white/80">
                                What CFR (Conversations, Feedback, Recognition) really is about
                            </h3>
                            <p class="mt-2 text-white/80">
                                For a lot of people these days, Measure What Matters.
                            </p>
                        </div>
                    </div>
                </a>

            </div>
            <div class="text-center mt-8">
                <div
                    class="inline-block bg-white border shadow-sm rounded-full dark:bg-neutral-900 dark:border-neutral-800">
                    <div class="py-3 px-4 flex items-center gap-x-2">
                        <p class="text-gray-600 dark:text-neutral-400">
                            Want to read more?
                        </p>
                        <a class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium dark:text-blue-500"
                            href="../docs/index.html">
                            Go here
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    @endsection
