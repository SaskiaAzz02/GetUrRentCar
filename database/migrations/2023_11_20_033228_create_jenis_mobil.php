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
        Schema::create('jenis_mobil', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->integer('id_jenis_mobil')->autoIncrement();
            $table->integer('id_mobil');
            $table->string('nama_jenis',100);
            $table->string('model',100);
            $table->decimal('harga');

            // Foreign Key

            $table->foreign('id_mobil')->on('mobil')
            ->references('id_mobil')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_mobil');
    }
};
