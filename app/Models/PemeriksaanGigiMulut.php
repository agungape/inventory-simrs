<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanGigiMulut extends Model
{
    use HasFactory;

    protected $fillable = [
        'mcu_id',
        'lidah',
        'lidah_tidak_normal',
        'gusi',
        'gusi_tidak_normal',
        'gigi',
        'gigi_tidak_normal',
        'leher',
        'leher_tidak_normal',
        'karang_gigi',
        'gigi_berlubang',
        'tambalan_gigi',
        'gigi_tanggal',
        'gigi_miring',
        'sisa_akar_gigi',
    ];
}
