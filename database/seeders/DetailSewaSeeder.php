<?php

namespace Database\Seeders;

use App\Models\DetailSewa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailSewaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'id_penyewaan' => '1',
                'id_jenis_mobil' => '1',
                'lampu' => 'baik',
                'merk' => 'toyota',
                'plat' => 'B 123 YKT',
                'dongkrak_kit' => 'baik',
                'klakson' => 'baik',
                'head_rest' => 'baik',
                'kebersihan_mobil' => 'baik',
                'seat_belt' => 'baik',
                'audio' => 'baik',
                'karpet_mobil' => 'baik',
                'ban_serep' => 'baik',
                'stnk' => 'baik',
                'foto_kondisi_mobil' => 'file'
            ]
            ];

            foreach ($userData as $user => $val) {
                DetailSewa::create($val);
            }
    }
}
