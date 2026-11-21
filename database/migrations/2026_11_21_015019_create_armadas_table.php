<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('armadas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('seri')->unique();
            $table->string('kategori');
            $table->string('status')->default('Tersedia');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('armadas');
    }
};