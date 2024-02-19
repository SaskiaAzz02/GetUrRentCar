<?php

namespace Database\Seeders;


use App\Models\JenisMobil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisMobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'id_jenis_mobil' => '1',
                'nama_jenis' => 'toyota'
            ]
            ];

            foreach ($userData as $user => $val) {
                JenisMobil::create($val);
            }
    }
}
