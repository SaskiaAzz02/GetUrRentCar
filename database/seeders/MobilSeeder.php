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
        $userData = [
            [
                'username' => 'superadmin',
                'role' => 'superadmin',
                'password' => Hash::make('superadmin')
            ],
            [
                'username' => 'admin',
                'role' => 'admin',
                'password' => Hash::make('admin')
            ],
            [
                'username' => 'customer',
                'role' => 'customer',
                'password' => Hash::make('customer')
            ]
        ];

        // Melakukan looping data dengan foreach
        foreach ($userData as $user => $val) {
            Akun::create($val);
        }
    }
    }

