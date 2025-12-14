<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaanfisik extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaan_fisik';
    protected $fillable = [
        'mcu_id',
        'kesan_umum',
        'kepala_dan_wajah',
        'kulit_pucat',
        'kulit_ikterik',
        'mata_normal',
        'hiperemis',
        'strabismus',
        'sekret',
        'ikterik_mata',
        'anemis',
        'pterigium',
        'od_os',
        'od_nilai',
        'os_nilai',
        'visus_jauh',
        'nilai_visus_jauh',
        'visus_dekat',
        'nilai_visus_dekat',
        'lapang_pandang',
        'nilai_lapang_pandang',
        'tiga_dimensi',
        'nilai_tiga_dimensi',
        'buta_warna',
        'nilai_buta_warna'
    ];

    protected $casts = [
        'kulit_pucat' => 'boolean',
        'kulit_ikterik' => 'boolean',
        'mata_normal' => 'boolean',
        'hiperemis' => 'boolean',
        'strabismus' => 'boolean',
        'sekret' => 'boolean',
        'ikterik_mata' => 'boolean',
        'anemis' => 'boolean',
        'pterigium' => 'boolean',
        'od_os' => 'boolean',
        'visus_jauh' => 'boolean',
        'visus_dekat' => 'boolean',
        'lapang_pandang' => 'boolean',
        'tiga_dimensi' => 'boolean',
        'buta_warna' => 'boolean',
        'kesan_umum' => 'string',
        'kepala_dan_wajah' => 'string',
        'nilai_buta_warna' => 'string'
    ];

    public function medicalCheckUp()
    {
        return $this->belongsTo(MedicalCheckUp::class, 'mcu_id');
    }
}
