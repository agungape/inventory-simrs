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

    // public function getTanggalLahirAttribute($value)
    // {
    //     if (!$value) {
    //         return null;
    //     }

    //     return Carbon::parse($value)->format('d/m/Y');
    // }

    // public function getUsiaAttribute()
    // {
    //     if (!$this->attributes['tanggal_lahir']) {
    //         return '-';
    //     }

    //     // Ambil RAW value dari database (Y-m-d)
    //     $lahir = Carbon::parse($this->attributes['tanggal_lahir']);
    //     $sekarang = Carbon::now();
    //     $diff = $lahir->diff($sekarang);

    //     return $diff->y . ' tahun ' . $diff->m . ' bulan ' . $diff->d . ' hari';
    // }

    /**
     * Relasi ke MedicalCheckUp (checkins)
     */
    public function medicalCheckUps(): HasMany
    {
        return $this->hasMany(MedicalCheckUp::class);
    }

    /**
     * Alias untuk checkins (agar konsisten dengan controller)
     */
    public function checkins(): HasMany
    {
        return $this->hasMany(MedicalCheckUp::class);
    }

    /**
     * Relasi untuk checkin hari ini
     */
    public function checkin_today()
    {
        return $this->hasOne(MedicalCheckUp::class)
            ->whereDate('tanggal_mcu', Carbon::today());
    }

    /**
     * Relasi untuk checkin terbaru
     */
    public function latestCheckin()
    {
        return $this->hasOne(MedicalCheckUp::class)->latestOfMany();
    }

    /**
     * Cek apakah sudah check-in hari ini
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

    /**
     * Scope untuk pegawai yang pernah checkin
     */
    public function scopeHasCheckins($query)
    {
        return $query->whereHas('medicalCheckUps');
    }

    /**
     * Scope untuk pegawai dengan checkin di tanggal tertentu
     */
    public function scopeWithCheckinDate($query, $date)
    {
        return $query->whereHas('medicalCheckUps', function ($q) use ($date) {
            $q->whereDate('tanggal_mcu', $date);
        });
    }

    /**
     * Ambil semua checkin dengan relasi
     */
    public function getAllCheckinsWithRelations()
    {
        return $this->checkins()
            ->with(['kategoriMcu', 'jenisPemeriksaans'])
            ->orderBy('tanggal_mcu', 'desc')
            ->get();
    }

    /**
     * Hitung total checkin
     */
    public function getTotalCheckinsAttribute()
    {
        return $this->medicalCheckUps()->count();
    }

    /**
     * Ambil tanggal checkin terbaru
     */
    public function getLatestCheckinDateAttribute()
    {
        $latest = $this->medicalCheckUps()
            ->orderBy('tanggal_mcu', 'desc')
            ->first();

        return $latest ? Carbon::parse($latest->tanggal_mcu)->format('d/m/Y H:i') : null;
    }

    /**
     * Ambil jenis pemeriksaan untuk label
     */
    public function getLabelPemeriksaanAttribute()
    {
        $checkin = $this->getCheckinHariIni();

        if (!$checkin || !$checkin->jenisPemeriksaans) {
            return collect();
        }

        return $checkin->jenisPemeriksaans->map(function ($jenis) {
            return [
                'id' => $jenis->id,
                'nama' => $jenis->nama_pemeriksaan,
                'parent_id' => $jenis->parent_id,
            ];
        });
    }
}
