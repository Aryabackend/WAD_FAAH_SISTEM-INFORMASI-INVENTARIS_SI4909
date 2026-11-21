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
        Schema::create('daftar_barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang', 50);
            $table->string('kategori', 50);
            $table->string('spek', 50)->nullable();
            $table->integer('berat')->nullable();
            $table->integer('stok')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
