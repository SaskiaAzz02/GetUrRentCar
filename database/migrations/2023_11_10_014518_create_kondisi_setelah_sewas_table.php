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
        Schema::create('kondisi_setelah_sewas', function (Blueprint $table) {
            $table->integer('id_kondisi_setelah_sewa', true)->autoIncrement();
            // $table->integer('id_super_admin')->nullable();
            $table->integer('id_pengembalian_mobil')->nullable();
            $table->string('lampu',30)->nullable();
            $table->string('dongkrak_kit',30)->nullable();
            $table->string('klakson',30)->nullable();
            $table->string('head_rest',30)->nullable();
            $table->string('kebersihan_mobil',30)->nullable();
            $table->string('seat_belt',30)->nullable();
            $table->string('audio',30)->nullable();
            $table->string('kartet',30)->nullable();
            $table->string('ban_serep',30)->nullable();
            $table->string('stnk',30)->nullable();
            $table->string('foto_kondisi_mobil',30)->nullable();

            // Foreign Key
            $table->foreign('id_super_admin')->on('super_admin')
            ->references('id_super_admin')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kondisi_setelah_sewas');
    }
};
