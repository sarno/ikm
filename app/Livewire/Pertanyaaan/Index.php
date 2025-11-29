<?php

namespace App\Livewire\Pertanyaaan;

use App\Models\Pelayanan;
use App\Models\Pertanyaan;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout("layouts.app")]
class Index extends Component
{
    use WithFileUploads;

    public $idPertanyaan;
    public $pelayanan_id;
    public $question;
    public $question_ar;
    public $image;
    public $new_image;
    public $order;

    public $openModalCreate = false;
    public $titleModal = "";
    public $changed = "";
    public $deleteAlerts = false;

    protected $listeners = [
        "editItems" => "editItems",
        "deleteItems" => "deleteItems",
    ];

    #[Computed]
    public function pelayanans()
    {
        return Pelayanan::all();
    }

    public function render()
    {
        $breadcrumbs = [
            ["url" => url("/"), "text" => "Home"],
            ["url" => null, "text" => "Pertanyaan"],
        ];

        return view("livewire.pertanyaaan.index", [
            "pelayanans" => $this->pelayanans,
        ])->layoutData([
            "breadcrumbs" => $breadcrumbs,
        ]);
    }

    public function store()
    {
        $this->validate([
            "pelayanan_id" => "required|exists:pelayanans,id",
            "question" => "required|string|max:255",
            "question_ar" => "nullable|string|max:255",
            "order" => "required|integer",
            "new_image" => "nullable|image|max:1024",
        ]);

        $imagePath = null;
        if ($this->new_image) {
            $imagePath = $this->new_image->store("pertanyaan-images", "public");
        }

        Pertanyaan::create([
            "pelayanan_id" => $this->pelayanan_id,
            "question" => $this->question,
            "question_ar" => $this->question_ar,
            "order" => $this->order,
            "image" => $imagePath,
        ]);

        LivewireAlert::title("Success")
            ->text("Pertanyaan created successfully.")
            ->info()
            ->toast()
            ->position("top-end")
            ->show();
        $this->closeModalCreate();
        $this->dispatch("refreshDatatable");
    }

    public function editItems($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        if (!$pertanyaan) {
            LivewireAlert::title("Error")
                ->text("Pertanyaan not found.")
                ->info()
                ->toast()
                ->position("top-end")
                ->show();
            return;
        }

        $this->idPertanyaan = $pertanyaan->id;
        $this->pelayanan_id = $pertanyaan->pelayanan_id;
        $this->question = $pertanyaan->question;
        $this->question_ar = $pertanyaan->question_ar;
        $this->order = $pertanyaan->order;
        $this->image = $pertanyaan->image;

        $this->openModalCreate = true;
        $this->titleModal = "Edit Pertanyaan";
        $this->changed = "update(" . $id . ")";
    }

    public function update($id)
    {
        $this->validate([
            "pelayanan_id" => "required|exists:pelayanans,id",
            "question" => "required|string|max:255",
            "question_ar" => "nullable|string|max:255",
            "order" => "required|integer",
            "new_image" => "nullable|image|max:1024",
        ]);

        $pertanyaan = Pertanyaan::find($id);
        if (!$pertanyaan) {
            LivewireAlert::title("Error")
                ->text("Pertanyaan not found.")
                ->info()
                ->toast()
                ->position("top-end")
                ->show();
            return;
        }

        $imagePath = $pertanyaan->image;
        if ($this->new_image) {
            if ($pertanyaan->image) {
                \Illuminate\Support\Facades\Storage::disk("public")->delete($pertanyaan->image);
            }
            $imagePath = $this->new_image->store("pertanyaan-images", "public");
        }

        $pertanyaan->update([
            "pelayanan_id" => $this->pelayanan_id,
            "question" => $this->question,
            "question_ar" => $this->question_ar,
            "order" => $this->order,
            "image" => $imagePath,
        ]);

        LivewireAlert::title("Success")
            ->text("Pertanyaan updated successfully.")
            ->info()
            ->toast()
            ->position("top-end")
            ->show();
        $this->closeModalCreate();
        $this->dispatch("refreshDatatable");
    }

    public function deleteItems($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        $this->question = $pertanyaan ? $pertanyaan->question : "Not found";
        $this->idPertanyaan = $id;
        $this->deleteAlerts = true;
    }

    public function submitDelete($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        if (!$pertanyaan) {
            LivewireAlert::title("Error")
                ->text("Pertanyaan not found.")
                ->info()
                ->toast()
                ->position("top-end")
                ->show();
            return;
        }

        if ($pertanyaan->image) {
            \Illuminate\Support\Facades\Storage::disk("public")->delete($pertanyaan->image);
        }
        
        $pertanyaan->delete();
        $this->dispatch("refreshDatatable");
        LivewireAlert::title("Success")
            ->text("Pertanyaan deleted successfully.")
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