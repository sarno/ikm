<div class="mt-4">
    <div class="relative overflow-x-auto">
        <table
            class="dark:text-gray-400 w-full text-left text-sm text-gray-500 rtl:text-right"
        >
            <thead
                class="dark:bg-gray-700 dark:text-gray-400 bg-gray-100 text-xs uppercase text-gray-700"
            >
                <tr>
                    <th
                        colspan="4"
                        class="border-b border-gray-200 px-6 py-3 text-center text-lg"
                    >
                        DATA NILAI PERTANYAAN IKM
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="rounded-s-lg px-6 py-3">
                        Pelayanan
                    </th>
                    <th scope="col" class="rounded-s-lg px-6 py-3">
                        Pertanyaan
                    </th>
                    <th scope="col" class="px-6 py-3">Qty</th>
                    <th scope="col" class="px-6 py-3">Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataItems->groupBy("pertanyaan_id") as $items)
                    <tr
                        class="dark:bg-gray-800 border-b border-gray-200 bg-white"
                    >
                        <th
                            scope="row"
                            class="dark:text-white whitespace-nowrap px-6 py-4 font-medium text-gray-900"
                        >
                            {{ $items[0]->pertanyaan->pelayanan->name }}
                        </th>

                        <th
                            scope="row"
                            class="dark:text-white whitespace-nowrap px-6 py-4 font-medium text-gray-900"
                        >
                            {{ $items[0]->pertanyaan->question }}
                        </th>
                        <td class="px-6 py-4">{{ $items->count("id") }}</td>
                        <td class="px-6 py-4">
                            @currency($items->sum("score"))
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="dark:text-white font-semibold text-gray-900">
                    <th scope="row" colspan="2" class="px-6 py-3 text-base">
                        Total
                    </th>
                    <td class="px-6 py-3">{{ $dataItems->count("id") }}</td>
                    <td class="px-6 py-3">
                        @currency($dataItems->sum(function ($item) {
                            return $item->score;
                        }))
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
