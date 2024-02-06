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
        DB::unprepared('DROP Procedure IF EXISTS CreatePenyewaan');
        DB::unprepared("
        CREATE PROCEDURE CreatePenyewaan(
            IN new_jenis_mobil VARCHAR(255),
            IN new_tanggal_penyewaan VARCHAR(225),
            IN new_jumlah_sewa VARCHAR(225),
        )
        BEGIN
            DECLARE pesan_error CHAR(5) DEFAULT '000';
            DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
        
            BEGIN
            GET DIAGNOSTICS CONDITION 1
            pesan_error = RETURNED_SQLSTATE;
            END;

            -- Sisipkan data ke dalam tabel penyewaan
            START TRANSACTION;
            savepoint satu;
            INSERT INTO penyewaan (jenis_mobil, tanggal penyewaan, jumlah sewa)
            VALUES (new_jenis_mobil, tanggal penyewaan, jumlah sewa); 

            IF pesan_error != '000' THEN ROLLBACK TO satu;
            END IF;
            COMMIT;
        END");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
