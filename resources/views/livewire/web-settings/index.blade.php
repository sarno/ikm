<div class="relative mb-8 overflow-hidden rounded-sm bg-white p-4 sm:p-6">
    <div class="mb-5 border-b-2 border-gray-500 md:flex">
        <div class="w-64 flex-none">
            <div class="mt-3">
                <label class="block text-lg font-medium text-gray-900">
                    Tentang Instansi
                </label>
            </div>
        </div>
        <div class="flex-1">
            <form
                class="p-4 md:p-5"
                wire:submit.prevent="save"
                enctype="multipart/form-data"
            >
                <label class="mb-2 mt-3 block text-sm font-bold text-gray-900">
                    Upload Gambar
                    <small>(Max:2mb)</small>
                    @error("logo_toko")
                        <span class="text-red-500">*</span>
                    @enderror
                </label>
                <div class="flex w-full flex-row items-center">
                    <div class="mr-4" wire:ignore>
                        <img
                            id="imagePreview"
                            @if ($logo_toko)
                                src="{{ url("storage/logo/" . $logo_toko) }}"
                            @else
                                src="{{ url("/image-preview.png") }}"
                            @endif
                            alt="Image Preview"
                            class="mx-auto rounded-sm border-2 border-gray-300 shadow-lg"
                            style="
                                width: 150px;
                                height: 40px;
                                object-fit: cover;
                            "
                        />
                    </div>
                    <div class="flex w-full">
                        <input
                            wire:model="new_logo"
                            class="block w-full cursor-pointer rounded-s-md border border-gray-300 bg-gray-50 text-sm text-gray-900"
                            id="file_input"
                            type="file"
                            accept="image/*"
                            onchange="previewImage(event)"
                        />
                        <button
                            type="button"
                            wire:click="deleteLogo"
                            class="inline-flex items-center rounded-e-md border border-red-800 bg-red-500 px-3 text-sm text-gray-900 hover:bg-red-700 hover:text-white"
                        >
                            <svg
                                class="h-6 w-6"
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
                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
                <label class="mb-2 mt-3 block text-sm font-bold text-gray-900">
                    Nama Instansi
                </label>
                <div class="flex">
                    <span
                        class="inline-flex items-center rounded-s-md border border-e-0 border-gray-300 bg-gray-200 px-3 text-sm text-gray-900"
                    >
                        <svg
                            class="h-6 w-6"
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
                    </span>
                    <input
                        type="text"
                        wire:model.defer="nama_usaha"
                        class="block w-full min-w-0 flex-1 rounded-none rounded-e-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-0 focus:ring-blue-500"
                        placeholder="Masukan nama instansi"
                        value=""
                    />
                </div>
                <label class="mb-2 mt-3 block text-sm font-bold text-gray-900">
                    Nama Instansi - Arabic
                </label>
                <div class="flex">
                    <span
                        class="inline-flex items-center rounded-s-md border border-e-0 border-gray-300 bg-gray-200 px-3 text-sm text-gray-900"
                    >
                        <svg
                            class="h-6 w-6"
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
                    </span>
                    <input
                        type="text"
                        wire:model.defer="nama_usaha_arab"
                        class="block w-full min-w-0 flex-1 rounded-none rounded-e-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-0 focus:ring-blue-500"
                        placeholder="Masukan nama instansi dalam bahasa arab"
                        value=""
                    />
                </div>
                <label class="mb-2 mt-3 block text-sm font-bold text-gray-900">
                    Alamat
                </label>
                <div class="flex">
                    <span
                        class="inline-flex items-center rounded-s-md border border-e-0 border-gray-300 bg-gray-200 px-3 text-sm text-gray-900"
                    >
                        <svg
                            class="h-6 w-6"
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
                                d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                            />
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z"
                            />
                        </svg>
                    </span>
                    <input
                        type="text"
                        wire:model.defer="alamat"
                        class="block w-full min-w-0 flex-1 rounded-none rounded-e-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-0 focus:ring-blue-500"
                        placeholder="Masukan alamat instansi"
                        value=""
                    />
                </div>
                <label class="mb-2 mt-3 block text-sm font-bold text-gray-900">
                    Footer Informasi
                </label>
                <div class="flex">
                    <span
                        class="inline-flex items-center rounded-s-md border border-e-0 border-gray-300 bg-gray-200 px-3 text-sm text-gray-900"
                    >
                        <svg
                            class="h-4 w-4"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M3 4a1 1 0 0 0-.822 1.57L6.632 12l-4.454 6.43A1 1 0 0 0 3 20h13.153a1 1 0 0 0 .822-.43l4.847-7a1 1 0 0 0 0-1.14l-4.847-7a1 1 0 0 0-.822-.43H3Z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </span>
                    <input
                        type="text"
                        wire:model.defer="footer_struk"
                        class="block w-full min-w-0 flex-1 rounded-none rounded-e-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-0 focus:ring-blue-500"
                        placeholder="Masukan informasi untuk footer struk"
                        value=""
                    />
                </div>
                <div class="text-right">
                    <button
                        wire:click="save"
                        id="btn-submit"
                        wire:loading.attr="disabled"
                        class="dark:focus:ring-purple-800 mx-2 mb-2 mt-5 rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 px-1 py-2.5 text-center text-sm font-medium text-white hover:bg-gradient-to-l focus:outline-none focus:ring-4 focus:ring-purple-200"
                    >
                        <span
                            class="relative rounded-md px-5 py-2.5 transition-all duration-75 ease-in"
                        >
                            <svg
                                aria-hidden="true"
                                wire:loading
                                wire:target="save"
                                role="status"
                                class="mr-3 inline h-4 w-4 animate-spin text-white"
                                viewBox="0 0 100 101"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="#E5E7EB"
                                />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentColor"
                                />
                            </svg>
                            Submit
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="relative mb-8 overflow-hidden rounded-sm bg-white p-4 sm:p-6">
        <div class="mb-5 border-b-2 border-gray-500 md:flex">
            <div class="w-64 flex-none">
                <div class="mt-3">
                    <label class="block text-lg font-medium text-gray-900">
                        Reset Data
                    </label>
                </div>
            </div>
            <div class="flex-1 p-4 md:p-5">
                <p class="mb-4 text-sm text-gray-700">
                    Tekan tombol di bawah ini untuk menghapus semua data
                    responden. Aksi ini tidak dapat dibatalkan.
                </p>
                <button
                    type="button"
                    wire:click="confirmResetRespondenData"
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                >
                    Reset Responden & Jawaban
                </button>
            </div>
        </div>
        <div class="invisible" hidden>
            <iframe id="myframe"></iframe>
        </div>
    </div>

    @if ($deleteAlerts)
        <div
            class="fixed left-0 right-0 top-0 z-50 h-full max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-indigo-300 bg-opacity-50"
        >
            <div
                class="min-w-xl relative inset-0 mx-auto my-auto mt-36 max-h-full w-full max-w-xl p-4"
            >
                <div class="relative mx-auto max-h-full w-full max-w-md p-4">
                    <div
                        class="dark:bg-gray-700 relative rounded-lg bg-white shadow"
                    >
                        <button
                            type="button"
                            wire:click="closedeleteAlerts"
                            class="dark:hover:bg-gray-600 dark:hover:text-white absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900"
                            data-modal-hide="popup-modal"
                        >
                            <svg
                                class="h-3 w-3"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 14 14"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                                />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 text-center md:p-5">
                            <svg
                                class="dark:text-gray-200 mx-auto mb-4 h-12 w-12 text-gray-400"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                />
                            </svg>
                            <h3
                                class="text-md dark:text-gray-400 mb-5 font-normal text-gray-500"
                            >
                                Apakah Anda yakin ingin menghapus semua data
                                responden dan jawaban?
                            </h3>
                            <button
                                data-modal-hide="popup-modal"
                                type="button"
                                wire:click="submitDelete()"
                                class="dark:focus:ring-red-800 inline-flex items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300"
                            >
                                Ya, Saya yakin
                            </button>
                            <button
                                data-modal-hide="popup-modal"
                                type="button"
                                wire:click="closedeleteAlerts"
                                class="dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 ms-3 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100"
                            >
                                Tidak
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@push("add-js")
    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.classList.add('hidden');
            }
        }
    </script>
@endpush
