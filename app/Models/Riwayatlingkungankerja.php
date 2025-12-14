<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayatlingkungankerja extends Model
{
    use HasFactory;

    protected $table = 'riwayat_bahaya_lingkungan_kerja';
    protected $fillable = [
        'mcu_id',
        'bising',
        'bising_jam_per_hari',
        'bising_selama_tahun',
        'getaran',
        'getaran_jam_per_hari',
        'getaran_selama_tahun',
        'debu',
        'debu_jam_per_hari',
        'debu_selama_tahun',
        'zat_kimia',
        'zat_kimia_jam_per_hari',
        'zat_kimia_selama_tahun',
        'panas',
        'panas_jam_per_hari',
        'panas_selama_tahun',
        'asap',
        'asap_jam_per_hari',
        'asap_selama_tahun',
        'gerakan_berulang',
        'gerakan_berulang_jam_per_hari',
        'gerakan_berulang_selama_tahun',
        'monitor_komputer',
        'monitor_komputer_jam_per_hari',
        'monitor_komputer_selama_tahun',
        'mendorong_menarik',
        'mendorong_menarik_jam_per_hari',
        'mendorong_menarik_selama_tahun',
        'angkat_beban_berat',
        'angkat_beban_berat_jam_per_hari',
        'angkat_beban_berat_selama_tahun'
    ];

    protected $casts = [
        'bising' => 'boolean',
        'getaran' => 'boolean',
        'debu' => 'boolean',
        'zat_kimia' => 'boolean',
        'panas' => 'boolean',
        'asap' => 'boolean',
        'gerakan_berulang' => 'boolean',
        'monitor_komputer' => 'boolean',
        'mendorong_menarik' => 'boolean',
        'angkat_beban_berat' => 'boolean'
    ];

    public function medicalCheckUp()
    {
        return $this->belongsTo(MedicalCheckUp::class, 'mcu_id');
    }
}
