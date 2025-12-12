<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PemeriksaanPegawai extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaan_pegawai';

    protected $fillable = [
        'mcu_id',
        'jenispemeriksaan_id'
    ];

    /**
     * Relasi ke MedicalCheckUp
     */
    public function medicalCheckUp()
    {
        return $this->belongsTo(MedicalCheckUp::class, 'mcu_id');
    }

    public function jenisPemeriksaan()
    {
        return $this->belongsTo(Jenispemeriksaan::class, 'jenispemeriksaan_id');
    }
}
