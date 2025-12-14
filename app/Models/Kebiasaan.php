<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebiasaan extends Model
{
    use HasFactory;

    protected $table = 'kebiasaan';
    protected $fillable = [
        'mcu_id',
        'minum_alkohol',
        'minum_alkohol_jumlah',
        'merokok',
        'merokok_jumlah',
        'olahraga',
        'olahraga_jumlah',
        'minum_kopi',
        'minum_kopi_jumlah'
    ];

    protected $casts = [
        'minum_alkohol' => 'boolean',
        'merokok' => 'boolean',
        'olahraga' => 'boolean',
        'minum_kopi' => 'boolean'
    ];

    public function medicalCheckUp()
    {
        return $this->belongsTo(MedicalCheckUp::class, 'mcu_id');
    }
}
