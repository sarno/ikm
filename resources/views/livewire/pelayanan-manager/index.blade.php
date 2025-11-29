<div>
    @include("components.alerts-custom")
    <div class="">
        <button
            type="button"
            wire:click='$set("openModalCreate",true)'
            class="dark:focus:ring-purple-800 mb-2 me-2 w-full rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gradient-to-l focus:outline-none focus:ring-4 focus:ring-purple-200"
        >
            Tambah Pelayanan
        </button>
    </div>
    @if ($openModalCreate)
        <div
            class="fixed left-0 right-0 top-0 z-50 h-full max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-indigo-300 bg-opacity-50"
        >
            <div
                class="min-w-xl relative inset-0 mx-auto my-auto mt-20 max-h-full w-full max-w-xl p-4"
            >
                <div
                    class="dark:bg-gray-700 relative rounded-lg bg-white shadow"
                >
                    <div
                        class="dark:border-gray-600 flex items-center justify-between rounded-t border-b p-4 md:p-5"
                    >
                        <h3
                            class="dark:text-white text-lg font-semibold text-gray-900"
                        >
                            @if (! $titleModal)
                                Tambah Pelayanan
                            @else
                                {{ $titleModal }}
                            @endif
                        </h3>
                        <button
                            type="button"
                            wire:click="closeModalCreate"
                            class="dark:hover:bg-gray-600 dark:hover:text-white ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900"
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
                    </div>
                    <form
                        class="p-4 md:p-5"
                        @if (! $changed)
                            wire:submit.prevent="store"
                        @else
                            wire:submit.prevent="{{ $changed }}"
                        @endif
                    >
                        <div class="mb-4 grid grid-cols-2 gap-4">
                            <div class="col-span-2 sm:col-span-1">
                                <label
                                    for="name"
                                    class="dark:text-white mb-2 block text-sm font-medium text-gray-900"
                                >
                                    Pelayanan
                                </label>
                                <input
                                    type="text"
                                    wire:model.defer="name"
                                    name="name"
                                    id="name"
                                    class="focus:ring-primary-600 focus:border-primary-600 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                                    placeholder="Input nama pelayanan"
                                    required=""
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label
                                    for="name_ar"
                                    class="dark:text-white mb-2 block text-sm font-medium text-gray-900"
                                >
                                    Pelayanan - Arabic
                                </label>
                                <input
                                    type="text"
                                    wire:model.defer="name_ar"
                                    name="name_ar"
                                    id="name_ar"
                                    class="focus:ring-primary-600 focus:border-primary-600 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                                    placeholder="Input nama pelayaan - Arabic"
                                    required=""
                                />
                            </div>
                            <div class="col-span-2">
                                <label
                                    for="instansi_id"
                                    class="dark:text-white mb-2 block text-sm font-medium text-gray-900"
                                >
                                    Instansi
                                </label>
                                <select
                                    wire:model.defer="instansi_id"
                                    name="instansi_id"
                                    id="instansi_id"
                                    class="focus:ring-primary-600 focus:border-primary-600 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                                    required=""
                                >
                                    <option value="">Pilih Instansi</option>
                                    @foreach ($instansis as $instansi)
                                        <option value="{{ $instansi->id }}">
                                            {{ $instansi->nama_usaha }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label
                                    for="description"
                                    class="dark:text-white mb-2 block text-sm font-medium text-gray-900"
                                >
                                    Description
                                </label>
                                <textarea
                                    wire:model.defer="description"
                                    name="description"
                                    id="description"
                                    rows="4"
                                    class="focus:ring-primary-600 focus:border-primary-600 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                                    placeholder="Input description"
                                ></textarea>
                            </div>
                            <div class="col-span-2">
                                <label
                                    for="new_logo"
                                    class="dark:text-white mb-2 block text-sm font-medium text-gray-900"
                                >
                                    New Logo
                                </label>
                                <input
                                    type="file"
                                    wire:model="new_logo"
                                    name="new_logo"
                                    id="new_logo"
                                    class="focus:ring-primary-600 focus:border-primary-600 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                                />
                                @if ($new_logo)
                                    <img
                                        src="{{ $new_logo->temporaryUrl() }}"
                                        class="mt-2 h-20 w-20 object-cover"
                                    />
                                @endif

                                @if ($logo and ! $new_logo)
                                    <label
                                        class="dark:text-white mb-2 block text-sm font-medium text-gray-900 mt-2"
                                    >
                                        Current Logo
                                    </label>
                                    <img
                                        src="{{ asset("storage/" . $logo) }}"
                                        class="h-20 w-20 object-cover"
                                    />
                                @endif
                            </div>
                        </div>
                        <button
                            type="submit"
                            class="dark:focus:ring-purple-800 float-right mb-2 me-2 ml-4 inline-flex rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gradient-to-l focus:outline-none focus:ring-4 focus:ring-purple-200"
                        >
                            <svg
                                class="-ms-1 me-1 h-5 w-5"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endif

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
                                Pelayanan : {{ $name }}
                                <br />
                                Apakah kamu yakin ingin menghapus ini?
                            </h3>
                            <button
                                data-modal-hide="popup-modal"
                                type="button"
                                wire:click="submitDelete({{ $idPelayanan }})"
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

    @livewire("PelayananManager.Datatable")
</div>
