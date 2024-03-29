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
        Schema::create('super_admin', function (Blueprint $table) {
            $table->integer('id_super_admin', true)->autoIncrement();
            $table->integer('id_akun')->nullable();
            $table->string('nama', 100);
            $table->string('nomor_hp', 13);
        
        // Foreign Key

            $table->foreign('id_akun')->on('akun')->references('id_akun')
            ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('super_admin');
    }
};
