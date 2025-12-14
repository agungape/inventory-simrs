<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataawal extends Model
{
    use HasFactory;

    protected $table = 'data_awal';
    protected $fillable = [
        'mcu_id',
        'jenis_mcu',
        'keluhan_sekarang',
        'puasa'
    ];

    protected $casts = [
        'jenis_mcu' => 'string'
    ];

    public function medicalCheckUp()
    {
        return $this->belongsTo(MedicalCheckUp::class, 'mcu_id');
    }
}
