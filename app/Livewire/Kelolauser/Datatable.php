<?php

namespace App\Livewire\Kelolauser;

use App\Models\User;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class Datatable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->hideIf(true)->sortable(),
            Column::make('Name', 'name')->searchable()->sortable(),
            Column::make('Email', 'email')->searchable()->sortable(),
            Column::make('Role', 'currentTeam.name')->searchable()->sortable(),
            BooleanColumn::make('Status', 'flag')->sortable()->searchable(),
            Column::make('Ditambahkan', 'created_at')->sortable(),
            Column::make('Terakhir diperbaharui', 'updated_at')->sortable(),
            Column::make('Actions')
                ->label(function ($row, Column $column) {
                    // Use wire:click to directly invoke the parent method without $parent or $wire.$parent
                    return '<button class="text-white bg-[#F7BE38] hover:bg-[#F7BE38]/90 focus:ring-4 focus:outline-none focus:ring-[#F7BE38]/50 font-medium rounded-lg text-sm p-2 text-center inline-flex items-center dark:focus:ring-[#F7BE38]/50 me-2" wire:click="edit('.
                        $row->id.
                        ')"><svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                    </svg>
                    </button>
                      <button class="focus:outline-none text-white bg-green-500 hover:bg-green-400 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm p-2 me-2 dark:focus:ring-yellow-900" wire:click="changepassword('.
                        $row->id.
                        ')"><svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
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

    public function edit($id)
    {
        $this->dispatch('editItems', $id);
    }

    public function changepassword($id)
    {
        $this->dispatch('changePassword', $id);
    }

    public function delete($id)
    {
        $this->dispatch('deleteItems', $id);
    }
}
