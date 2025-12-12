<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odontogram extends Model
{
    use HasFactory;

    protected $fillable = [
        'pemeriksaan_gigi_mulut_id',
        'tooth_number',
        'tooth_name',
        'problem_type',
        'description',
    ];

    protected $casts = [
        'tooth_number' => 'integer'
    ];
}
