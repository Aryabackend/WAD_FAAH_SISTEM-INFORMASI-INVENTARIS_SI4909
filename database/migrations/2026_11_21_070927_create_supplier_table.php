
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->id();

            $table->string('kode', 20)->unique();
            $table->string('nama', 100);
            $table->text('alamat')->nullable();

            $table->string('nib', 50)->nullable();
            $table->string('npwp', 50)->nullable();

            $table->string('pic', 50)->nullable();
            $table->string('kontak', 20)->nullable();
            $table->string('kota', 50)->nullable();

            $table->string('hp_pic', 20)->nullable();
            $table->string('telepon', 20)->nullable();

            $table->string('email', 100)->nullable();
            $table->string('jabatan', 50)->nullable();
            $table->string('email_pic', 100)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('supplier');
    }
};