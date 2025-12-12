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
        'status',
        'foto',
        'tanggal_mcu'
    ];

    protected $casts = [
        'tanggal_mcu' => 'datetime'
    ];

    /**
     * Relasi ke Employee
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Relasi ke PemeriksaanPegawai (one-to-many)
     */
    public function pemeriksaanPegawai(): HasMany
    {
        return $this->hasMany(PemeriksaanPegawai::class, 'mcu_id');
    }

    public function jenisPemeriksaans()
    {
        return $this->belongsToMany(Jenispemeriksaan::class, 'pemeriksaan_pegawai', 'mcu_id', 'jenispemeriksaan_id')
            ->withTimestamps();
    }
}
