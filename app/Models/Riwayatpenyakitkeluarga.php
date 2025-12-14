<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayatpenyakitkeluarga extends Model
{
    use HasFactory;

    protected $table = 'riwayat_penyakit_keluarga';
    protected $fillable = [
        'mcu_id',
        'penyakit_jantung',
        'penyakit_darah_tinggi',
        'penyakit_kencing_manis',
        'penyakit_stroke',
        'penyakit_paru_menahun_asthma_tb',
        'penyakit_kanker_tumor',
        'penyakit_gangguan_jiwa',
        'penyakit_ginjal',
        'penyakit_saluran_cerna',
        'penyakit_lainnya',
        'penyakit_lainnya_keterangan'
    ];

    protected $casts = [
        'penyakit_jantung' => 'boolean',
        'penyakit_darah_tinggi' => 'boolean',
        'penyakit_kencing_manis' => 'boolean',
        'penyakit_stroke' => 'boolean',
        'penyakit_paru_menahun_asthma_tb' => 'boolean',
        'penyakit_kanker_tumor' => 'boolean',
        'penyakit_gangguan_jiwa' => 'boolean',
        'penyakit_ginjal' => 'boolean',
        'penyakit_saluran_cerna' => 'boolean',
        'penyakit_lainnya' => 'boolean'
    ];

    public function medicalCheckUp()
    {
        return $this->belongsTo(MedicalCheckUp::class, 'mcu_id');
    }
}
