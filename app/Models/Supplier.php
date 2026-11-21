<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'kode',
        'nama',
        'alamat',
        'nib',
        'npwp',
        'pic',
        'kontak',
        'kota',
        'hp_pic',
        'telepon',
        'email',
        'jabatan',
        'email_pic',
    ];
}
