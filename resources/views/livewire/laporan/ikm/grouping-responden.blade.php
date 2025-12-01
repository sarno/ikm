<div class="mt-10">
    <div class="relative overflow-x-auto">
        <table
            class="dark:text-gray-400 w-full text-left text-sm text-gray-500 rtl:text-right"
        >
            <thead class="bg-gray-100 text-center font-bold">
                <tr>
                    <th rowspan="2" class="border border-black px-2 py-1 w-50">
                        No
                    </th>

                    <th rowspan="2" class="border border-black px-2 py-1 w-50">
                        Responden
                    </th>

                    {{-- Kolom nomor pertanyaan 1–10 --}}
                    @for ($i = 1; $i <= 10; $i++)
                        <th class="border border-black px-2 py-1 w-10">
                            {{ $i }}
                        </th>
                    @endfor

                    <th rowspan="2" class="border border-black px-2 py-1 w-24">
                        NILAI JAWABAN
                    </th>
                </tr>

                <tr>
                    {{-- Baris header kosong bawah nomor --}}
                    @for ($i = 1; $i <= 10; $i++)
                        <th class="border border-black px-2 py-1"></th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @foreach ($dataItems as $index => $item)
                    <tr>
                        <td class="border border-black text-left font-bold">
                            {{ $index + 1 }}
                        </td>
                        {{-- Nomor responden R --}}
                        <td class="border border-black text-left font-bold">
                            {{ $item->nama }}
                        </td>

                        {{-- Jawaban 1–10 --}}
                        @for ($i = 1; $i <= 10; $i++)
                            @php
                                $nilai = $item->jawaban[$i - 1]->score ?? "";
                            @endphp

                            <td
                                class="border border-black text-center px-2 py-1"
                            >
                                {{ $nilai }}
                            </td>
                        @endfor

                        {{-- Total nilai per responden --}}
                        <td class="border border-black text-center font-bold">
                            {{ $item->total_nilai }}
                        </td>
                    </tr>
                @endforeach

                {{-- BARIS JUMLAH --}}
                <tr class="bg-gray-200 font-bold">
                    <td class="border border-black text-center">JUMLAH</td>
                    <td class="border border-black text-center"></td>

                    @for ($i = 1; $i <= 10; $i++)
                        @php
                            $totalPerKolom = $dataItems
                                ->map(function ($item) use ($i) {
                                    return $item->jawaban->where("pertanyaan_id", $i)->first()->score ?? 0;
                                })
                                ->sum();
                        @endphp

                        <td class="border border-black text-center">
                            {{ $totalPerKolom }}
                        </td>
                    @endfor

                    {{-- Grand total X --}}
                    <td class="border border-black text-center font-bold">
                        {{ $dataItems->sum("total_nilai") }}
                    </td>
                </tr>
            </tbody>
            <tfoot>
                {{-- Grand total removed as it's now per respondent --}}
            </tfoot>
        </table>
        @php
            $X = $dataItems->sum("total_nilai");
            $Y = $dataItems->count();
            $Z = $X / 10 / $Y;
            $N = (100 / 4) * $Z; // dalam persen
        @endphp

        <div class="mt-6 text-sm">
            <p>
                <strong>X</strong>
                = {{ $X }}
            </p>
            <p>
                <strong>Y</strong>
                = {{ $Y }}
            </p>
            <p>
                <strong>Z</strong>
                = ({{ $X }} ÷ 10) ÷ {{ $Y }} =
                <strong>{{ number_format($Z, 2) }}</strong>
            </p>

            <p class="mt-3">
                <strong>N</strong>
                = (100% ÷ 4) × {{ number_format($Z, 2) }} =
                <strong>{{ number_format($N, 0) }}%</strong>
            </p>

            <p class="mt-4 font-bold text-gray-700">
                Nilai kepuasan masyarakat dari {{ $Y }} responden adalah
                <strong>{{ number_format($Z, 1) }}</strong>
                dari skala 4 atau setara dengan
                <strong>{{ number_format($N, 0) }}%</strong>
                .
            </p>
        </div>
    </div>
</div>
