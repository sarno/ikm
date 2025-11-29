<button
    data-drawer-target="sidebar-multi-level-sidebar"
    data-drawer-toggle="sidebar-multi-level-sidebar"
    aria-controls="sidebar-multi-level-sidebar"
    type="button"
    class="ms-3 mt-2 inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 sm:hidden"
>
    <span class="sr-only">Open sidebar</span>
    <svg
        class="h-6 w-6"
        aria-hidden="true"
        fill="currentColor"
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
    >
        <path
            clip-rule="evenodd"
            fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
        ></path>
    </svg>
</button>

<aside
    id="sidebar-multi-level-sidebar"
    class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full transition-transform lg:translate-x-0"
    aria-label="Sidebar"
>
    <div
        class="dark:bg-indigo-200 h-full overflow-y-auto bg-indigo-200 px-3 py-4"
    >
        <a
            href="/"
            class="mb-4 flex items-center space-x-3 rtl:space-x-reverse"
        >
            <span
                class="self-center whitespace-nowrap py-1 text-2xl font-semibold"
            >
                IKM
            </span>
        </a>
        <ul
            class="dark:border-gray-200 mt-4 space-y-2 border-t border-gray-200 pb-2 pt-1 font-medium"
        >
            <li
                class="{{ request()->routeIs("dashboard") ? "rounded-lg bg-white" : "" }} mt-2"
            >
                <a
                    href="{{ url("/dashboard") }}"
                    class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100"
                >
                    <svg
                        class="h-7 w-7 flex-shrink-0 text-gray-900 transition duration-75"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z"
                        />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li
                class="{{ request()->routeIs("profile.show") ? "rounded-lg bg-indigo-300" : "" }} lg:hidden"
            >
                <button
                    type="button"
                    class="group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-100"
                    aria-controls="dropdown-example-profile"
                    data-collapse-toggle="dropdown-example-profile"
                >
                    <svg
                        class="h-7 w-7 flex-shrink-0 text-gray-900 transition duration-75"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="square"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.1 1.9-.7-.7m5.6 5.6-.7-.7m-4.2 0-.7.7m5.6-5.6-.7.7M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                        />
                    </svg>
                    <span
                        class="ms-3 flex-1 whitespace-nowrap text-left rtl:text-right"
                    >
                        Profile
                    </span>
                    <svg
                        class="h-3 w-3"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 10 6"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m1 1 4 4 4-4"
                        />
                    </svg>
                </button>
                <ul
                    id="dropdown-example-profile"
                    class="{{ request()->routeIs("profile.show") ? "block " : "hidden" }} space-y-2 px-1 py-2"
                >
                    <li class="">
                        <a
                            href="#"
                            class="{{ request()->routeIs("profile.show") ? "rounded-lg bg-white" : "" }} group flex items-center rounded-lg p-2 pl-5 text-gray-900 hover:bg-gray-100"
                        >
                            <svg
                                class="h-5 w-5 flex-shrink-0 text-gray-900 transition duration-75"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 20 22"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.306-.613-.933-1-1.618-1H7.618c-.685 0-1.312.387-1.618 1M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"
                                />
                            </svg>

                            <span class="ms-3 flex-1 whitespace-nowrap">
                                My Profile
                            </span>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="#" x-data>
                            @csrf
                            <button
                                @click.prevent="$root.submit();"
                                class="{{ request()->routeIs("dashboardCreateUsers") ? "rounded-lg bg-white" : "" }} group flex w-full items-center rounded-lg p-2 pl-5 text-left text-gray-900 hover:bg-gray-100"
                            >
                                <svg
                                    class="h-5 w-5 flex-shrink-0 text-gray-900 transition duration-75"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 20 22"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 4v10m0 0a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m0 0v2m6-16v2m0 0a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m0 0v10m6-16v10m0 0a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m0 0v2"
                                    />
                                </svg>

                                <span class="ms-3 flex-1 whitespace-nowrap">
                                    Logout
                                </span>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
            <li class="">
                <a
                    href="#"
                    class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100"
                >
                    <svg
                        class="h-6 w-6 flex-shrink-0 text-gray-900 transition duration-75"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 12c.263 0 .524-.06.767-.175a2 2 0 0 0 .65-.491c.186-.21.333-.46.433-.734.1-.274.15-.568.15-.864a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 12 9.736a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 16 9.736c0 .295.052.588.152.861s.248.521.434.73a2 2 0 0 0 .649.488 1.809 1.809 0 0 0 1.53 0 2.03 2.03 0 0 0 .65-.488c.185-.209.332-.457.433-.73.1-.273.152-.566.152-.861 0-.974-1.108-3.85-1.618-5.121A.983.983 0 0 0 17.466 4H6.456a.986.986 0 0 0-.93.645C5.045 5.962 4 8.905 4 9.736c.023.59.241 1.148.611 1.567.37.418.865.667 1.389.697Zm0 0c.328 0 .651-.091.94-.266A2.1 2.1 0 0 0 7.66 11h.681a2.1 2.1 0 0 0 .718.734c.29.175.613.266.942.266.328 0 .651-.091.94-.266.29-.174.537-.427.719-.734h.681a2.1 2.1 0 0 0 .719.734c.289.175.612.266.94.266.329 0 .652-.091.942-.266.29-.174.536-.427.718-.734h.681c.183.307.43.56.719.734.29.174.613.266.941.266a1.819 1.819 0 0 0 1.06-.351M6 12a1.766 1.766 0 0 1-1.163-.476M5 12v7a1 1 0 0 0 1 1h2v-5h3v5h7a1 1 0 0 0 1-1v-7m-5 3v2h2v-2h-2Z"
                        />
                    </svg>

                    <span class="ms-3">Mulai Survey</span>
                </a>
            </li>
        </ul>
        @if (auth()->user()->current_team_id == 1)
            <ul
                class="mb-4 space-y-2 border-t border-gray-200 pt-4 font-medium"
            >
                <li
                    class="{{ request()->routeIs("laporan-ikm-index") ? "rounded-lg bg-indigo-300" : "" }}"
                >
                    <button
                        type="button"
                        class="group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-100"
                        aria-controls="dropdown-example-Laporan"
                        data-collapse-toggle="dropdown-example-Laporan"
                    >
                        <svg
                            class="h-6 w-6 flex-shrink-0 text-gray-900 transition duration-75"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 4.5V19a1 1 0 0 0 1 1h15M7 14l4-4 4 4 5-5m0 0h-3.207M20 9v3.207"
                            />
                        </svg>
                        <span
                            class="ms-3 flex-1 whitespace-nowrap text-left rtl:text-right"
                        >
                            Laporan
                        </span>
                        <svg
                            class="h-3 w-3"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 10 6"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m1 1 4 4 4-4"
                            />
                        </svg>
                    </button>
                    <ul
                        id="dropdown-example-Laporan"
                        class="{{ request()->routeIs("laporan-ikm-index") ? "block " : "hidden" }} space-y-2 px-1 py-2"
                    >
                        <li
                            class="{{ request()->routeIs("laporan-ikm-index") ? "rounded-lg bg-white" : "" }}"
                        >
                            <a
                                href="{{ route("laporan-ikm-index") }}"
                                class="group flex items-center rounded-lg p-2 pl-5 text-gray-900 hover:bg-gray-100"
                            >
                                <svg
                                    class="h-6 w-6 flex-shrink-0 text-gray-900 transition duration-75"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 20 23"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                    />
                                </svg>
                                <span class="ms-3 flex-1 whitespace-nowrap">
                                    Laporan IKM
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        @endif

        <ul class="space-y-2 border-t border-gray-200 pt-4 font-medium">
            <label>Survey</label>
            <li
                class="{{ request()->routeIs("responden-index", "riwayatShiftDetail") ? "rounded-lg bg-white" : "" }}"
            >
                <a
                    href="{{ route("responden-index") }}"
                    class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100"
                >
                    <svg
                        class="h-6 w-6 flex-shrink-0 text-gray-900 transition duration-75"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-width="2"
                            d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"
                        />
                    </svg>

                    <span class="ms-3">Responden</span>
                </a>
            </li>
        </ul>
        @if (auth()->user()->current_team_id == 1)
            <ul class="space-y-2 border-t border-gray-200 pt-4 font-medium">
                <label>Master Data</label>
                <li
                    class="{{ request()->routeIs("pelayanan-manager") ? "rounded-lg bg-white" : "" }}"
                >
                    <a
                        href="{{ route("pelayanan-manager") }}"
                        class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100"
                    >
                        <svg
                            class="h-6 w-6 flex-shrink-0 text-gray-900 transition duration-75"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="none"
                            viewBox="0 0 26 26"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M 12.90625 0 C 12.664063 0.015625 12.425781 0.0898438 12.21875 0.21875 L 0.71875 7.21875 C 0.230469 7.523438 -0.0429688 8.078125 0.015625 8.652344 C 0.078125 9.222656 0.457031 9.710938 1 9.90625 L 1 25 C 1 25.550781 1.449219 26 2 26 L 24 26 C 24.550781 26 25 25.550781 25 25 L 25 9.90625 C 25.542969 9.710938 25.921875 9.222656 25.984375 8.652344 C 26.042969 8.078125 25.769531 7.523438 25.28125 7.21875 L 13.78125 0.21875 C 13.519531 0.0585938 13.214844 -0.0195313 12.90625 0 Z M 13 3.25 L 23 9.34375 L 23 24 L 3 24 L 3 9.34375 Z M 17.53125 8.96875 C 16.671875 8.925781 15.6875 9.3125 14.90625 10.09375 C 13.925781 11.074219 13.597656 12.375 13.9375 13.34375 L 13 14.3125 L 8.09375 9.40625 C 6.59375 10.90625 6.59375 13.3125 8.09375 14.8125 L 10.3125 17 L 6.40625 20.90625 L 7.5 22 L 14.875 14.4375 C 15.855469 14.90625 17.265625 14.546875 18.3125 13.5 C 19.5625 12.25 19.8125 10.46875 18.875 9.53125 C 18.523438 9.179688 18.046875 8.996094 17.53125 8.96875 Z M 15.09375 16.40625 L 12.40625 19.09375 L 13.6875 20.40625 L 15.3125 18.8125 L 18.5 22 L 19.59375 20.90625 Z"
                            />
                        </svg>

                        <span class="ms-3">Pelayanan</span>
                    </a>
                </li>

                <li
                    class="{{ request()->routeIs("pertanyaan-index") ? "rounded-lg bg-white" : "" }}"
                >
                    <a
                        href="{{ route("pertanyaan-index") }}"
                        class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100"
                    >
                        <svg
                            class="h-6 w-6 flex-shrink-0 text-gray-900 transition duration-75"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.306-.613-.933-1-1.618-1H7.618c-.685 0-1.312.387-1.618 1M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"
                            />
                        </svg>
                        <span class="ms-3">Quisioner</span>
                    </a>
                </li>
                @if (auth()->user()->current_team_id == 1)
                    <li
                        class="{{ request()->routeIs("kelola-user-index") ? "rounded-lg bg-white" : "" }}"
                    >
                        <a
                            href="{{ route("kelola-user-index") }}"
                            class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100"
                        >
                            <svg
                                class="h-6 w-6 flex-shrink-0 text-gray-900 transition duration-75"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-width="2"
                                    d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"
                                />
                            </svg>

                            <span class="ms-3">Kelola Users</span>
                        </a>
                    </li>
                @endif
            </ul>
            <ul class="space-y-2 border-t border-gray-200 pt-4 font-medium">
                <label>Settings</label>
                <li
                    class="{{ request()->routeIs("tentangToko") ? "rounded-lg bg-white" : "" }}"
                >
                    <a
                        href="{{ route("tentangToko") }}"
                        class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100"
                    >
                        <svg
                            class="h-6 w-6 flex-shrink-0 text-gray-900 transition duration-75"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z"
                            />
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                            />
                        </svg>

                        <span class="ms-3">Tentang Instansi</span>
                    </a>
                </li>
            </ul>
        @endif
    </div>
</aside>
