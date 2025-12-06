<?php

namespace App\Livewire\Laporan\Ikm;

use App\Models\Jawaban;
use Livewire\Component;

class GroupingQuestion extends Component
{
    public $startDate;

    public $endDate;

    public $pelayananMethod;

    public $userId;

    public $dataItems;

    // mount
    public function mount($startDate, $endDate, $pelayananMethod, $userId)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->pelayananMethod = $pelayananMethod;
        $this->userId = $userId;
        $this->dataItems = Jawaban::whereHas('responden', function ($q): void {
            $q->whereBetween('tanggal_survey', [
                $this->startDate.' 00:00:00',
                $this->endDate.' 23:59:59',
            ])
                ->when(
                    $this->pelayananMethod != 'All',
                    fn ($query) => $query->where(
                        'pelayanan_id',
                        $this->pelayananMethod,
                    ),
                )
                ->when(
                    $this->userId != 'All',
                    fn ($query) => $query->where('user_id', $this->userId),
                );
        })->get();
    }

    public function render()
    {
        return view('livewire.laporan.ikm.grouping-question');
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
