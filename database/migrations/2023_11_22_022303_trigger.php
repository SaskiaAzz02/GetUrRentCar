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

    public function up()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS insertMobil');
        DB::unprepared(
            'CREATE TRIGGER insertMobil AFTER INSERT ON mobil
    FOR EACH ROW
    BEGIN
        DECLARE aktor VARCHAR(200);
        SELECT username INTO aktor FROM akun WHERE id_akun = 3;
        
        INSERT INTO log (log)
         VALUES (CONCAT(
           COALESCE(aktor, ""),
           "menambahkan jenis mobil", 
           COALESCE(new.id_jenis_mobil, ""),
           "menambahkan merk mobil",  
           COALESCE(new.merk, ""),
           "menambahkan plat mobil",  
           COALESCE(new.plat_mobil, ""),
           "menambahkan nomor rangka mobil",  
           COALESCE(new.nomor_rangka, "")
        ));
    END'
);
DB::unprepared('DROP TRIGGER IF EXISTS  insertPenyewaan');
DB::unprepared(
    'CREATE TRIGGER  insertPenyewaan AFTER INSERT ON penyewaan
    FOR EACH ROW
    BEGIN
        DECLARE aktor VARCHAR(200);
        SELECT username INTO aktor FROM akun WHERE id_akun = 4;

        INSERT INTO log (log)
        VALUES (CONCAT(
            COALESCE(aktor, ""),
            " menambahkan penyewaan dengan nama ",
            COALESCE(new.tanggal_peminjaman, ""),
            " pada tanggal ",
            COALESCE(CURDATE(), "")
        ));
    END'
);

    DB::unprepared('DROP TRIGGER IF EXISTS  insertDetailSewa');
    DB::unprepared(
        'CREATE TRIGGER  insertDetailsewa AFTER INSERT ON detail_sewa
        FOR EACH ROW
        BEGIN
            DECLARE aktor VARCHAR(200);
            SELECT username INTO aktor FROM akun WHERE id_akun = 4;
    
            INSERT INTO log (log)
            VALUES (CONCAT(
                COALESCE(aktor, ""),
                " menambahkan lampu ",
                COALESCE(new.lampu, ""),
                " menambahkan merk ",
                COALESCE(new.merk, ""),
                " menambahkan plat ",
                COALESCE(new.plat, ""),
                " menambahkan dongkrak kit ",
                COALESCE(new.dongkrak_kit, ""),
                " menambahkan klakson ",
                COALESCE(new.klakson, ""),
                " menambahkan head rest ",
                COALESCE(new.head_rest, ""),
                " menambahkan kebersihan mobil ",
                COALESCE(new.kebersihan_mobil, ""),
                " menambahkan seat belt ",
                COALESCE(new.seat_belt, ""),
                " menambahkan audio ",
                COALESCE(new.audio, ""),
                " menambahkan karpet mobil ",
                COALESCE(new.karpet_mobil, ""),
                " menambahkan ban serep ",
                COALESCE(new.ban_serep, ""),
                " menambahkan stnk ",
                COALESCE(new.stnk, "")

            ));
            END'
        );
    }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         // DROP Trigger on Rollback
//         DB::unprepared('DROP TRIGGER IF EXISTS insertPenyewaan');
//         DB::unprepared(
//             'CREATE TRIGGER insertPenyewaan AFTER INSERT ON mobil
//     FOR EACH ROW
//     BEGIN
//         DECLARE aktor VARCHAR(200);
//         SELECT username INTO aktor FROM akun WHERE id_akun = 3;
        
//         INSERT INTO log (log)
//          VALUES (CONCAT(
//            COALESCE(aktor, ""),
//            "tanggal peminjaman,", 
//            COALESCE(new.id_penyewaan, ""),
//            "jumlah sewa",  
//         ));
// }
//     }
// };

public function down(): void
    {
        // DROP Trigger on Rollback
        DB::unprepared('DROP TRIGGER IF EXISTS insertPenyewaan');
        DB::unprepared('DROP TRIGGER IF EXISTS insertDetailSewa');
    }
};