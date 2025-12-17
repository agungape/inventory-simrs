<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jenispemeriksaan extends Model
{
    protected $table = 'jenispemeriksaans';

    protected $fillable = ['nama_pemeriksaan', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(Jenispemeriksaan::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Jenispemeriksaan::class, 'parent_id');
    }

    public function pemeriksaanPegawai(): HasMany
    {
        return $this->hasMany(PemeriksaanPegawai::class, 'jenispemeriksaan_id');
    }

    /**
     * Relasi ke MedicalCheckUp melalui PemeriksaanPegawai
     */
    public function medicalCheckUps()
    {
        return $this->belongsToMany(
            MedicalCheckUp::class,
            'pemeriksaan_pegawai',
            'jenispemeriksaan_id',
            'mcu_id'
        );
    }
}
