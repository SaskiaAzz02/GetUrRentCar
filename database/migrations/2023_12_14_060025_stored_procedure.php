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
            GET DIAGNOSTICS CONDITION 1
            pesan_error = RETURNED_SQLSTATE;
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
        
        DB::unprepared('DROP Procedure IF EXISTS CreatePenyewaan');
        DB::unprepared("
        CREATE PROCEDURE CreatePenyewaan(
            IN new_jenis_mobil VARCHAR(255),
            IN new_tanggal_penyewaan VARCHAR(225),
            IN new_jumlah_sewa VARCHAR(225)
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
            INSERT INTO penyewaan (jenis_mobil, tanggal_penyewaan, jumlah_sewa)
            VALUES (new_jenis_mobil, new_tanggal_penyewaan, new_jumlah_sewa); 

            IF pesan_error != '000' THEN ROLLBACK TO satu;
            END IF;
            COMMIT;
        END"
    );
    
    DB::unprepared('DROP Procedure IF EXISTS CreateDetailSewa');
    DB::unprepared("
    CREATE PROCEDURE CreateDetailSewa(
        IN new_id_jenis_mobil INT(11),  IN new_lampu VARCHAR(30),  IN new_merk VARCHAR(255),  IN new_plat VARCHAR(10), 
        IN new_dongkrak_kit VARCHAR(30),  IN new_klakson VARCHAR(30),  IN new_head_rest VARCHAR(30),  IN new_kebersihan_mobil VARCHAR(30),
        IN new_sead_belt VARCHAR(30),  IN new_audio VARCHAR(30),  IN new_karpet_mobil VARCHAR(30),  IN new_ban_serep VARCHAR(30),  IN new_stnk VARCHAR(30),  IN new_foto_kondisi_mobil text

    )
    BEGIN
        DECLARE pesan_error CHAR(5) DEFAULT '000';
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
    
        BEGIN
        GET DIAGNOSTICS CONDITION 1
        pesan_error = RETURNED_SQLSTATE;
        END;

        -- Sisipkan data ke dalam tabel detail sewa
        START TRANSACTION;
        savepoint satu;
        INSERT INTO detail_sewa (id_jenis_mobil, lampu, merk, plat ,dongkrak_kit, klakson, head_rest, kebersihan_mobil, seat_belt, audio,
        karpet_mobil, ban_serep, stnk, foto_kodisi_mobil)
        VALUES (new_id_jenis_mobil,  new_lampu,  new_merk,  new_plat, 
        new_dongkrak_kit,  new_klakson,  new_head_rest,  new_kebersihan_mobil,
        new_sead_belt,  new_audio,  new_karpet_mobil,  new_ban_serep, new_stnk,  new_foto_kondisi_mobil); 

        IF pesan_error != '000' THEN ROLLBACK TO satu;
        END IF;
        COMMIT;
    END");
    }

public function down(): void
    {
        //
    }
};