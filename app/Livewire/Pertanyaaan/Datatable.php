<?php

namespace App\Livewire\Pertanyaaan;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Pertanyaan;
use App\Models\Pelayanan; // Import Pelayanan model for relationship
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter; // Import SelectFilter

class Datatable extends DataTableComponent
{
    protected $model = Pertanyaan::class;

    public function configure(): void
    {
        $this->setPrimaryKey("id");
    }

    // Add filters method
    public function filters(): array
    {
        // Get all Pelayanan for filter options
        $pelayananOptions = Pelayanan::pluck("name", "id")->toArray();

        return [
            SelectFilter::make("Pelayanan", "pelayanan_id")
                ->options(
                    [
                        "" => "All",
                    ] + $pelayananOptions,
                )
                ->filter(function (Builder $builder, $value) {
                    if ($value !== "") {
                        $builder->where("pelayanan_id", $value);
                    }
                }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")->sortable(),
            Column::make("Pelayanan", "pelayanan.name")
                ->sortable()
                ->searchable(),
            Column::make("Pertanyaan", "question")->sortable()->searchable(),
            Column::make("Pertanyaan - Arabic", "question_ar")
                ->sortable()
                ->searchable(),
            Column::make("Order", "order")->sortable(),
            Column::make("Gambar")
                ->label(function ($row) {
                    if ($row->image) {
                        return '<img src="' .
                            asset("storage/" . $row->image) .
                            '" class="h-10 w-10 object-cover rounded-full">';
                    }
                    return "No Image";
                })
                ->html(),
            Column::make("Ditambahkan", "created_at")->sortable(),
            Column::make("Diperbarui", "updated_at")->sortable(),
            Column::make("Aksi")
                ->label(function ($row, Column $column) {
                    return '<button class="text-white bg-[#F7BE38] hover:bg-[#F7BE38]/90 focus:ring-4 focus:outline-none focus:ring-[#F7BE38]/50 font-medium rounded-lg text-sm p-2 text-center inline-flex items-center dark:focus:ring-[#F7BE38]/50 me-2" wire:click="edit(' .
                        $row->id .
                        ')"><svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 0 0 1 2.852 0Z"/>
                    </svg>
                    </button>
                    <button class="focus:outline-none text-white bg-red-500 hover:bg-red-400 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm p-2 me-2 dark:focus:ring-yellow-900" wire:click="delete(' .
                        $row->id .
                        ')"><svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                    </svg>
                    </button>';
                })
                ->html(),
        ];
    }

    public function builder(): Builder
    {
        return Pertanyaan::query()->with("pelayanan");
    }

    public function delete($id)
    {
        $this->dispatch("deleteItems", $id);
    }

    public function edit($id)
    {
        $this->dispatch("editItems", $id);
    }
}
