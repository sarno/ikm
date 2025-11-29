<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responden extends Model
{
    use HasFactory;

    protected $fillable = [
        "nama",
        "usia",
        "gender",
        "phone",
        "language",
        "total_nilai",
        "tanggal_survey",
        "user_id",
        "pelayanan_id",
    ];

    protected $dates = ["tanggal_survey"];

    public function jawaban()
    {
        return $this->hasMany(jawaban::class);
    }

    //user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //pelayanan
    public function pelayanan()
    {
        return $this->belongsTo(Pelayanan::class);
    }
}
