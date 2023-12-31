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
        Schema::create('customers', function (Blueprint $table) {
            $table->integer('id_customer')->autoIncrement();
            $table->integer('id_akun')->nullable();
            $table->integer('no_telp')->nullable();
            $table->string('alamat', 100);
            $table->string('nama', 100);
            $table->text('sim');
            $table->text('ktp');

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
        Schema::dropIfExists('customers');
    }
};
