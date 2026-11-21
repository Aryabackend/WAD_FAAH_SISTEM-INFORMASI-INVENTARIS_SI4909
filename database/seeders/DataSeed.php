<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DataSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nomor_lorong' => 'L-02',
            'nomor_rak' => 'R-02',
            'lokasi_gudang' => 'Gudang Belakanh',
            'kapasitas_fisik' => '300',
            'satuan' => 'Karton' ,
            'status' => 'Tersedia' 
        ]);
    }
}
