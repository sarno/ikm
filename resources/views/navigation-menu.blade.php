<nav
    class="fixed start-0 top-0 z-20 w-full border-b border-gray-200 bg-indigo-200 md:bg-indigo-200"
>
    <div
        class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between p-4"
    >
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            {{--
                <img
                src="{{ url('assets/logo-kr.png') }}"
                class="h-10 md:hidden"
                alt="Flowbite Logo"
                style="filter: brightness(0) invert(1)"
                />
            --}}
            <span
                class="self-center whitespace-nowrap text-2xl font-semibold"
            ></span>
        </a>
        <div class="flex space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <div
                    class="relative mr-2 ms-3 hidden md:mt-2 md:block lg:block"
                >
                    <x-dropdown align="right" width="60">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button
                                    type="button"
                                    class="inline-flex items-center rounded-md border border-transparent bg-gray-50 px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:bg-gray-50 focus:outline-none active:bg-gray-50"
                                >
                                    {{ Auth::user()->currentTeam->name }}

                                    <svg
                                        class="-me-0.5 ms-2 h-4 w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"
                                        />
                                    </svg>
                                </button>
                            </span>
                        </x-slot>

                        <x-slot name="content">
                            <div class="w-60">
                                <!-- Team Management -->
                                <div
                                    class="block px-4 py-2 text-xs text-gray-400"
                                >
                                    {{ __("Manage Team") }}
                                </div>

                                <!-- Team Settings -->
                                <x-dropdown-link
                                    href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                                >
                                    {{ __("Team Settings") }}
                                </x-dropdown-link>

                                @if (Auth::user()->currentTeam->name == "admin")
                                    @can(
                                    "create", Laravel\Jetstream\Jetstream::newTeamModel()                                    )
                                        <x-dropdown-link
                                            href="{{ route('teams.create') }}"
                                        >
                                            {{ __("Create New Team") }}
                                        </x-dropdown-link>
                                    @endcan
                                @endif

                                <!-- Team Switcher -->
                                @if (Auth::user()->allTeams()->count() > 1)
                                    <div class="border-t border-gray-200"></div>

                                    <div
                                        class="block px-4 py-2 text-xs text-gray-400"
                                    >
                                        {{ __("Switch Teams") }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-switchable-team :team="$team" />
                                    @endforeach
                                @endif
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
            @endif

            <div class="relative ml-2 ms-3 hidden md:mt-2 md:block lg:block">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button
                                class="flex rounded-full border-2 border-transparent text-sm transition focus:border-gray-300 focus:outline-none"
                            >
                                <img
                                    class="h-8 w-8 rounded-full object-cover"
                                    src="{{ Auth::user()->profile_photo_url }}"
                                    alt="{{ Auth::user()->name }}"
                                />
                            </button>
                        @else
                            <span class="inline-flex rounded-md">
                                <button
                                    type="button"
                                    class="inline-flex items-center rounded-md border border-transparent bg-gray-50 px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:bg-gray-50 focus:outline-none active:bg-gray-50"
                                >
                                    {{ Auth::user()->name }}

                                    <svg
                                        class="-me-0.5 ms-2 h-4 w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                                        />
                                    </svg>
                                </button>
                            </span>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __("Manage Account") }}
                        </div>

                        <x-dropdown-link href="{{ route('profile.show') }}">
                            {{ __("Profile") }}
                        </x-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-dropdown-link
                                href="{{ route('api-tokens.index') }}"
                            >
                                {{ __("API Tokens") }}
                            </x-dropdown-link>
                        @endif

                        <div class="border-t border-gray-200"></div>

                        <!-- Authentication -->
                        <form
                            method="POST"
                            action="{{ route("logout") }}"
                            x-data
                        >
                            @csrf

                            <x-dropdown-link
                                href="{{ route('logout') }}"
                                @click.prevent="$root.submit();"
                            >
                                {{ __("Log Out") }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            <button
                data-drawer-target="sidebar-multi-level-sidebar"
                data-drawer-toggle="sidebar-multi-level-sidebar"
                aria-controls="sidebar-multi-level-sidebar"
                type="button"
                class="ms-3 mt-2 inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 lg:hidden"
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
        </div>
    </div>
</nav>
