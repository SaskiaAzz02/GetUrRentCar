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
        Schema::create('detail_sewa', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->integer('id_detail')->autoIncrement();
            $table->integer('id_jenis_mobil');
            $table->string('lampu',30);
            $table->string('merk');
            $table->string('plat',10);
            $table->string('dongkrak_kit',30);
            $table->string('klakson',30);
            $table->string('head_rest',30);
            $table->string('kebersihan_mobil',30);
            $table->string('seat_belt',30);
            $table->string('audio',30);
            $table->string('karpet_mobil',30);
            $table->string('ban_serep',30);
            $table->string('stnk',30);
            $table->text('foto_kondisi_mobil',30);
            
            // Foreign Key

            $table->foreign('id_jenis_mobil')->on('jenis_mobil')
            ->references('id_jenis_mobil')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_sewa');
    }
};
