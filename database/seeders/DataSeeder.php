<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DaftarBarang;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DaftarBarang::create([
            'nama_barang' => 'test',
            'kategori' => 'Perkakas',
            'spek' => 'TEST',
            'berat' => '10',
            'stok' => '20',
        ]);
    }
}
