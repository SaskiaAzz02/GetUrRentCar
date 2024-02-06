<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("DROP VIEW IF EXISTS view_mobil");

        DB::unprepared("
        CREATE VIEW view_mobil AS
        SELECT
            m.id_jenis_mobil AS id_jenis_mobil, 
            m.merk AS merk,
            m.plat_mobil AS plat_mobil,
            m.nomor_rangka AS nomor_rangka,
            m.foto_mobil AS foto_mobil,
            m.harga_sewa_per_hari AS harga_sewa_per_hari
        FROM mobil m  
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view_join');
        DB::unprepared("DROP VIEW EXISTS view_mobil");
    }
};
