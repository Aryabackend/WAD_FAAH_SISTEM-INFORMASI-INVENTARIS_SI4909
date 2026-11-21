<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Armada extends Model
{
    protected $fillable = [
        'nama',
        'seri',
        'kategori',
        'status',
    ];
}