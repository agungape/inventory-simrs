<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayatpenyakitpasien extends Model
{
    use HasFactory;

    protected $table = 'riwayat_penyakit_pasien';
    protected $fillable = [
        'mcu_id',
        'riwayat_hepatitis',
        'riwayat_hepatitis_keterangan',
        'riwayat_pengobatan_tbc',
        'riwayat_pengobatan_tbc_keterangan',
        'hipertensi',
        'diabetes_melitus',
        'riwayat_operasi',
        'riwayat_operasi_keterangan',
        'riwayat_rawat_inap',
        'riwayat_rawat_inap_keterangan',
        'pengobatan_saat_ini',
        'pengobatan_saat_ini_keterangan',
        'alergi_obat_makanan',
        'alergi_obat_makanan_keterangan',
        'konsumsi_obat',
        'konsumsi_obat_keterangan',
        'lain_lain',
        'lain_lain_keterangan'
    ];

    protected $casts = [
        'riwayat_hepatitis' => 'boolean',
        'riwayat_pengobatan_tbc' => 'boolean',
        'hipertensi' => 'boolean',
        'diabetes_melitus' => 'boolean',
        'riwayat_operasi' => 'boolean',
        'riwayat_rawat_inap' => 'boolean',
        'pengobatan_saat_ini' => 'boolean',
        'alergi_obat_makanan' => 'boolean',
        'konsumsi_obat' => 'boolean',
        'lain_lain' => 'boolean'
    ];

    public function medicalCheckUp()
    {
        return $this->belongsTo(MedicalCheckUp::class, 'mcu_id');
    }
}
