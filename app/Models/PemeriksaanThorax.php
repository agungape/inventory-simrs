<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanThorax extends Model
{
    use HasFactory;

    protected $fillable = [
        'mcu_id',
        'bentuk',
        'bentuk_tidak_normal',
        'inspeksi',
        'inspeksi_tidak_normal',
        'palpasi',
        'palpasi_tidak_normal',
        'perkusi',
        'perkusi_tidak_normal',
        'aukultasi',
        'aukultasi_tidak_normal',
        'lainnya',
        'lainnya_tidak_normal',
    ];
}
