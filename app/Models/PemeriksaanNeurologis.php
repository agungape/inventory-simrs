<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanNeurologis extends Model
{
    use HasFactory;

    protected $fillable = [
        'mcu_id',
        'reflek_fisologis',
        'reflek_fisologis_tidak_normal',
        'reflek_patologis',
        'kekuatan_motorik',
        'kekuatan_motorik_tidak_normal',
        'sensorik',
        'sensorik_tidak_normal',
        'otot_otot_atau_tonus',
    ];
}
