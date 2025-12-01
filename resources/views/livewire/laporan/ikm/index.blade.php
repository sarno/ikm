<div
    x-data="{ startDate: @entangle("startDate"), endDate: @entangle("endDate") }"
>
    <!-- FILTER SECTION -->
    <div
        class="mx-auto mb-4 max-w-7xl bg-white p-5 shadow-xl sm:rounded-lg sm:px-6 lg:px-8"
    >
        <!-- 2 KOLOM -->
        <div class="mb-4 mt-4 grid grid-cols-1 gap-6 md:grid-cols-2">
            <!-- Start Date -->
            <div>
                <label
                    class="dark:text-white mb-2 block text-sm font-medium text-gray-900"
                >
                    Tanggal Mulai
                </label>
                <input
                    type="date"
                    wire:model.live="startDate"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:bg-gray-600 dark:border-gray-500 dark:text-white focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                />
            </div>

            <!-- End Date -->
            <div>
                <label
                    class="dark:text-white mb-2 block text-sm font-medium text-gray-900"
                >
                    Tanggal Akhir
                </label>
                <input
                    type="date"
                    wire:model.live="endDate"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:bg-gray-600 dark:border-gray-500 dark:text-white focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                />
            </div>

            <!-- Payment Method -->
            <div>
                <label
                    class="dark:text-white mb-2 block text-sm font-medium text-gray-900"
                >
                    Jenis Pelayanan
                </label>
                <select
                    wire:model.live="selectedPelayanan"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:bg-gray-600 dark:border-gray-500 dark:text-white focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                >
                    <option value="All">Semua</option>
                    @foreach ($pelayananCategories as $pelayanan)
                        <option value="{{ $pelayanan->id }}">
                            {{ $pelayanan->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- User -->
            <div>
                <label
                    class="dark:text-white mb-2 block text-sm font-medium text-gray-900"
                >
                    User
                </label>
                <select
                    wire:model.live="userId"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:bg-gray-600 dark:border-gray-500 dark:text-white focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                >
                    <option value="All">Semua</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div
        class="mx-auto max-w-7xl bg-white p-5 shadow-xl sm:rounded-lg sm:px-6 lg:px-8"
    >
        <div class="mb-4 mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Kiri -->
            <div>
                <label class="block font-medium text-gray-900">
                    Laporan Penjualan
                </label>
                <small>
                    Periode :
                    {{ \Carbon\Carbon::parse($startDate)->translatedFormat("l, d-m-Y") }}
                    -
                    {{ \Carbon\Carbon::parse($endDate)->translatedFormat("l, d-m-Y") }}
                </small>
            </div>

            <!-- Kanan (selalu paling kanan) -->
            <div class="flex justify-end items-start">
                <button
                    wire:click="downloadExcel"
                    wire:loading.attr="disabled"
                    class="mx-2 mb-2 mt-5 rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 px-5 py-2.5 text-sm font-medium text-white shadow hover:bg-gradient-to-l focus:ring-4 focus:ring-purple-200 dark:focus:ring-purple-800"
                >
                    <span class="flex items-center gap-2">
                        <svg
                            wire:loading
                            wire:target="downloadExcel"
                            class="h-4 w-4 animate-spin"
                            aria-hidden="true"
                        >
                            <circle
                                cx="50"
                                cy="50"
                                r="45"
                                stroke="gray"
                                stroke-width="10"
                                fill="none"
                            />
                        </svg>
                        Download Excel
                    </span>
                </button>
                <button
                    wire:click="downloadPdf"
                    wire:loading.attr="disabled"
                    class="mx-2 mb-2 mt-5 rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 px-5 py-2.5 text-sm font-medium text-white shadow hover:bg-gradient-to-l focus:ring-4 focus:ring-purple-200 dark:focus:ring-purple-800"
                >
                    <span class="flex items-center gap-2">
                        <svg
                            wire:loading
                            wire:target="downloadPdf"
                            class="h-4 w-4 animate-spin"
                            aria-hidden="true"
                        >
                            <circle
                                cx="50"
                                cy="50"
                                r="45"
                                stroke="gray"
                                stroke-width="10"
                                fill="none"
                            />
                        </svg>
                        Download Pdf
                    </span>
                </button>
            </div>
        </div>
        <livewire:Laporan.Ikm.GroupingQuestion
            :key="$startDate . '-' . $endDate . '-' . $selectedPelayanan . '-' . $userId"
            :startDate="$startDate"
            :endDate="$endDate"
            :pelayananMethod="$selectedPelayanan"
            :userId="$userId"
        />

        <livewire:Laporan.Ikm.GroupingResponden
            :key="$startDate . '-' . $endDate . '-' . $selectedPelayanan . '-' . $userId"
            :startDate="$startDate"
            :endDate="$endDate"
            :pelayananMethod="$selectedPelayanan"
            :userId="$userId"
        />
    </div>
</div>
