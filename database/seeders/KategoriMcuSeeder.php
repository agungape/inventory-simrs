<?php

namespace Database\Seeders;

use App\Models\KategoriMcu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriMcuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis = [
            ['nama' => 'Annual'],
            ['nama' => 'Pra Kerja'],
            ['nama' => 'Pre-Employment'],
            ['nama' => 'Non-Core'],
            ['nama' => 'Core'],
        ];

        foreach ($jenis as $data) {
            // Gunakan insertOrIgnore untuk menghindari duplikasi
            DB::table('kategori_mcus')->insertOrIgnore($data);
        }

        $this->command->info('Data kategori mcu berhasil ditambahkan!');
    }
}
