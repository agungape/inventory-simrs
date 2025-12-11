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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $faker = Faker::create('id_ID');
        $faker->seed(123);
        $date = $faker->dateTime;
        $nama = [
            "Pending",
            "Confirmed",
            "Rejected"
        ];
        $serial_number = [
            "1126799938",
            "1126494948",
            "1120223172"
        ];
        for ($i = 0; $i < 3; $i++) {
            Barang::create(
                [
                    'nama' => $faker->randomElement($nama),
                    'serial_number' =>
                    $faker->unique()->randomElement($serial_number),
                    'tgl_beli' => $faker->dateTime(),
                    'gambar' => 'test',
                ]
            );
        }
    }
}
