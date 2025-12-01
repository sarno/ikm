<?php

namespace App\Livewire\Dashboard;

use App\Models\Jawaban;
use App\Models\Pelayanan;
use App\Models\Responden;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("layouts.app")]
class Index extends Component
{
    public $search;

    public $dateSelect;

    public $chartDate;

    protected $listeners = [
        "handleDateSelectUpdate" => "handleDateSelectUpdate",
    ];

    // mount
    public function mount()
    {
        $this->search = date("Y-m-d") . "/" . date("Y-m-d");
        $this->dateSelect = date("Y-m-d") . "/" . date("Y-m-d");
        $this->chartDate = date("Y-m-d") . "/" . date("Y-m-d");
        $this->dispatch(
            "handleDateSelectUpdate",
            $startDate = date("Y-m-d"),
            $endDate = date("Y-m-d"),
        );
    }

    public function updatedDateSelect()
    {
        $this->dispatch("refreshComponent", $this->dateSelect);
    }

    public function handleDateSelectUpdate($startDate, $endDate)
    {
        $this->chartDate = $startDate . "/" . $endDate;
        $this->dispatch("refreshChart", $this->chartDate);
    }

    public function render()
    {
        $explode = explode("/", $this->search);
        $startDate = $explode[0] . " 00:00:00";
        $endDate = $explode[1] . " 23:59:59";

        $transaksi = Responden::whereBetween("tanggal_survey", [
            $startDate,
            $endDate,
        ])->get();

        $pelayanans = Pelayanan::with([
            "respondens" => function ($query) use ($startDate, $endDate) {
                $query->whereBetween("tanggal_survey", [$startDate, $endDate]);
            },
        ])->get();

        $pelayananTotals = $pelayanans->map(function ($pelayanan) {
            $X = $pelayanan->respondens->sum("total_nilai"); // total nilai
            $Y = $pelayanan->respondens->count(); // jumlah responden

            // Jika tidak ada responden, hindari pembagian nol
            if ($Y == 0) {
                return [
                    "name" => $pelayanan->name,
                    "total_nilai" => 0,
                    "jumlah_responden" => 0,
                    "z" => 0,
                    "n_persen" => 0,
                ];
            }

            $Z = $X / 10 / $Y; // nilai skala 1–4
            $N = (100 / 4) * $Z; // konversi ke persen

            return [
                "name" => $pelayanan->name,
                "total_nilai" => $X,
                "jumlah_responden" => $Y,
                "z" => round($Z, 2),
                "n_persen" => round($N, 0), // dalam persen
            ];
        });

        $jawabans = Jawaban::whereHas("responden", function ($query) use (
            $startDate,
            $endDate,
        ) {
            $query->whereBetween("tanggal_survey", [$startDate, $endDate]);
        })
            ->with("pertanyaan")
            ->get();

        $questionScores = $jawabans
            ->groupBy("pertanyaan_id")
            ->map(function ($group) {
                $question = $group->first()->pertanyaan; // Get the question model instance
                $totalScore = $group->sum("score");
                $answerCount = $group->count();

                if ($answerCount == 0) {
                    return [
                        "question" => $question
                            ? $question->question
                            : "Unknown Question",
                        "percentage" => 0,
                    ];
                }

                $averageScore = $totalScore / $answerCount;
                // Assuming max score is 4, as seen in pelayananTotals calc
                $percentage = ($averageScore / 4) * 100;

                return [
                    "question" => $question
                        ? $question->question
                        : "Unknown Question",
                    "percentage" => round($percentage, 0),
                ];
            });

        $questionLabels = $questionScores->pluck("question");
        $questionPercentages = $questionScores->pluck("percentage");

        return view("livewire.dashboard.index", [
            "transaksi" => $transaksi,
            "pelayananTotals" => $pelayananTotals,
            "questionLabels" => $questionLabels,
            "questionPercentages" => $questionPercentages,
        ]);
    }
}
