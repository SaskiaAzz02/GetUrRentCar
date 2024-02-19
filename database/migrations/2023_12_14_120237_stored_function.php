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
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalMobil');

        DB::unprepared('
        CREATE FUNCTION CountTotalMobil() RETURNS INT
        BEGIN
        DECLARE total INT;
        SELECT COUNT(*) INTO total FROM mobil;
        RETURN total;
        END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalPenyewaan');

        DB::unprepared('
        CREATE FUNCTION CountTotalPenyewaan() RETURNS INT
        BEGIN
        DECLARE total INT;
        SELECT COUNT(*) INTO total FROM penyewaan;
        RETURN total;
        END
        ');
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalDetailSewa');
        DB::unprepared('
        CREATE FUNCTION CountTotalDetailSewa() RETURNS INT
        BEGIN
        DECLARE total INT;
        SELECT COUNT(*) INTO total FROM detail_sewa;
        RETURN total;
        END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalDetailSewa');
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalMobil');
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalPenyewaan');

        
    }
};
