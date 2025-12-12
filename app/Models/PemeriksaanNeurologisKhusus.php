<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanNeurologisKhusus extends Model
{
    use HasFactory;

    protected $fillable = [
        'mcu_id',
        'tes_romberg',
        'tes_laseque',
        'tes_kering',
        'tes_phallen',
        'tes_tunnel',
        'tes_patrick',
        'tes_kontra_patrick',
        'elchoff_tes',
        'lain_lain',
    ];
}
