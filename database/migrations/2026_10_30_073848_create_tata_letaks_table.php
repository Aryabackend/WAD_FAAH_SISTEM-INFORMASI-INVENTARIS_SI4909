<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tata_letaks', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_lorong', 20);
            $table->string('nomor_rak', 20)->unique();
            $table->string('lokasi_gudang', 100);
            $table->unsignedInteger('kapasitas_fisik');
            $table->enum('satuan', ['Kg', 'Unit', 'Karton', 'Ton']);
            $table->enum('status', ['Tersedia', 'Penuh', 'Maintenance'])->default('Tersedia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tata_letaks');
    }
};
