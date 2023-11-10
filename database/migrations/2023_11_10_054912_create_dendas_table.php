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
        Schema::create('dendas', function (Blueprint $table) {
            $table->integer('id_denda', true)->autoIncrement();
            $table->integer('id_pembayaran')->nullable();
            $table->string('jenis', 100);
            $table->decimal('tarif', 5, 2);

            // Foreign Key

            $table->foreign('id_pembayaran')->on('pembayaran')
            ->references('id_pembayaran')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dendas');
    }
};
