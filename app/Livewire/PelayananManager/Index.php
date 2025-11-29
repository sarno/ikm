<?php

namespace App\Livewire\PelayananManager;

use App\Models\Pelayanan;
use App\Models\SettingWeb;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class Index extends Component
{
    public $idPelayanan;

    public $instansi_id;

    public $name;

    public $name_ar;

    public $description;

    public $logo;

    public $new_logo; // Added new_logo property

    use WithFileUploads;

    public $openModalCreate = false;

    public $titleModal = '';

    public $changed = '';

    public $deleteAlerts = false;

    protected $listeners = [
        'editItems' => 'editItems',
        'deleteItems' => 'deleteItems',
    ];

    #[Computed]
    public function instansis()
    {
        return SettingWeb::all();
    }

    public function render()
    {
        $breadcrumbs = [
            ['url' => 'dashboard', 'text' => 'Home'],
            ['url' => null, 'text' => 'Pelayanan'],
        ];

        return view('livewire.pelayanan-manager.index', [
            'instansis' => $this->instansis,
        ])->layoutData([
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function store()
    {
        $this->validate([
            'instansi_id' => 'required|exists:setting_webs,id',
            'name' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description' => 'nullable|string',
            'new_logo' => 'nullable|image|max:1024', // 1MB Max
        ]);

        $logoPath = null;
        if ($this->new_logo) {
            $logoPath = $this->new_logo->store('pelayanan-logos', 'public');
        }

        Pelayanan::create([
            'instansi_id' => $this->instansi_id,
            'name' => $this->name,
            'name_ar' => $this->name_ar,
            'description' => $this->description,
            'logo' => $logoPath,
        ]);

        LivewireAlert::title('Success')
            ->text('Pelayanan created successfully!')
            ->info()
            ->toast()
            ->position('top-end')
            ->show();

        $this->closeModalCreate();
        $this->dispatch('refreshDatatable');
    }

    public function deleteItems($id)
    {
        $this->deleteAlerts = true;
        $getDetail = Pelayanan::find($id);
        $this->name = $getDetail->name;
        $this->idPelayanan = $id;
    }

    public function editItems($id)
    {
        $pelayanan = Pelayanan::find($id);

        if (! $pelayanan) {
            LivewireAlert::title('Error')
                ->text('Pelayanan not found.')
                ->info()
                ->toast()
                ->position('top-end')
                ->show();

            return;
        }

        $this->instansi_id = $pelayanan->instansi_id;
        $this->name = $pelayanan->name;
        $this->name_ar = $pelayanan->name_ar;
        $this->description = $pelayanan->description;
        $this->logo = $pelayanan->logo; // Current logo path

        $this->openModalCreate = true;
        $this->titleModal = 'Edit Pelayanan';
        $this->changed = 'update('.$id.')'; // Assuming an update method named update will be created
    }

    public function update($id)
    {
        $this->validate([
            'instansi_id' => 'required|exists:setting_webs,id',
            'name' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description' => 'nullable|string',
            'new_logo' => 'nullable|image|max:1024', // 1MB Max
        ]);

        $pelayanan = Pelayanan::find($id);

        if (! $pelayanan) {
            LivewireAlert::title('Error')
                ->text('Pelayanan not found.')
                ->info()
                ->toast()
                ->position('top-end')
                ->show();

            return;
        }

        $logoPath = $pelayanan->logo;
        if ($this->new_logo) {
            if ($pelayanan->logo) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete(
                    $pelayanan->logo,
                );
            }
            $logoPath = $this->new_logo->store('pelayanan-logos', 'public');
        }

        $pelayanan->update([
            'instansi_id' => $this->instansi_id,
            'name' => $this->name,
            'name_ar' => $this->name_ar,
            'description' => $this->description,
            'logo' => $logoPath,
        ]);

        LivewireAlert::title('Success')
            ->text('Pelayanan updated successfully!')
            ->info()
            ->toast()
            ->position('top-end')
            ->show();

        $this->closeModalCreate();
        $this->dispatch('refreshDatatable');
    }

    public function closeModalCreate()
    {
        $this->openModalCreate = false;
        $this->reset();
    }

    public function submitDelete($id)
    {
        $getDetail = Pelayanan::find($id);
        $getDetail->delete();
        $this->dispatch('refreshDatatable');
        LivewireAlert::title('Success')
            ->text('Pelayanan deleted successfully!')
            ->info()
            ->toast()
            ->position('top-end')
            ->show();

        $this->reset();

        // $checkTrx = $getDetail->produk()->count();

        // if ($checkTrx == 0) {
        //     $getDetail->delete();
        //     $this->dispatch("refreshDatatable");

        //     LivewireAlert::title("Success")
        //         ->text("Pelayanan deleted successfully!")
        //         ->info()
        //         ->toast()
        //         ->position("top-end")
        //         ->show();

        //     $this->reset();
        // } else {
        //     $this->dispatch("refreshDatatable");

        //     LivewireAlert::title("Error")
        //         ->text("Cannot delete pelayanan with existing products.")
        //         ->info()
        //         ->toast()
        //         ->position("top-end")
        //         ->show();

        //     $this->reset();
        // }
    }

    public function closedeleteAlerts()
    {
        $this->deleteAlerts = false;
        $this->reset();
    }
}
