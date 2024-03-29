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
           " menambahkan jenis mobil", 
           COALESCE(new.id_jenis_mobil, ""),
           " menambahkan merk mobil",  
           COALESCE(new.merk, ""),
           " menambahkan plat mobil",  
           COALESCE(new.plat_mobil, ""),
           " menambahkan nomor rangka mobil",  
           COALESCE(new.nomor_rangka, "")
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
        DB::unprepared('DROP TRIGGER IF EXISTS insertMobil');
    }

};