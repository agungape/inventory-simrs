<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanAbdomen extends Model
{
    use HasFactory;

    protected $fillable = [
        'mcu_id',
        'bentuk',
        'bentuk_tidak_normal',
        'palpasi',
        'palpasi_tidak_normal',
        'perkusi',
        'perkusi_tidak_normal',
        'hati',
        'limpa',
        'ginjal_test_ketok',
        'hernia',
        'rectal',
        'lain_lain',
    ];
}
