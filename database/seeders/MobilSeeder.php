<?php

namespace Database\Seeders;

use App\Models\Mobil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'id_jenis_mobil' =>'1',
                'merk' =>'honda',
                'plat_mobil' =>'B 1234 RPL',
                'nomor_rangka' =>'W9296482519B9356IDN',
                'foto_mobil' =>'mobil.jpeg',
                'harga_sewa_per_hari' =>'123000', 
            ]
            ];

            foreach ($userData as $user => $val) {
                Mobil::create($val);
            }
    }
    }

