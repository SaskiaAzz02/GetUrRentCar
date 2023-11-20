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
            // $table->id();
            // $table->timestamps();
            $table->integer('id_mobil')->autoIncrement();
            $table->integer('id_detail');
            $table->string('plat_mobil',10);
            $table->text('foto_mobil');
            $table->string('nomor_rangka',30);
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
