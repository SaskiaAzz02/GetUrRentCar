<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $useData = [
            'username' => 'super_admin',
            'role' => 'super_admin',
            'password' => Hash::make('super_admin')
        ];
        [
         'username' => 'admin',
         'role' => 'admin',
         'password' => Hash::make('admin') 
        ];
        [
            'username' => 'customer',
            'role' => 'customer',
            'password' => Hash::make('customer')
        ];
        
        // melakukan looping data dengan foreach
        foreach ($userData as $user => $val) {
            Akun::create($val);
        }
    }
}
