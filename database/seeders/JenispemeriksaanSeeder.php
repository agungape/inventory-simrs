<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jenispemeriksaan;

class JenispemeriksaanSeeder extends Seeder
{
    public function run(): void
    {
        $pemeriksaanMandiri = [
            'Pemeriksaan Fisik',
            'Rontgen Thorax',
            'EKG',
            'Treadmill',
            'Spirometer',
            'Audiometer',
        ];

        foreach ($pemeriksaanMandiri as $item) {
            Jenispemeriksaan::create([
                'nama_pemeriksaan' => $item,
                'parent_id' => null
            ]);
        }

        $laboratorium = Jenispemeriksaan::create([
            'nama_pemeriksaan' => 'Laboratorium',
            'parent_id' => null
        ]);

        $labItems = [
            'Darah Lengkap',
            'Urine Lengkap',
            'GDP',
            'Kolesterol Total',
            'LDL',
            'HDL',
            'TG',
            'Ureum',
            'Kreatinin',
            'Asam Urat',
            'SGOT',
            'SGPT',
            'HBsAg',
            'Bilirubin Total',
            'Drug Test',
        ];

        foreach ($labItems as $item) {
            Jenispemeriksaan::create([
                'nama_pemeriksaan' => $item,
                'parent_id' => $laboratorium->id
            ]);
        }
    }
}
