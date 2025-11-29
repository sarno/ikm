<html>
    <head>
        <style>
            body {
                font-family: sans-serif;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                font-size: 12px;
            }
            th,
            td {
                border: 1px solid #000;
                padding: 6px;
            }
            th {
                background: #eee;
            }
        </style>
    </head>
    <body>
        <h3 style="text-align: center">Laporan Pengelompokan Responden IKM</h3>
        <p>Periode: {{ $startDate }} s/d {{ $endDate }}</p>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Responden</th>
                    @for ($i = 1; $i <= 10; $i++)
                        <th>
                            {{ $i }}
                        </th>
                    @endfor

                    <th>Nilai</th>
                </tr>
                <tr>
                    {{-- Baris header kosong bawah nomor --}}
                    @for ($i = 1; $i <= 13; $i++)
                        <th></th>
                    @endfor
                </tr>
            </thead>

            <tbody>
                @foreach ($items as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama }}</td>

                        @for ($i = 1; $i <= 10; $i++)
                            @php
                                $nilai = $item->jawaban[$i - 1]->score ?? "";
                            @endphp

                            <td>{{ $nilai }}</td>
                        @endfor

                        <td>{{ $item->total_nilai }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" style="text-align: right">
                        <strong>Total Nilai Keseluruhan</strong>
                    </td>

                    @for ($i = 1; $i <= 10; $i++)
                        @php
                            $totalPerKolom = $items
                                ->map(function ($item) use ($i) {
                                    return $item->jawaban->where("pertanyaan_id", $i)->first()->score ?? 0;
                                })
                                ->sum();
                        @endphp

                        <td class="border border-black text-center">
                            {{ $totalPerKolom }}
                        </td>
                    @endfor

                    <td>
                        <strong>
                            {{ $items->sum("total_nilai") }}
                        </strong>
                    </td>
                </tr>
            </tfoot>
        </table>
        @php
            $X = $items->sum("total_nilai");
            $Y = $items->count();
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
    </body>
</html>
