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
        DB::unprepared('DROP Procedure IF EXISTS CreateMobil');
        DB::unprepared("
        CREATE PROCEDURE CreateMobil(
            IN new_jenis_mobil VARCHAR(255),
            IN new_merk VARCHAR(225),
            IN new_plat_mobil VARCHAR(225),
            IN new_nomor_rangka VARCHAR(225),
            IN new_foto_profil TEXT,
            IN new_harga_sewa_per_hari DECIMAL
        )
        BEGIN
            DECLARE pesan_error CHAR(5) DEFAULT '000';
            DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
        
            BEGIN
                GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
            END;

            -- Sisipkan data ke dalam tabel mobil
            START TRANSACTION;
            savepoint satu;
            INSERT INTO mobil (jenis_mobil, merk, plat_mobil, nomor_rangka, foto_mobil, harga_sewa_per_hari)
            VALUES (new_jenis_mobil, new_merk, new_plat_mobil, new_nomor_rangka, new_foto_mobil, new_harga_sewa_per_hari); 

            IF pesan_error != '000' THEN ROLLBACK TO satu;
            END IF;
            COMMIT;
        END
        
        
        ");
        
    
    }

public function down(): void
    {
        //
    }
};