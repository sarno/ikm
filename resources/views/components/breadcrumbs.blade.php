<!-- Breadcrumb -->
<nav
    class="lg:mt-24 mb-4 mt-20 flex rounded-lg border border-indigo-200 bg-gray-50 px-5 py-3 text-gray-700 shadow-sm shadow-black md:mt-32"
    aria-label="Breadcrumb"
>
    <ol
        class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse"
    >
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb["url"])
                <li class="inline-flex items-center">
                    @if ($breadcrumb["url"] == "dashboard")
                        <a
                            href="{{ url($breadcrumb["url"]) }}"
                            class="dark:text-gray-900 dark:hover:text-black inline-flex items-center text-sm font-medium text-gray-700 hover:text-black"
                        >
                            <svg
                                class="me-2.5 h-3 w-3"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"
                                />
                            </svg>
                        </a>
                    @else
                        <svg
                            class="mx-1 block h-3 w-3 text-indigo-500 rtl:rotate-180"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 6 10"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m1 9 4-4-4-4"
                            />
                        </svg>
                        <a
                            href="{{ url($breadcrumb["url"]) }}"
                            class="dark:text-gray-900 dark:hover:text-black ms-1 text-sm font-medium text-gray-700 hover:text-black md:ms-2"
                        >
                            {{ $breadcrumb["text"] }}
                        </a>
                    @endif
                </li>
            @else
                <li>
                    <div class="flex items-center">
                        <svg
                            class="mx-1 block h-3 w-3 text-indigo-500 rtl:rotate-180"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 6 10"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m1 9 4-4-4-4"
                            />
                        </svg>
                        <a
                            href="#"
                            class="dark:text-gray-900 dark:hover:text-black ms-1 text-sm font-medium text-gray-700 hover:text-black md:ms-2"
                        >
                            {{ $breadcrumb["text"] }}
                        </a>
                    </div>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
