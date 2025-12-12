<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanMuskuloskeletal extends Model
{
    use HasFactory;

    protected $fillable = [
        'mcu_id',
        'kelainan_tulang_atau_sendi',
        'kelainan_otot',
        'kelainan_jari_atau_tangan',
        'kelainan_jari_atau_kaki',
        'tulang_belakang_normal',
        'tulang_belakang_skoliosis',
        'tulang_belakang_lordosis',
        'tulang_belakang_kifosis',
        'lain_lain',
    ];
}
