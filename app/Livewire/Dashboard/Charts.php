<?php

namespace App\Livewire\Dashboard;

use App\Models\Order\Dts;
use App\Models\Order\Hds;
use App\Models\Pelayanan;
use Carbon\Carbon;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class Charts extends Component
{
    public $chartDate;

    public $dateRange = [];

    public $total = [];

    public $laba = [];

    protected $listeners = ["refreshChart" => "refreshChart"];

    public function refreshChart($newChartDate)
    {
        $this->chartDate = $newChartDate;

        [$start, $end] = explode("/", $newChartDate);

        $start = Carbon::parse($start);
        $end = Carbon::parse($end);

        // Generate date range
        $this->dateRange = [];
        foreach (
            new \DatePeriod(
                $start,
                new \DateInterval("P1D"),
                $end->copy()->addDay(),
            )
            as $d
        ) {
            $this->dateRange[] = $d->format("Y-m-d");
        }

        // Ambil semua pelayanan
        $pelayanans = Pelayanan::with("respondens")->get();

        $this->datasets = [];

        foreach ($pelayanans as $p) {
            $dataPerTanggal = [];

            foreach ($this->dateRange as $date) {
                $respondens = $p
                    ->respondens()
                    ->whereDate("tanggal_survey", $date)
                    ->get();

                $X = $respondens->sum("total_nilai");
                $Y = $respondens->count();

                if ($Y > 0) {
                    $Z = $X / 10 / $Y;
                    $N = (100 / 4) * $Z;
                    $hasil = round($N, 2);
                } else {
                    $hasil = 0;
                }

                $dataPerTanggal[] = $hasil;
            }

            $this->datasets[] = [
                "label" => $p->name,
                "data" => $dataPerTanggal,
            ];
        }

        $this->dispatch(
            "updatePelayananDailyChart",
            dateRange: $this->dateRange,
            datasets: $this->datasets,
        );
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

    public function render()
    {
        return view("livewire.dashboard.charts", [
            "dateRange" => $this->dateRange ?? [],
            "datasets" => $this->datasets ?? [],
        ]);
    }
}
