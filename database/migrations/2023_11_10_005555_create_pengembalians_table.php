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
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->integer('id_pengembalian', true)->autoIncrement();
            $table->integer('id_mobil', false);
            $table->date('tanggal_pengembalian')->nullable();

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
        Schema::dropIfExists('pengembalians');
    }
};
