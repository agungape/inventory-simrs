<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nrp',
        'no_rm',
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
        'tanggal_lahir' => 'date'
    ];

    public function getTanggalLahirAttribute($value)
    {
        if (!$value) {
            return null;
        }

        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getUsiaAttribute()
    {
        if (!$this->attributes['tanggal_lahir']) {
            return '-';
        }

        // Ambil RAW value dari database (Y-m-d)
        $lahir = Carbon::parse($this->attributes['tanggal_lahir']);
        $sekarang = Carbon::now();
        $diff = $lahir->diff($sekarang);

        return $diff->y . ' tahun ' . $diff->m . ' bulan ' . $diff->d . ' hari';
    }
    /**
     * Relasi ke MedicalCheckUp
     */
    public function medicalCheckUps(): HasMany
    {
        return $this->hasMany(MedicalCheckUp::class);
    }

    /**
     * Cek apakah sudah check-in hari ini
     * NOTE: Ini adalah method biasa, bukan relationship
     */
    public function sudahCheckinHariIni($tanggal = null)
    {
        if (!$tanggal) {
            $tanggal = date('Y-m-d');
        }

        return $this->medicalCheckUps()
            ->whereDate('tanggal_mcu', $tanggal)
            ->exists();
    }

    /**
     * Ambil data check-in hari ini
     * NOTE: Ini adalah method biasa, bukan relationship
     */
    public function getCheckinHariIni($tanggal = null)
    {
        if (!$tanggal) {
            $tanggal = date('Y-m-d');
        }

        return $this->medicalCheckUps()
            ->whereDate('tanggal_mcu', $tanggal)
            ->first();
    }
}
