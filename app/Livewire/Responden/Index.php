<?php

namespace App\Livewire\Responden;

use App\Models\Responden;
use App\Models\User;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Carbon\Carbon; // Import Carbon

#[Layout("layouts.app")]
class Index extends Component
{
    public $idResponden;
    public $tanggal_survey;
    public $nama;
    public $usia;
    public $gender;
    public $phone;
    public $language;
    public $user_id;
    public $total_nilai;

    public $openModalCreate = false;
    public $titleModal = "";
    public $changed = "";
    public $deleteAlerts = false;

    protected $listeners = [
        "editItems" => "editItems",
        "deleteItems" => "deleteItems",
    ];

    #[Computed]
    public function users()
    {
        return User::all();
    }

    public function render()
    {
        $breadcrumbs = [
            ["url" => url("/"), "text" => "Home"],
            ["url" => null, "text" => "Responden"],
        ];

        return view("livewire.responden.index", [
            "users" => $this->users,
        ])->layoutData([
            "breadcrumbs" => $breadcrumbs,
        ]);
    }

    public function store()
    {
        $this->validate([
            "tanggal_survey" => "required|date",
            "nama" => "required|string|max:255",
            "usia" => "required|in:<17,18-25,26-30,31-40,>40",
            "gender" => "required|in:laki-laki,perempuan",
            "phone" => "nullable|string|max:255",
            "language" => "nullable|string|max:255",
            "user_id" => "required|exists:users,id",
            "total_nilai" => "nullable|integer", // Added validation
        ]);

        Responden::create([
            "tanggal_survey" => $this->tanggal_survey,
            "nama" => $this->nama,
            "usia" => $this->usia,
            "gender" => $this->gender,
            "phone" => $this->phone,
            "language" => $this->language,
            "user_id" => $this->user_id,
            "total_nilai" => $this->total_nilai, // Added to create
        ]);

        LivewireAlert::title("Success")
            ->text("Responden created successfully.")
            ->info()
            ->toast()
            ->position("top-end")
            ->show();
        $this->closeModalCreate();
        $this->dispatch("refreshDatatable");
    }

    public function editItems($id)
    {
        $responden = Responden::find($id);
        if (!$responden) {
            LivewireAlert::title("Error")
                ->text("Responden not found.")
                ->info()
                ->toast()
                ->position("top-end")
                ->show();
            return;
        }

        $this->idResponden = $responden->id;
        $this->tanggal_survey = Carbon::parse($responden->tanggal_survey)->format("Y-m-d"); // Explicitly parse
        $this->nama = $responden->nama;
        $this->usia = $responden->usia;
        $this->gender = $responden->gender;
        $this->phone = $responden->phone;
        $this->language = $responden->language;
        $this->user_id = $responden->user_id;
        $this->total_nilai = $responden->total_nilai; // Added to editItems

        $this->openModalCreate = true;
        $this->titleModal = "Edit Responden";
        $this->changed = "update(" . $id . ")";
    }

    public function update($id)
    {
        $this->validate([
            "tanggal_survey" => "required|date",
            "nama" => "required|string|max:255",
            "usia" => "required|in:<17,18-25,26-30,31-40,>40",
            "gender" => "required|in:laki-laki,perempuan",
            "phone" => "nullable|string|max:255",
            "language" => "nullable|string|max:255",
            "user_id" => "required|exists:users,id",
            "total_nilai" => "nullable|integer", // Added validation
        ]);

        $responden = Responden::find($id);
        if (!$responden) {
            LivewireAlert::title("Error")
                ->text("Responden not found.")
                ->info()
                ->toast()
                ->position("top-end")
                ->show();
            return;
        }

        $responden->update([
            "tanggal_survey" => $this->tanggal_survey,
            "nama" => $this->nama,
            "usia" => $this->usia,
            "gender" => $this->gender,
            "phone" => $this->phone,
            "language" => $this->language,
            "user_id" => $this->user_id,
            "total_nilai" => $this->total_nilai, // Added to update
        ]);

        LivewireAlert::title("Success")
            ->text("Responden updated successfully.")
            ->info()
            ->toast()
            ->position("top-end")
            ->show();
        $this->closeModalCreate();
        $this->dispatch("refreshDatatable");
    }

    public function deleteItems($id)
    {
        $responden = Responden::find($id);
        $this->nama = $responden ? $responden->nama : "Not found";
        $this->idResponden = $id;
        $this->deleteAlerts = true;
    }

    public function submitDelete($id)
    {
        $responden = Responden::find($id);
        if (!$responden) {
            LivewireAlert::title("Error")
                ->text("Responden not found.")
                ->info()
                ->toast()
                ->position("top-end")
                ->show();
            return;
        }

        // Responden has many Jawabans, they will be deleted by cascade if DB is set up,
        // otherwise, you would delete them manually here.
        // $responden->jawaban()->delete();
        
        $responden->delete();
        $this->dispatch("refreshDatatable");
        LivewireAlert::title("Success")
            ->text("Responden deleted successfully.")
            ->info()
            ->toast()
            ->position("top-end")
            ->show();
        $this->reset();
    }

    public function closeModalCreate()
    {
        $this->openModalCreate = false;
        $this->reset();
    }

    public function closedeleteAlerts()
    {
        $this->deleteAlerts = false;
        $this->reset();
    }
}

