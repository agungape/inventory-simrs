<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MedicalCheckUp extends Model
{
    use HasFactory;

    protected $table = 'medical_check_up';

    protected $fillable = [
        'employee_id',
        'kategori_mcu',
        'status',
        'foto',
        'tanggal_mcu'
    ];

    protected $casts = [
        'tanggal_mcu' => 'datetime'
    ];


    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function kategori_mcu(): BelongsTo
    {
        return $this->belongsTo(KategoriMcu::class);
    }

    public function pemeriksaanPegawai(): HasMany
    {
        return $this->hasMany(PemeriksaanPegawai::class, 'mcu_id');
    }

    public function jenisPemeriksaans()
    {
        return $this->belongsToMany(Jenispemeriksaan::class, 'pemeriksaan_pegawai', 'mcu_id', 'jenispemeriksaan_id')
            ->withTimestamps();
    }

    public function dataAwal()
    {
        return $this->hasOne(Dataawal::class, 'mcu_id');
    }

    public function riwayatBahayaLingkunganKerja()
    {
        return $this->hasOne(Riwayatlingkungankerja::class, 'mcu_id');
    }

    public function riwayatKecelakaanKerja()
    {
        return $this->hasOne(Riwayatkecelakaankerja::class, 'mcu_id');
    }

    public function kebiasaan()
    {
        return $this->hasOne(Kebiasaan::class, 'mcu_id');
    }

    public function riwayatPenyakitKeluarga()
    {
        return $this->hasOne(Riwayatpenyakitkeluarga::class, 'mcu_id');
    }

    public function riwayatPenyakitPasien()
    {
        return $this->hasOne(Riwayatpenyakitpasien::class, 'mcu_id');
    }

    public function pemeriksaanTandaVitalStatusGizi()
    {
        return $this->hasOne(Pemeriksaanvitalgizi::class, 'mcu_id');
    }

    public function pemeriksaanFisik()
    {
        return $this->hasOne(Pemeriksaanfisik::class, 'mcu_id');
    }
}
