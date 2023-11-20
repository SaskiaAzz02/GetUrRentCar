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
            $table->integer('id_pengembalian_mobil', true)->autoIncrement();
            $table->integer('id_super_admin')->nullable();
            $table->integer('id_admin')->nullable();
            $table->date('tanggal_pengembalian')->nullable();

            // Foreign Key

            $table->foreign('id_super_admin')->on('super_admin')
            ->references('id_super_admin')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_admin')->on('admin')
            ->references('id_admin')->onDelete('cascade')->onUpdate('cascade');
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
