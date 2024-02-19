<?php

namespace Database\Seeders;

use App\Models\Akun;
use App\Models\DetailSewa;
use App\Models\SuperAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call(AkunSeeder::class);
       $this->call(JenisMobilSeeder::class);
       $this->call(MobilSeeder::class);
       $this->call(PenyewaanSeeder::class);
        $this->call(DetailSewaSeeder::class);
        $this->call(SuperAdminSeeder::class);
        
    }
}