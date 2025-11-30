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
                                    start.format('YYYY-MM-D') + '/' + end.format('YYYY-MM-D'),
                                )
                                this.$wire.set(
                                    'dateSelect',
                                    start.format('YYYY-MM-D') + '/' + end.format('YYYY-MM-D'),
                                )
                                this.$wire.call(
                                    'handleDateSelectUpdate',
                                    start.format('YYYY-MM-D'),
                                    end.format('YYYY-MM-D'),
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
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <livewire:Dashboard.Charts
                :chartDate="$chartDate"
                wire:key="$chartDate"
            />
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
