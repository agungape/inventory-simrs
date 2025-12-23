<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPemeriksaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'mcu_id',
        'kesimpulan',
        'saran',
        'kategori_hasil',
        'tim_medis'
    ];

    protected $casts = [
        'kategori_hasil' => 'string'
    ];

    // Relasi ke MCU
    public function mcu()
    {
        return $this->belongsTo(MedicalCheckUp::class, 'mcu_id');
    }


    // Accessor untuk kategori hasil dalam bahasa Indonesia
    public function getKategoriHasilLabelAttribute()
    {
        $labels = [
            'fit' => 'Fit',
            'fit_dengan_catatan' => 'Fit dengan Catatan',
            'unfit' => 'Unfit',
            'pending' => 'Pending'
        ];

        return $labels[$this->kategori_hasil] ?? $this->kategori_hasil;
    }
}
