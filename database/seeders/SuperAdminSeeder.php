<?php

namespace Database\Seeders;

use App\Models\SuperAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'id_akun' => '1',
                'nama' => 'superadmin',
                'nomor_hp' => '081311961806'
            ]
            ];

            foreach ($userData as $user => $val) {
                SuperAdmin::create($val);
            }
    }
}

