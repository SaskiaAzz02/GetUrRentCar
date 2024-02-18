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

        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalPengembalian');

        DB::unprepared('
        CREATE FUNCTION CountTotalPengembalian() RETURNS INT
        BEGIN
        DECLARE total INT;
        SELECT COUNT(*) INTO total FROM pengembalian;
        RETURN total;
        END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalPembayaran');

        DB::unprepared('
        CREATE FUNCTION CountTotalPembayaran() RETURNS INT
        BEGIN
        DECLARE total INT;
        SELECT COUNT(*) INTO total FROM pembayaran;
        RETURN total;
        END
        ');
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalMobil');
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalPengembalian');
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalPembayaran');
    }
};
