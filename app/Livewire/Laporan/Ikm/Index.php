<?php

namespace App\Livewire\Laporan\Ikm;

use App\Exports\GroupingRespondenExport;
use App\Models\Pelayanan;
use App\Models\Pertanyaan;
use App\Models\Responden;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

#[Layout("layouts.app")]
class Index extends Component
{
    public $startDate;

    public $endDate;

    public $selectedPelayanan = "All";

    public $pelayananCategories;

    public $userId = "All";

    public $pertanyaans;

    public $users;

    //mount
    public function mount()
    {
        $this->startDate = now()->startOfMonth()->toDateString();
        $this->endDate = now()->endOfMonth()->toDateString();

        $this->pelayananCategories = Pelayanan::all();

        $this->users = User::all();

        $this->pertanyaans = Pertanyaan::orderBy("id", "asc")->get();
    }

    public function render()
    {
        $breadcrumbs = [
            ["url" => "dashboard", "text" => "Home"],
            ["url" => null, "text" => "Laporan IKM"],
        ];

        return view("livewire.laporan.ikm.index")->layoutData([
            "breadcrumbs" => $breadcrumbs,
        ]);
    }

    public function downloadPdf()
    {
        $dataItems = Responden::with(["jawaban.pertanyaan"])
            ->whereBetween("tanggal_survey", [
                $this->startDate . " 00:00:00",
                $this->endDate . " 23:59:59",
            ])
            ->when(
                $this->selectedPelayanan != "All",
                fn($query) => $query->where(
                    "pelayanan_id",
                    $this->selectedPelayanan,
                ),
            )
            ->when(
                $this->userId != "All",
                fn($query) => $query->where("user_id", $this->userId),
            )
            ->get();

        $data = [
            "items" => $dataItems,
            "startDate" => $this->startDate,
            "endDate" => $this->endDate,
        ];

        $pdf = Pdf::loadView(
            "exports.ikm.pdf-grouping-responden",
            $data,
        )->setPaper("a4", "portrait");

        return response()->streamDownload(
            fn() => print $pdf->output(),
            "Laporan-IKM-{$this->startDate}-{$this->endDate}.pdf",
        );
    }

    public function downloadExcel()
    {
        $dataItems = Responden::with(["jawaban.pertanyaan"])
            ->whereBetween("tanggal_survey", [
                $this->startDate . " 00:00:00",
                $this->endDate . " 23:59:59",
            ])
            ->when(
                $this->selectedPelayanan != "All",
                fn($query) => $query->where(
                    "pelayanan_id",
                    $this->selectedPelayanan,
                ),
            )
            ->when(
                $this->userId != "All",
                fn($query) => $query->where("user_id", $this->userId),
            )
            ->get();

        return Excel::download(
            new GroupingRespondenExport(
                $dataItems,
                $this->startDate,
                $this->endDate,
            ),
            "Laporan-IKM-{$this->startDate}-{$this->endDate}.xlsx",
        );
    }
}
