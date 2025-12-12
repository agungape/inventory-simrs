<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jenisKelamin = $this->faker->randomElement(['L', 'P']);
        $firstName = $jenisKelamin === 'L'
            ? $this->faker->firstNameMale()
            : $this->faker->firstNameFemale();

        // Generate NIK (16 digit)
        $nik = '32' . // Kode provinsi (contoh: Jawa Barat)
            $this->faker->numberBetween(70, 75) . // Kode kota/kab
            $this->faker->numberBetween(1, 12) . $this->faker->numberBetween(1, 31) . // Tgl lahir: MMdd
            $this->faker->numberBetween(80, 99) . // Tahun lahir (80-99)
            $this->faker->numberBetween(1000, 9999) . // 4 digit random
            $this->faker->numberBetween(0, 9); // 1 digit terakhir

        // Generate NRP (8 digit)
        $nrp = 'EMP' . str_pad($this->faker->unique()->numberBetween(1, 99999), 5, '0', STR_PAD_LEFT);

        // Daftar departemen, jabatan, dan perusahaan
        $departements = ['HRD', 'IT', 'Finance', 'Marketing', 'Production', 'Logistics', 'Quality Control', 'Maintenance'];
        $jabatans = ['Staff', 'Supervisor', 'Manager', 'Assistant Manager', 'Senior Staff', 'Junior Staff'];
        $bagians = ['Administrasi', 'Operational', 'Engineering', 'Support', 'Creative', 'Technical'];
        $perusahaans = [
            'PT Astra International',
            'PT Unilever Indonesia',
            'PT Pertamina',
            'PT Telekomunikasi Indonesia',
            'PT Bank Central Asia',
            'PT Gudang Garam',
            'PT Semen Indonesia',
            'PT Kalbe Farma'
        ];

        return [
            'nrp' => $nrp,
            'nama' => $firstName . ' ' . $this->faker->lastName(),
            'nik' => $nik,
            'tanggal_lahir' => $this->faker->dateTimeBetween('-50 years', '-20 years')->format('Y-m-d'),
            'jenis_kelamin' => $jenisKelamin,
            'departement' => $this->faker->randomElement($departements),
            'jabatan' => $this->faker->randomElement($jabatans),
            'bagian' => $this->faker->randomElement($bagians),
            'nama_perusahaan' => $this->faker->randomElement($perusahaans),
            'no_hp' => '08' . $this->faker->numberBetween(100000000, 999999999),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
