<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama (gunakan delete karena ada softDeletes)
        DB::table('employees')->delete();
        DB::statement('ALTER TABLE employees AUTO_INCREMENT = 1');

        // Data karyawan tetap (default)
        $defaultEmployees = [
            [
                'nrp' => 'EMP00001',
                'nama' => 'Ahmad Santoso',
                'nik' => '3275011501880001',
                'tanggal_lahir' => '1988-01-15',
                'jenis_kelamin' => 'L',
                'departement' => 'IT',
                'jabatan' => 'Manager',
                'bagian' => 'Engineering',
                'nama_perusahaan' => 'PT Astra International',
                'no_hp' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nrp' => 'EMP00002',
                'nama' => 'Siti Rahayu',
                'nik' => '3276022503910002',
                'tanggal_lahir' => '1991-03-25',
                'jenis_kelamin' => 'P',
                'departement' => 'HRD',
                'jabatan' => 'Supervisor',
                'bagian' => 'Administrasi',
                'nama_perusahaan' => 'PT Unilever Indonesia',
                'no_hp' => '082345678901',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nrp' => 'EMP00003',
                'nama' => 'Budi Prasetyo',
                'nik' => '3277031005930003',
                'tanggal_lahir' => '1993-05-10',
                'jenis_kelamin' => 'L',
                'departement' => 'Finance',
                'jabatan' => 'Staff',
                'bagian' => 'Operational',
                'nama_perusahaan' => 'PT Pertamina',
                'no_hp' => '083456789012',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nrp' => 'EMP00004',
                'nama' => 'Dewi Anggraini',
                'nik' => '3278040508950004',
                'tanggal_lahir' => '1995-08-05',
                'jenis_kelamin' => 'P',
                'departement' => 'Marketing',
                'jabatan' => 'Assistant Manager',
                'bagian' => 'Creative',
                'nama_perusahaan' => 'PT Bank Central Asia',
                'no_hp' => '084567890123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nrp' => 'EMP00005',
                'nama' => 'Joko Widodo',
                'nik' => '3279052007970005',
                'tanggal_lahir' => '1997-07-20',
                'jenis_kelamin' => 'L',
                'departement' => 'Production',
                'jabatan' => 'Senior Staff',
                'bagian' => 'Technical',
                'nama_perusahaan' => 'PT Gudang Garam',
                'no_hp' => '085678901234',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data default
        foreach ($defaultEmployees as $employee) {
            DB::table('employees')->insertOrIgnore($employee);
        }

        // Buat data dummy dengan Factory (opsional)
        // Employee::factory()->count(50)->create();

        $this->command->info('Data karyawan berhasil ditambahkan!');
        $this->command->info('Total karyawan: ' . DB::table('employees')->count());
    }
}
