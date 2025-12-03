<div>
    <header
        class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden"
    >
        @if (Route::has("login"))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a
                        href="{{ url("/dashboard") }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route("login") }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                    >
                        Login Admin
                    </a>
                @endauth
            </nav>
        @endif
    </header>
    <div
        class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0"
    >
        <main
            class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row"
        >
            <div
                class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none"
            >
                <h1 class="mb-1 font-medium text-2xl">
                    Survei Kepuasan Masyarakat
                </h1>
                <p class="mb-4 text-[#706f6c] dark:text-[#A1A09A]">
                    Bantu kami meningkatkan kualitas layanan dengan mengisi
                    survei kepuasan masyarakat. Partisipasi Anda sangat berarti
                    bagi kami untuk memberikan pelayanan yang lebih baik.
                </p>
                <ul class="flex gap-3 text-sm leading-normal">
                    <li>
                        <a
                            href="{{ route("survey-index") }}"
                            class="inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal"
                        >
                            Mulai Survey
                        </a>
                    </li>
                </ul>
            </div>
            <div
                class="bg-[#fff2f2] dark:bg-[#1D0002] relative lg:-ml-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg aspect-[335/376] lg:aspect-auto w-full lg:w-[438px] shrink-0 overflow-hidden"
            >
                {{-- Logo IKM --}}
                <img src="{{ asset("logo.png") }}" class="w-full p-8" />
                <div
                    class="absolute inset-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]"
                ></div>
            </div>
        </main>
    </div>

    @if (Route::has("login"))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</div>
