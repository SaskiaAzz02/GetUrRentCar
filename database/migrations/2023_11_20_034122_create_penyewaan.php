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
        Schema::create('penyewaan', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->integer('id_penyewaan')->autoIncrement();
            $table->integer('id_mobil');
            $table->date('tanggal_peminjaman');
            $table->integer('jumlah_sewa');

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
        Schema::dropIfExists('penyewaan');
    }
};
