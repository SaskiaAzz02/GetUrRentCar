<?php

namespace Database\Seeders;


use App\Models\Penyewaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenyewaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
        {
            $userData = [
                [
                    'id_penyewaan' => '1',
                    'id_mobil' => '1',
                    'tanggal_peminjaman' => '2024-02-19',
                    'jumlah_sewa' => '1'
                ]
                ];
    
                foreach ($userData as $user => $val) {
                    Penyewaan::create($val);
                }
        }
    }
