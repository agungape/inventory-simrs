<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilBacaRadiologi extends Model
{
    use HasFactory;

    protected $fillable = [
        'dokumen_mcu_id',
        'hasil',
        'kesimpulan'
    ];

    public function dokumenMcu()
    {
        return $this->belongsTo(DokumenMcu::class);
    }
}
