<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GroupingRespondenExport implements FromView
{
    public $items;
    public $startDate;
    public $endDate;

    public function __construct($items, $startDate, $endDate)
    {
        $this->items = $items;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function view(): View
    {
        return view("exports.ikm.excel-grouping-responden", [
            "items" => $this->items,
            "startDate" => $this->startDate,
            "endDate" => $this->endDate,
        ]);
    }
}
