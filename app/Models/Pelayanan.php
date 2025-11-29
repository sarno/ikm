<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    protected $fillable = [
        'instansi_id',
        'name',
        'name_ar',
        'description',
        'logo',
    ];

    public function instansi()
    {
        return $this->belongsTo(SettingWeb::class, 'instansi_id');
    }

    public function pertanyaans()
    {
        return $this->hasMany(Pertanyaan::class);
    }

    public function respondens()
    {
        return $this->hasMany(Responden::class);
    }
}
