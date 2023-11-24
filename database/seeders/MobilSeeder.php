<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $jenisData = [
                ['jenis_surat' => 'Sakit'],
                ['jenis_surat' => 'Izin'],
            ];
    
            foreach ($jenisData as $data) {
                JenisSurat::create($data);
            }
        }

        // Melakukan looping data dengan foreach
        foreach ($akun as $user => $val) {
            Akun::create($val);
        }
    }
    }

