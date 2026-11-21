<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TataLetak extends Model
{
    protected $fillable = [
        'nomor_lorong',
        'nomor_rak',
        'lokasi_gudang',
        'kapasitas_fisik',
        'satuan',
        'status',
    ];
}