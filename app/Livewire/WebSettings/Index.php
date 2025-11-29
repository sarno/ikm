<?php

namespace App\Livewire\WebSettings;

use App\Models\SettingWeb;
use Jantinnerezo\LivewireAlert\Enums\Position;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;

#[Layout("layouts.app")]
class Index extends Component
{
    public $alamat;

    public $nama_usaha;

    public $nama_usaha_arab;

    public $logo_toko;

    public $footer_struk;

    public $new_logo; // Added new_logo property

    use WithFileUploads;

    //mount
    public function mount()
    {
        $setting = SettingWeb::firstOrCreate([]);
        $this->alamat = $setting->alamat;
        $this->nama_usaha = $setting->nama_usaha;
        $this->nama_usaha_arab = $setting->nama_usaha_ar; // Corrected to nama_usaha_ar
        $this->logo_toko = $setting->logo_struk;
        $this->footer_struk = $setting->footer_struk;
    }

    public function save()
    {
        $this->validate([
            "nama_usaha" => "required",
            "alamat" => "required",
            "new_logo" => "nullable|image|max:1024", // Validate new_logo as optional image
        ]);

        $setting = SettingWeb::first();

        $setting->update([
            "nama_usaha" => $this->nama_usaha,
            "nama_usaha_ar" => $this->nama_usaha_arab, // Corrected to nama_usaha_ar
            "alamat" => $this->alamat,
            "footer_struk" => $this->footer_struk,
        ]);

        if ($this->new_logo) {
            $imageName = time() . "." . $this->new_logo->extension();
            $this->new_logo->storeAs("logo", $imageName, "public");
            $setting->logo_struk = $imageName;
            $setting->save(); // Save the setting after updating logo_struk
            $this->logo_toko = $imageName; // Update logo_toko for display
            $this->new_logo = null; // Clear the new_logo property after upload
        }

        LivewireAlert::title("Success")
            ->text("Settings updated successfully!")
            ->info()
            ->toast()
            ->position("top-end")
            ->show();
    }

    public function render()
    {
        $breadcrumbs = [
            ["url" => "dashboard", "text" => "Home"],
            ["url" => null, "text" => "Tentang Instansi"],
        ];

        return view("livewire.web-settings.index")->layoutData([
            "breadcrumbs" => $breadcrumbs,
        ]);
    }
}
