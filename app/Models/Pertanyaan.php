<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $fillable = [
        'pelayanan_id',
        'question',
        'question_ar',
        'image',
        'order',
    ];

    public function pelayanan()
    {
        return $this->belongsTo(Pelayanan::class, 'pelayanan_id');
    }
}
