<?php

namespace App\Livewire\Survey;

use App\Models\Jawaban;
use App\Models\Pelayanan;
use App\Models\Pertanyaan;
use App\Models\Responden;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("layouts.survey-app")]
class Index extends Component
{
    public $step = 0; // Step 0: Welcome page
    public $selectedLanguage;
    public $pelayanans;
    public $selectedPelayanan;
    public $nama;
    public $usia;
    public $gender;
    public $phone;
    public $language;
    public $pertanyaans;
    public $currentPertanyaanIndex = 0;
    public $answers = [];
    public $saran;
    public $kritik;
    public $totalNilai = 0;

    public function startSurvey()
    {
        $this->step = 1; // Move to language selection
    }

    public function selectLanguage($language)
    {
        $this->selectedLanguage = $language;
        $this->language = $language;
        $nameColumn = $language === "ar" ? "name_ar as name" : "name";
        $this->pelayanans = Pelayanan::select("id", $nameColumn)->get();
        $this->step = 2;
    }

    public function selectPelayanan($pelayananId)
    {
        $this->selectedPelayanan = Pelayanan::findOrFail($pelayananId);
        $questionColumn =
            $this->selectedLanguage === "ar" ? "question_ar as question" : "question";
        $this->pertanyaans = Pertanyaan::where("pelayanan_id", $pelayananId)
            ->select("id", $questionColumn)
            ->get();
        $this->step = 3;
    }

    public function saveRespondenData()
    {
        $this->validate([
            "nama" => "required|string|max:255",
            "usia" => "required|in:<17,18-25,26-30,31-40,>40",
            "gender" => "required|in:laki-laki,perempuan",
            "phone" => "nullable|string",
        ]);

        $this->step = 4;
    }

    public function answer($score)
    {
        // score: 4 = Sangat Puas, 3 = Puas, 2 = Tidak Puas, 1 = Sangat Tidak Puas
        $this->answers[$this->currentPertanyaanIndex] = $score;
        $this->totalNilai += $score;

        if ($this->currentPertanyaanIndex < count($this->pertanyaans) - 1) {
            $this->currentPertanyaanIndex++;
        } else {
            $this->step = 5;
        }
    }

    public function finish()
    {
        $this->validate([
            "kritik" => "nullable|string",
            "saran" => "nullable|string",
        ]);

        $responden = Responden::create([
            "nama" => $this->nama,
            "usia" => $this->usia,
            "gender" => $this->gender,
            "phone" => $this->phone,
            "language" => $this->language,
            "total_nilai" => $this->totalNilai,
            "tanggal_survey" => now(),
            "user_id" => auth()->user()?->id ?? 1,
            "pelayanan_id" => $this->selectedPelayanan->id,
        ]);

        foreach ($this->pertanyaans as $index => $pertanyaan) {
            Jawaban::create([
                "responden_id" => $responden->id,
                "pertanyaan_id" => $pertanyaan->id,
                "score" => $this->answers[$index],
            ]);
        }

        $lastJawaban = $responden
            ->jawaban()
            ->orderBy("id", "desc")
            ->first();
        if ($lastJawaban) {
            $lastJawaban->saran =
                "Kritik: " . $this->kritik . "\nSaran: " . $this->saran;
            $lastJawaban->save();
        }

        $this->step = 6; // Thank you page
    }

    public function render()
    {
        return view("livewire.survey.index");
    }
}
