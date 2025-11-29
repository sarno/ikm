<?php

namespace App\Livewire\Laporan\Ikm;

use App\Models\Responden;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class GroupingResponden extends Component
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

        $this->dataItems = Responden::with(['jawaban.pertanyaan'])
            ->whereBetween('tanggal_survey', [
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
            )
            ->get();
    }

    public function render()
    {
        return view('livewire.laporan.ikm.grouping-responden');
    }
}
