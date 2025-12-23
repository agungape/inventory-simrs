<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenMcu extends Model
{
    use HasFactory;
    protected $table = 'dokumen_mcus';
    protected $fillable = ['mcu_id','jenis_dokumen','nama_file'];

    public function medicalCheckUp()
    {
        return $this->belongsTo(MedicalCheckUp::class, 'mcu_id');
    }

    public function hasilBacaRadiologi()
    {
        return $this->hasOne(HasilBacaRadiologi::class);
    }

    public function hasilBacaEkg()
    {
        return $this->hasOne(HasilBacaEkg::class);
    }
}
