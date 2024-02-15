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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->integer('id_pembayaran')->autoIncrement();
            $table->integer('id_pengembalian')->nullable();
            $table->decimal('total', 5, 2);
            $table->date('tanggal_pembayaran');
            $table->string('jenis_pembayaran', 100);

            // Foreign Key
            $table->foreign('id_pengembalian')->on('pengembalian')
            ->references('id_pengembalian')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
