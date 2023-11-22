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
        Schema::create('mobil', function (Blueprint $table) {
            $table->integer('id_mobil')->autoIncrement();
            // $table->string('id');
            $table->string('jenis_mobil');
            $table->string('merk');
            $table->string('nomor_rangka',30);
            $table->string('plat_mobil',10);
            $table->text('foto_mobil');
            $table->decimal('harga_sewa_per_hari');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobil');
    }
};
