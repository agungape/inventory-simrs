<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayatkecelakaankerja extends Model
{
    use HasFactory;

    protected $table = 'riwayat_kecelakaan_kerja';
    protected $fillable = [
        'mcu_id',
        'jatuh_dari_ketinggian',
        'jatuh_dari_ketinggian_tahun',
        'tersayat_benda_tajam',
        'tersayat_benda_tajam_tahun',
        'tersengat_listrik',
        'tersengat_listrik_tahun',
        'terbakar',
        'terbakar_tahun',
        'terbentur',
        'terbentur_tahun',
        'tergores',
        'tergores_tahun',
        'terkilir',
        'terkilir_tahun',
        'tertiban',
        'tertiban_tahun',
        'tertusuk',
        'tertusuk_tahun',
        'terpotong',
        'terpotong_tahun',
        'kemasukan_benda_asing',
        'kemasukan_benda_asing_tahun'
    ];

    protected $casts = [
        'jatuh_dari_ketinggian' => 'boolean',
        'tersayat_benda_tajam' => 'boolean',
        'tersengat_listrik' => 'boolean',
        'terbakar' => 'boolean',
        'terbentur' => 'boolean',
        'tergores' => 'boolean',
        'terkilir' => 'boolean',
        'tertiban' => 'boolean',
        'tertusuk' => 'boolean',
        'terpotong' => 'boolean',
        'kemasukan_benda_asing' => 'boolean'
    ];

    public function medicalCheckUp()
    {
        return $this->belongsTo(MedicalCheckUp::class, 'mcu_id');
    }
}
