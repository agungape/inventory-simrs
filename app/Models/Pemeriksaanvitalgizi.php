<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaanvitalgizi extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaan_tanda_vital_status_gizi';
    protected $fillable = [
        'mcu_id',
        'tinggi_badan',
        'berat_badan',
        'lingkar_perut',
        'pernafasan',
        'nadi',
        'tekanan_darah'
    ];

    public function medicalCheckUp()
    {
        return $this->belongsTo(MedicalCheckUp::class, 'mcu_id');
    }
}
