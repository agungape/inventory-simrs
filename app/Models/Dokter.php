<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nip',
        'jabatan',
        'spesialisasi',
        'no_sip',
        'no_telp',
        'email',
        'alamat',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    // Relasi ke HasilPemeriksaan
    public function hasilPemeriksaan()
    {
        return $this->hasMany(HasilPemeriksaan::class, 'tim_medis');
    }

    // Scope untuk dokter aktif
    public function scopeAktif($query)
    {
        return $query->where('status', true);
    }

    // Accessor untuk status label
    public function getStatusLabelAttribute()
    {
        return $this->status ? 'Aktif' : 'Nonaktif';
    }

    // Accessor untuk nama lengkap dengan gelar jika ada
    public function getNamaLengkapAttribute()
    {
        $gelar = $this->spesialisasi ? ', ' . $this->spesialisasi : '';
        return $this->nama . $gelar;
    }
}
