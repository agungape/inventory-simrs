<?php

namespace Database\Seeders;

use App\Models\Jenispemeriksaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenispemeriksaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis = [
            ['id' => 1, 'nama_pemeriksaan' => 'Pemeriksaan Rutin'],
            ['id' => 2, 'nama_pemeriksaan' => 'Pemeriksaan Darurat'],
            ['id' => 3, 'nama_pemeriksaan' => 'Konsultasi'],
            ['id' => 4, 'nama_pemeriksaan' => 'Laboratorium'],
            ['id' => 5, 'nama_pemeriksaan' => 'Radiologi'],
            ['id' => 6, 'nama_pemeriksaan' => 'Pemeriksaan Gigi'],
            ['id' => 7, 'nama_pemeriksaan' => 'Pengobatan'],
            ['id' => 8, 'nama_pemeriksaan' => 'Vaksinasi'],
            ['id' => 9, 'nama_pemeriksaan' => 'Surat Keterangan'],
            ['id' => 10, 'nama_pemeriksaan' => 'MCU Tahunan'],
            ['id' => 11, 'nama_pemeriksaan' => 'MCU Pra Kerja'],
            ['id' => 12, 'nama_pemeriksaan' => 'Pemeriksaan Khusus'],
        ];

        foreach ($jenis as $data) {
            // Gunakan insertOrIgnore untuk menghindari duplikasi
            DB::table('jenispemeriksaans')->insertOrIgnore($data);
        }

        $this->command->info('Data jenis pemeriksaan berhasil ditambahkan!');
    }
}
