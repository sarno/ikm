<div>
    <div class="mx-auto max-w-4xl p-4">
        {{-- Wizard Steps Header --}}
        @if ($step >= 1 && $step <= 6)
            <div class="mb-8">
                <ol class="flex items-center w-full">
                    <li
                        class="flex w-full items-center {{ $step >= 1 ? "text-blue-600 dark:text-blue-500" : "text-gray-500 dark:text-gray-400" }} after:w-full after:h-1 after:border-b {{ $step > 1 ? "after:border-blue-600 dark:after:border-blue-500" : "after:border-gray-200 dark:after:border-gray-700" }} after:border-4 after:inline-block"
                    >
                        <span
                            class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0"
                        >
                            1
                        </span>
                    </li>
                    <li
                        class="flex w-full items-center {{ $step >= 2 ? "text-blue-600 dark:text-blue-500" : "text-gray-500 dark:text-gray-400" }} after:w-full after:h-1 after:border-b {{ $step > 2 ? "after:border-blue-600 dark:after:border-blue-500" : "after:border-gray-200 dark:after:border-gray-700" }} after:border-4 after:inline-block"
                    >
                        <span
                            class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0"
                        >
                            2
                        </span>
                    </li>
                    <li
                        class="flex w-full items-center {{ $step >= 3 ? "text-blue-600 dark:text-blue-500" : "text-gray-500 dark:text-gray-400" }} after:w-full after:h-1 after:border-b {{ $step > 3 ? "after:border-blue-600 dark:after:border-blue-500" : "after:border-gray-200 dark:after:border-gray-700" }} after:border-4 after:inline-block"
                    >
                        <span
                            class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0"
                        >
                            3
                        </span>
                    </li>
                    <li
                        class="flex w-full items-center {{ $step >= 4 ? "text-blue-600 dark:text-blue-500" : "text-gray-500 dark:text-gray-400" }} after:w-full after:h-1 after:border-b {{ $step > 4 ? "after:border-blue-600 dark:after:border-blue-500" : "after:border-gray-200 dark:after:border-gray-700" }} after:border-4 after:inline-block"
                    >
                        <span
                            class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0"
                        >
                            4
                        </span>
                    </li>
                    <li
                        class="flex w-full items-center {{ $step >= 5 ? "text-blue-600 dark:text-blue-500" : "text-gray-500 dark:text-gray-400" }} after:w-full after:h-1 after:border-b {{ $step > 5 ? "after:border-blue-600 dark:after:border-blue-500" : "after:border-gray-200 dark:after:border-gray-700" }} after:border-4 after:inline-block"
                    >
                        <span
                            class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0"
                        >
                            5
                        </span>
                    </li>
                    <li
                        class="flex items-center {{ $step >= 6 ? "text-blue-600 dark:text-blue-500" : "text-gray-500 dark:text-gray-400" }}"
                    >
                        <span
                            class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0"
                        >
                            6
                        </span>
                    </li>
                </ol>
            </div>
        @endif

        {{-- Step 0: Welcome Page --}}
        @if ($step == 0)
            <div class="text-center p-10">
                <h2
                    class="text-3xl font-bold text-gray-800 dark:text-white mb-4"
                >
                    Selamat Datang di Pelayanan KBRI Damaskus
                </h2>
                <h2
                    class="text-3xl font-bold text-gray-800 dark:text-white mb-6"
                    dir="rtl"
                >
                    أهلاً وسهلاً بكم في خدمات سفارة إندونيسيا بدمشق
                </h2>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                    Berikan penilaian terhadap pelayanan kami dengan menekan
                    tombol mulai di bawah ini.
                </p>
                <p
                    class="text-lg text-gray-700 dark:text-gray-300 mb-6"
                    dir="rtl"
                >
                    يرجى تقييم خدماتنا بالضغط على زر البدء أدناه.
                </p>
                <button
                    wire:click="startSurvey()"
                    class="mt-8 inline-block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                >
                    Mulai Survei / ابدأ الاستبيان
                </button>
            </div>
        @endif

        {{-- Step 1: Language Selection --}}
        @if ($step == 1)
            <div class="text-center">
                <h2 class="text-2xl font-bold mb-4">
                    Pilih Bahasa / Select Language
                </h2>
                <div class="flex justify-center gap-4">
                    <button
                        wire:click="selectLanguage('id')"
                        class="p-6 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 text-xl"
                    >
                        Bahasa Indonesia
                    </button>
                    <button
                        wire:click="selectLanguage('ar')"
                        class="p-6 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 text-xl"
                    >
                        العربية
                    </button>
                </div>
            </div>
        @endif

        {{-- Step 2: Select Pelayanan --}}
        @if ($step == 2)
            <div class="text-center">
                <h2 class="text-2xl font-bold mb-4">
                    {{ $selectedLanguage === "id" ? "Pilih Jenis Pelayanan" : "اختر نوع الخدمة" }}
                </h2>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"
                >
                    @foreach ($pelayanans as $pelayanan)
                        <button
                            wire:click="selectPelayanan({{ $pelayanan->id }})"
                            class="p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"
                        >
                            <h5
                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white {{ $selectedLanguage === "ar" ? "rtl" : "" }}"
                            >
                                {{ $pelayanan->name }}
                            </h5>
                        </button>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Step 3: Input Data Responden --}}
        @if ($step == 3)
            <div dir="{{ $selectedLanguage === "ar" ? "rtl" : "ltr" }}">
                <h2 class="text-2xl font-bold mb-4 text-center">
                    {{ $selectedLanguage === "id" ? "Data Responden" : "بيانات المستفتى" }}
                </h2>
                <form wire:submit.prevent="saveRespondenData">
                    <div class="mb-4">
                        <label
                            for="nama"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            {{ $selectedLanguage === "id" ? "Nama" : "الاسم" }}
                        </label>
                        <input
                            type="text"
                            id="nama"
                            wire:model.defer="nama"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        />
                        @error("nama")
                            <span class="text-red-500 text-xs">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label
                            for="usia"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            {{ $selectedLanguage === "id" ? "Usia" : "العمر" }}
                        </label>
                        <select
                            id="usia"
                            wire:model.defer="usia"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        >
                            <option value="">
                                {{ $selectedLanguage === "id" ? "Pilih Usia" : "اختر العمر" }}
                            </option>
                            <option value="<17">
                                {{ $selectedLanguage === "id" ? "< 17 Tahun" : "أقل من 17 سنة" }}
                            </option>
                            <option value="18-25">
                                {{ $selectedLanguage === "id" ? "18-25 Tahun" : "18-25 سنة" }}
                            </option>
                            <option value="26-30">
                                {{ $selectedLanguage === "id" ? "26-30 Tahun" : "26-30 سنة" }}
                            </option>
                            <option value="31-40">
                                {{ $selectedLanguage === "id" ? "31-40 Tahun" : "31-40 سنة" }}
                            </option>
                            <option value=">40">
                                {{ $selectedLanguage === "id" ? "> 40 Tahun" : "أكثر من 40 سنة" }}
                            </option>
                        </select>
                        @error("usia")
                            <span class="text-red-500 text-xs">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label
                            for="gender"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            {{ $selectedLanguage === "id" ? "Jenis Kelamin" : "الجنس" }}
                        </label>
                        <select
                            id="gender"
                            wire:model.defer="gender"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        >
                            <option value="">
                                {{ $selectedLanguage === "id" ? "Pilih Jenis Kelamin" : "اختر الجنس" }}
                            </option>
                            <option value="laki-laki">
                                {{ $selectedLanguage === "id" ? "Laki-laki" : "ذكر" }}
                            </option>
                            <option value="perempuan">
                                {{ $selectedLanguage === "id" ? "Perempuan" : "أنثى" }}
                            </option>
                        </select>
                        @error("gender")
                            <span class="text-red-500 text-xs">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label
                            for="phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            {{ $selectedLanguage === "id" ? "Nomor Telepon (Opsional)" : "رقم الهاتف (اختياري)" }}
                        </label>
                        <input
                            type="text"
                            id="phone"
                            wire:model.defer="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        />
                    </div>
                    <div class="text-right">
                        <button
                            type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        >
                            {{ $selectedLanguage === "id" ? "Selanjutnya" : "التالي" }}
                        </button>
                    </div>
                </form>
            </div>
        @endif

        {{-- Step 4: Pertanyaan --}}
        @if ($step == 4)
            <div
                class="text-center"
                dir="{{ $selectedLanguage === "ar" ? "rtl" : "ltr" }}"
            >
                @if (isset($pertanyaans[$currentPertanyaanIndex]))
                    <h2 class="text-3xl font-bold mb-6">
                        {{ $pertanyaans[$currentPertanyaanIndex]->question }}
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <button
                            wire:click="answer(4)"
                            class="p-6 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 text-xl"
                        >
                            {{ $selectedLanguage === "id" ? "Sangat Puas" : "راض جدا" }}
                        </button>
                        <button
                            wire:click="answer(3)"
                            class="p-6 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 text-xl"
                        >
                            {{ $selectedLanguage === "id" ? "Puas" : "راض" }}
                        </button>
                        <button
                            wire:click="answer(2)"
                            class="p-6 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 text-xl"
                        >
                            {{ $selectedLanguage === "id" ? "Tidak Puas" : "غير راض" }}
                        </button>
                        <button
                            wire:click="answer(1)"
                            class="p-6 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 text-xl"
                        >
                            {{ $selectedLanguage === "id" ? "Sangat Tidak Puas" : "غير راض جدا" }}
                        </button>
                    </div>
                @else
                    <p>
                        {{ $selectedLanguage === "id" ? "Tidak ada pertanyaan untuk layanan ini." : "لا توجد أسئلة لهذه الخدمة." }}
                    </p>
                    <button
                        wire:click="$set('step', 5)"
                        class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                    >
                        {{ $selectedLanguage === "id" ? "Lanjut ke Kritik & Saran" : "الانتقال إلى النقد والاقتراحات" }}
                    </button>
                @endif
            </div>
        @endif

        {{-- Step 5: Kritik dan Saran --}}
        @if ($step == 5)
            <div dir="{{ $selectedLanguage === "ar" ? "rtl" : "ltr" }}">
                <h2 class="text-2xl font-bold mb-4 text-center">
                    {{ $selectedLanguage === "id" ? "Kritik dan Saran" : "النقد والاقتراحات" }}
                </h2>
                <form wire:submit.prevent="finish">
                    <div class="mb-4">
                        <label
                            for="kritik"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            {{ $selectedLanguage === "id" ? "Kritik" : "النقد" }}
                        </label>
                        <textarea
                            id="kritik"
                            rows="4"
                            wire:model.defer="kritik"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ $selectedLanguage === "id" ? "Sampaikan kritik Anda..." : "اكتب نقدك..." }}"
                        ></textarea>
                    </div>
                    <div class="mb-4">
                        <label
                            for="saran"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            {{ $selectedLanguage === "id" ? "Saran" : "الاقتراحات" }}
                        </label>
                        <textarea
                            id="saran"
                            rows="4"
                            wire:model.defer="saran"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ $selectedLanguage === "id" ? "Sampaikan saran Anda..." : "اكتب اقتراحاتك..." }}"
                        ></textarea>
                    </div>
                    <div class="text-right">
                        <button
                            type="submit"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800"
                        >
                            {{ $selectedLanguage === "id" ? "Selesai dan Simpan" : "إنهاء وحفظ" }}
                        </button>
                    </div>
                </form>
            </div>
        @endif

        {{-- Step 6: Thank You --}}
        @if ($step == 6)
            <div
                class="text-center p-10"
                dir="{{ $selectedLanguage === "ar" ? "rtl" : "ltr" }}"
            >
                <h2 class="text-3xl font-bold text-green-600 mb-4">
                    {{ $selectedLanguage === "id" ? "Terima Kasih!" : "شكرا لك!" }}
                </h2>
                <p class="text-lg text-gray-700 dark:text-gray-300">
                    {{ $selectedLanguage === "id" ? "Survei Anda telah berhasil disimpan." : "تم حفظ استطلاعك بنجاح." }}
                </p>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    {{ $selectedLanguage === "id" ? "Terima kasih atas waktu dan masukan yang Anda berikan." : "شكرا لوقتك وملاحظاتك." }}
                </p>
                <div class="flex justify-center gap-4 mt-8">
                    <a
                        href="{{ route("survey-index") }}"
                        class="inline-block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                    >
                        {{ $selectedLanguage === "id" ? "Isi Survei Lagi" : "املأ الاستطلاع مرة أخرى" }}
                    </a>
                    <!-- <a
                        href="{{ route("dashboard") }}"
                        class="inline-block text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800"
                    >
                        {{ $selectedLanguage === "id" ? "Kembali ke Dashboard" : "العودة إلى لوحة التحكم" }}
                    </a> -->
                </div>
            </div>
        @endif
    </div>
</div>
