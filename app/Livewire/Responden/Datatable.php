<?php

namespace App\Livewire\Responden;

use App\Models\Responden;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent; // Import User model for relationship
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter; // Import SelectFilter

class Datatable extends DataTableComponent
{
    protected $model = Responden::class;

    // Initialize public filters property
    public array $filters = [
        'User' => null, // The key 'User' matches the filter name
        'Usia' => null,
        'Gender' => null,
    ];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function filters(): array
    {
        // Get all Users for filter options
        $userOptions = User::pluck('name', 'id')->toArray();
        $usiaOptions = Responden::distinct()->pluck('usia', 'usia')->toArray();
        $genderOptions = [
            'laki-laki' => 'Laki-laki',
            'perempuan' => 'Perempuan',
        ];

        return [
            SelectFilter::make('User', 'user_id')
                ->options(
                    [
                        '' => 'All',
                    ] + $userOptions,
                )
                ->filter(function (Builder $builder, $value): void {
                    if ($value !== '') {
                        $builder->where('user_id', $value);
                    }
                }),

            SelectFilter::make('Usia', 'usia')
                ->options(
                    [
                        '' => 'All',
                    ] + $usiaOptions,
                )
                ->filter(function (Builder $builder, $value): void {
                    if ($value !== '') {
                        $builder->where('usia', $value);
                    }
                }),

            SelectFilter::make('Gender', 'gender')
                ->options(
                    [
                        '' => 'All',
                    ] + $genderOptions,
                )
                ->filter(function (Builder $builder, $value): void {
                    if ($value !== '') {
                        $builder->where('gender', $value);
                    }
                }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->sortable(),
            Column::make('Tanggal Survey', 'tanggal_survey')->sortable(),
            Column::make('Nama Responden', 'nama')->sortable()->searchable(),
            Column::make('Usia', 'usia')->sortable(),
            Column::make('Gender', 'gender')->sortable(),
            Column::make('Phone', 'phone')->sortable()->searchable(),
            Column::make('Language', 'language')->sortable()->searchable(),
            Column::make('Total Nilai', 'total_nilai')->sortable(),
            Column::make('User', 'user.name')->sortable()->searchable(),
            Column::make('Ditambahkan', 'created_at')->sortable(),
            Column::make('Diperbarui', 'updated_at')->sortable(),
            Column::make('Aksi')
                ->label(function ($row, Column $column) {
                    return '<button class="text-white bg-[#F7BE38] hover:bg-[#F7BE38]/90 focus:ring-4 focus:outline-none focus:ring-[#F7BE38]/50 font-medium rounded-lg text-sm p-2 text-center inline-flex items-center dark:focus:ring-[#F7BE38]/50 me-2" wire:click="edit('.
                        $row->id.
                        ')"><svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 0 0 1 2.852 0Z"/>
                    </svg>
                    </button>
                    <button class="focus:outline-none text-white bg-red-500 hover:bg-red-400 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm p-2 me-2 dark:focus:ring-yellow-900" wire:click="delete('.
                        $row->id.
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
        return Responden::query()->with('user');
        // ->when(isset($this->filters['User']) && $this->filters['User'] !== '', function ($query) {
        //     $query->where('user_id', $this->filters['User']);
        // })
        // ->when(isset($this->filters['Usia']) && $this->filters['Usia'] !== '', function ($query) {
        //     $query->where('usia', $this->filters['Usia']);
        // })
        // ->when(isset($this->filters['Gender']) && $this->filters['Gender'] !== '', function ($query) {
        //     $query->where('gender', $this->filters['Gender']);
        // });
    }

    public function delete($id)
    {
        $this->dispatch('deleteItems', $id);
    }

    public function edit($id)
    {
        $this->dispatch('editItems', $id);
    }
}
