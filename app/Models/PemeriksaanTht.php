<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanTht extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'mcu_id',

        // Daun Telinga
        'daun_telinga',
        'daun_telinga_tidak_normal',

        // Lubang Telinga
        'lubang_telinga',
        'lubang_telinga_tidak_normal',

        // Membran Tympani
        'membran_tymphani',
        'membran_tymphani_tidak_normal',

        // Hidung Septum Concha
        'hidung_septum_concha',
        'hidung_septum_concha_tidak_normal',

        // Faring
        'faring',
        'faring_tidak_normal',

        // Tonsil
        'tonsil',
        'tonsil_tidak_normal',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // Semua enum akan disimpan sebagai string
    ];

    /**
     * Relationship dengan MedicalCheckUp
     */
    public function medicalCheckUp(): BelongsTo
    {
        return $this->belongsTo(MedicalCheckUp::class, 'mcu_id');
    }

    /**
     * Accessor untuk status daun telinga
     */
    public function getDaunTelingaStatusAttribute(): string
    {
        return $this->daun_telinga === 'normal' ? 'Normal' : 'Tidak Normal';
    }

    /**
     * Accessor untuk status lubang telinga
     */
    public function getLubangTelingaStatusAttribute(): string
    {
        return $this->lubang_telinga === 'normal' ? 'Normal' : 'Tidak Normal';
    }

    /**
     * Accessor untuk status membran tympani
     */
    public function getMembranTympaniStatusAttribute(): string
    {
        return $this->membran_tymphani === 'normal' ? 'Normal' : 'Tidak Normal';
    }

    /**
     * Accessor untuk status hidung septum concha
     */
    public function getHidungSeptumConchaStatusAttribute(): string
    {
        return $this->hidung_septum_concha === 'normal' ? 'Normal' : 'Tidak Normal';
    }

    /**
     * Accessor untuk status faring
     */
    public function getFaringStatusAttribute(): string
    {
        return $this->faring === 'normal' ? 'Normal' : 'Tidak Normal';
    }

    /**
     * Accessor untuk status tonsil
     */
    public function getTonsilStatusAttribute(): string
    {
        return $this->tonsil === 'normal' ? 'Normal' : 'Tidak Normal';
    }

    /**
     * Scope untuk mencari pemeriksaan dengan kondisi tidak normal
     */
    public function scopeTidakNormal($query, $bagian = null)
    {
        if ($bagian) {
            return $query->where($bagian, 'tidak normal')
                ->whereNotNull($bagian . '_tidak_normal');
        }

        return $query->where(function ($q) {
            $q->where('daun_telinga', 'tidak normal')
                ->orWhere('lubang_telinga', 'tidak normal')
                ->orWhere('membran_tymphani', 'tidak normal')
                ->orWhere('hidung_septum_concha', 'tidak normal')
                ->orWhere('faring', 'tidak normal')
                ->orWhere('tonsil', 'tidak normal');
        });
    }

    /**
     * Scope untuk mencari pemeriksaan normal semua
     */
    public function scopeNormalSemua($query)
    {
        return $query->where('daun_telinga', 'normal')
            ->where('lubang_telinga', 'normal')
            ->where('membran_tymphani', 'normal')
            ->where('hidung_septum_concha', 'normal')
            ->where('faring', 'normal')
            ->where('tonsil', 'normal');
    }

    /**
     * Method untuk mengecek apakah ada kondisi tidak normal
     */
    public function hasTidakNormal(): bool
    {
        return $this->daun_telinga === 'tidak normal' ||
            $this->lubang_telinga === 'tidak normal' ||
            $this->membran_tymphani === 'tidak normal' ||
            $this->hidung_septum_concha === 'tidak normal' ||
            $this->faring === 'tidak normal' ||
            $this->tonsil === 'tidak normal';
    }

    /**
     * Method untuk mendapatkan semua bagian yang tidak normal
     */
    public function getBagianTidakNormal(): array
    {
        $bagianTidakNormal = [];

        if ($this->daun_telinga === 'tidak normal') {
            $bagianTidakNormal[] = [
                'bagian' => 'Daun Telinga',
                'keterangan' => $this->daun_telinga_tidak_normal
            ];
        }

        if ($this->lubang_telinga === 'tidak normal') {
            $bagianTidakNormal[] = [
                'bagian' => 'Lubang Telinga',
                'keterangan' => $this->lubang_telinga_tidak_normal
            ];
        }

        if ($this->membran_tymphani === 'tidak normal') {
            $bagianTidakNormal[] = [
                'bagian' => 'Membran Tympani',
                'keterangan' => $this->membran_tymphani_tidak_normal
            ];
        }

        if ($this->hidung_septum_concha === 'tidak normal') {
            $bagianTidakNormal[] = [
                'bagian' => 'Hidung Septum Concha',
                'keterangan' => $this->hidung_septum_concha_tidak_normal
            ];
        }

        if ($this->faring === 'tidak normal') {
            $bagianTidakNormal[] = [
                'bagian' => 'Faring',
                'keterangan' => $this->faring_tidak_normal
            ];
        }

        if ($this->tonsil === 'tidak normal') {
            $bagianTidakNormal[] = [
                'bagian' => 'Tonsil',
                'keterangan' => $this->tonsil_tidak_normal
            ];
        }

        return $bagianTidakNormal;
    }

    /**
     * Method untuk mendapatkan ringkasan pemeriksaan
     */
    public function getRingkasanAttribute(): string
    {
        if ($this->hasTidakNormal()) {
            $bagian = count($this->getBagianTidakNormal());
            return "{$bagian} bagian tidak normal";
        }

        return "Semua bagian normal";
    }
}
