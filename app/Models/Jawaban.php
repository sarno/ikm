<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $fillable = [
        "responden_id",
        "pertanyaan_id",
        "score",
        "saran",
    ];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }

    public function responden()
    {
        return $this->belongsTo(Responden::class);
    }
}
