<?php

namespace Database\Seeders;

use App\Models\Barang;
use Faker\Factory as Faker;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            JenispemeriksaanSeeder::class,
            EmployeeSeeder::class,
            UserSeeder::class,
        ]);
    }
}
