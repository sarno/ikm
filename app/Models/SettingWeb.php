<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingWeb extends Model
{
    use HasFactory;

    protected $fillable = [
        "nama_usaha",
        "nama_usaha_ar",
        "alamat",
        "logo_struk",
        "footer_struk",
    ];
}
