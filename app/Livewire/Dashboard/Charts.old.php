<?php

namespace App\Livewire\Dashboard;

use App\Models\Pelayanan;
use App\Models\Responden;
use Carbon\Carbon;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class Charts extends Component
{
    public $chartDate;

    public $dateRange = [];
    public $datasets = [];

    protected $listeners = ["refreshChart" => "refreshChart"];

    public function refreshChart($newChartDate)
    {
        $this->chartDate = $newChartDate;

        $explode = explode("/", $this->chartDate);
        if (count($explode) !== 2) {
            return;
        }

        $startDate = Carbon::createFromFormat(
            "Y-m-d",
            trim($explode[0]),
        )->startOfDay();
        $endDate = Carbon::createFromFormat(
            "Y-m-d",
            trim($explode[1]),
        )->endOfDay();

        // ------------------------------
        // 1. Generate Date Range
        // ------------------------------
        $this->dateRange = [];
        foreach (
            new \DatePeriod(
                $startDate,
                \DateInterval::createFromDateString("1 day"),
                $endDate->copy()->addDay(),
            )
            as $date
        ) {
            $this->dateRange[] = $date->format("Y-m-d");
        }

        // ------------------------------
        // 2. Ambil semua Pelayanan
        // ------------------------------
        $pelayanans = Pelayanan::first()->get();

        // Untuk Chart.js
        $datasets = [];

        // ------------------------------
        // 3. Loop per pelayanan
        // ------------------------------
        foreach ($pelayanans as $pelayanan) {
            $values = [];

            // --------------------------
            // 4. Hitung nilai per hari
            // --------------------------
            foreach ($this->dateRange as $date) {
                $respondens = $pelayanan
                    ->respondens()
                    ->whereDate("tanggal_survey", $date)
                    ->get();

                $X = $respondens->sum("total_nilai"); // total nilai
                $Y = $respondens->count(); // jumlah responden

                $hasil = 0;

                if ($Y > 0) {
                    $Z = $X / 10 / $Y; // skala 1–4
                    $N = (100 / 4) * $Z; // konversi (%) 0–100
                    $hasil = round($N, 2);
                }

                $values[] = $hasil;
            }

            // Tambah dataset untuk Chart.js
            $datasets[] = [
                "label" => $pelayanan->name,
                "data" => $values,
            ];
        }

        // ------------------------------
        // 5. Kirim ke front-end Chart.js
        // ------------------------------
        $this->dispatch(
            "updatePelayananDailyChart",
            dateRange: $this->dateRange,
            datasets: $datasets,
        );
    }
    public function render()
    {
        return view("livewire.dashboard.charts", [
            "dateRange" => $this->dateRange ?? [],
            "datasets" => $this->datasets ?? [],
        ]);
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div class="flex justify-center items-center bg-white rounded-md p-5">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 200 200"><circle fill="none" stroke-opacity="1" stroke="#FF156D" stroke-width=".5" cx="100" cy="100" r="0"><animate attributeName="r" calcMode="spline" dur="2" values="1;80" keyTimes="0;1" keySplines="0 .2 .5 1" repeatCount="indefinite"></animate><animate attributeName="stroke-width" calcMode="spline" dur="2" values="0;25" keyTimes="0;1" keySplines="0 .2 .5 1" repeatCount="indefinite"></animate><animate attributeName="stroke-opacity" calcMode="spline" dur="2" values="1;0" keyTimes="0;1" keySplines="0 .2 .5 1" repeatCount="indefinite"></animate></circle></svg>
        <p class="text-center text-gray-500">Mohon tunggu...</p>
        </div>

        HTML;
    }
}
