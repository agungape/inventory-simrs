<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'password',
            'email_verified_at' => now(),
        ]);

        // Pesan konfirmasi (opsional)
        $this->command->info('User seeding berhasil. 1 user utama telah ditambahkan.');
    }
}
