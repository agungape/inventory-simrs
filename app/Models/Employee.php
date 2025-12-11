<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nrp',
        'nama',
        'nik',
        'tanggal_lahir',
        'jenis_kelamin',
        'departement',
        'jabatan',
        'bagian',
        'nama_perusahaan',
        'no_hp'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    /**
     * Relasi ke medical checkups
     */
    // public function medicalCheckups()
    // {
    //     return $this->hasMany(MedicalCheckup::class);
    // }

}
