@push("add-css")
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/leaflet@1.9.3/dist/leaflet.min.css"
    />
@endpush

<div>
    <div class="lg:mt-18 mt-20 py-2 md:mt-20">
        <div
            class="mx-auto max-w-7xl bg-white p-5 shadow-xl sm:rounded-lg sm:px-6 lg:px-8"
        >
            <div
                class="flex flex-row items-center justify-between bg-white pb-4"
            >
                <div>
                    <label
                        for="SkuProduk"
                        class="dark:text-white block text-lg font-medium text-gray-900"
                    >
                        Dashboard
                    </label>
                </div>
                <div
                    class="relative"
                    x-data="{
                        init() {
                            let start = moment()
                            let end = moment()
                            let cb = (start, end) => {
                                $('#reportrange span').html(
                                    start.format('MMMM D, YYYY') +
                                        ' - ' +
                                        end.format('MMMM D, YYYY'),
                                )
                                this.$wire.set(
                                    'search',
                                    start.format('YYYY-MM-DD') + '/' + end.format('YYYY-MM-DD'),
                                )
                                this.$wire.set(
                                    'dateSelect',
                                    start.format('YYYY-MM-DD') + '/' + end.format('YYYY-MM-DD'),
                                )
                                this.$wire.call(
                                    'handleDateSelectUpdate',
                                    start.format('YYYY-MM-DD'),
                                    end.format('YYYY-MM-DD'),
                                )
                            }
                            $('#reportrange').daterangepicker(
                                {
                                    startDate: start,
                                    endDate: end,
                                    ranges: {
                                        'Today': [moment(), moment()],
                                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                        'Last 30 Days': [moment().subtract(30, 'days'), moment()],
                                    },
                                },
                                cb,
                            )
                            cb(start, end)
                        },
                    }"
                    x-init="init()"
                >
                    <div
                        class="rounded-md"
                        wire:ignore
                        id="reportrange"
                        style="
                            background: #fff;
                            cursor: pointer;
                            padding: 5px 10px;
                            border: 1px solid #ccc;
                            width: 100%;
                        "
                    >
                        <i class="fa fa-calendar"></i>
                        &nbsp;
                        <span></span>
                        <i class="fa fa-caret-down"></i>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <div class="mb-4 mt-4 grid grid-cols-1 gap-4 md:grid-cols-3">
                    <div
                        class="rounded-md border-2 border-gray-200 bg-indigo-100 p-5 shadow-xl"
                    >
                        <div class="flex items-center justify-between">
                            <div>
                                <h3
                                    class="mb-2 text-sm font-bold text-gray-600"
                                >
                                    Total Responden
                                </h3>
                                <span class="text-2xl font-bold text-gray-500">
                                    {{ $transaksi->count() }}
                                </span>
                            </div>
                            <div>
                                <span class="mr-auto">
                                    <svg
                                        class="h-[65px] w-[65px] text-gray-500"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="48"
                                        height="48"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.4"
                                            d="M5 18h14M5 18v3h14v-3M5 18l1-9h12l1 9M16 6v3m-4-3v3m-2-6h8v3h-8V3Zm-1 9h.01v.01H9V12Zm3 0h.01v.01H12V12Zm3 0h.01v.01H15V12Zm-6 3h.01v.01H9V15Zm3 0h.01v.01H12V15Zm3 0h.01v.01H15V15Z"
                                        />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- tambahkan nilai responden berdasarkan pelayanan -->
                    @foreach ($pelayananTotals as $pelayanan)
                        <div
                            class="rounded-md border-2 border-gray-200 bg-indigo-100 p-5 shadow-xl"
                        >
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3
                                        class="mb-2 text-sm font-bold text-gray-600"
                                    >
                                        Total Nilai {{ $pelayanan["name"] }}
                                    </h3>
                                    <span
                                        class="text-2xl font-bold text-gray-500"
                                    >
                                        {{ $pelayanan["n_persen"] }} %
                                    </span>
                                </div>
                                <div>
                                    <span class="mr-auto">
                                        <svg
                                            class="h-[65px] w-[65px] text-gray-500"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="48"
                                            height="48"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke="currentColor"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.4"
                                                d="M13.6 16.733c.234.269.548.456.895.534a1.4 1.4 0 0 0 1.75-.762c.172-.615-.446-1.287-1.242-1.481-.796-.194-1.41-.861-1.241-1.481a1.4 1.4 0 0 1 1.75-.762c.343.077.654.26.888.524m-1.358 4.017v.617m0-5.939v.725M4 15v4m3-6v6M6 8.5 10.5 5 14 7.5 18 4m0 0h-3.5M18 4v3m2 8a5 5 0 1 1-10 0 5 5 0 0 1 10 0Z"
                                            />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <livewire:Dashboard.Charts
                :chartDate="$chartDate"
                wire:key="$chartDate"
            />

            <!-- <div class="mt-8 border-t pt-8">
                <h3
                    class="mb-4 text-center text-lg font-medium text-gray-900"
                >
                    NILAI PERTANYAAN IKM
                </h3>
                <div
                    class="mx-auto flex h-96 w-full flex-col items-center justify-center"
                    x-data="{
                        init() {
                            new Chart(document.getElementById('questionChart').getContext('2d'), {
                                type: 'bar',
                                data: {
                                    labels: @js($questionLabels ?? []),
                                    datasets: [
                                        {
                                            label: 'Nilai Persentase (%)',
                                            data: @js($questionPercentages ?? []),
                                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                            borderColor: 'rgba(54, 162, 235, 1)',
                                            borderWidth: 1,
                                        },
                                    ],
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    scales: {
                                        yAxes: [
                                            {
                                                ticks: {
                                                    beginAtZero: true,
                                                    max: 100,
                                                    callback: function (value) {
                                                        return value + '%'
                                                    },
                                                },
                                            },
                                        ],
                                    },
                                    legend: {
                                        display: false,
                                    },
                                },
                            })
                        },
                    }"
                    x-init="init()"
                    wire:ignore
                >
                    <canvas id="questionChart"></canvas>
                </div>
            </div> -->
        </div>

        @push("add-js")
            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
            <script
                type="text/javascript"
                src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"
            ></script>
            <script
                type="text/javascript"
                src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"
            ></script>
            <script
                type="text/javascript"
                src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"
            ></script>
            <script src="https://cdn.jsdelivr.net/npm/leaflet@1.9.3/dist/leaflet.min.js"></script>
        @endpush
    </div>
</div>
