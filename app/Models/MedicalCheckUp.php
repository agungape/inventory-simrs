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
        return $this->hasOne(DataAwal::class, 'mcu_id');
    }

    public function riwayatLingkunganKerja()
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

    public function pemeriksaanVitalGizi()
    {
        return $this->hasOne(Pemeriksaanvitalgizi::class, 'mcu_id');
    }

    public function pemeriksaanFisik()
    {
        return $this->hasOne(Pemeriksaanfisik::class, 'mcu_id');
    }

    public function pemeriksaanTht()
    {
        return $this->hasOne(PemeriksaanTht::class, 'mcu_id');
    }

    public function pemeriksaanThorax()
    {
        return $this->hasOne(PemeriksaanThorax::class, 'mcu_id');
    }

    public function pemeriksaanAbdomen()
    {
        return $this->hasOne(PemeriksaanAbdomen::class, 'mcu_id');
    }

    public function pemeriksaanNeurologis()
    {
        return $this->hasOne(PemeriksaanNeurologis::class, 'mcu_id');
    }

    public function pemeriksaanNeurologisKhusus()
    {
        return $this->hasOne(PemeriksaanNeurologisKhusus::class, 'mcu_id');
    }

    public function pemeriksaanMuskuloskeletal()
    {
        return $this->hasOne(PemeriksaanMuskuloskeletal::class, 'mcu_id');
    }

    public function pemeriksaanGigiMulut()
    {
        return $this->hasOne(PemeriksaanGigiMulut::class, 'mcu_id');
    }

    public function hasilPemeriksaan()
    {
        return $this->hasOne(HasilPemeriksaan::class, 'mcu_id');
    }

    public function dokumenMcu()
    {
        return $this->hasMany(DokumenMcu::class, 'mcu_id');
    }

    // Untuk mengambil file lab
    public function dokumenLab()
    {
        return $this->hasMany(DokumenMcu::class, 'mcu_id')
            ->where('jenis_dokumen', 'Laboratorium');
    }

    // Untuk mengambil file radiologi
    public function dokumenRadiologi()
    {
        return $this->hasMany(DokumenMcu::class, 'mcu_id')
            ->where('jenis_dokumen', 'Radiologi');
    }

    // Untuk mengambil file EKG
    public function dokumenEkg()
    {
        return $this->hasMany(DokumenMcu::class, 'mcu_id')
            ->where('jenis_dokumen', 'EKG');
    }
}
