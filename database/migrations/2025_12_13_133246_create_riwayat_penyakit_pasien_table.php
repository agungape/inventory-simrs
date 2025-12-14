<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('riwayat_penyakit_pasien', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mcu_id')->constrained('medical_check_up')->onDelete('cascade');

            // Riwayat Hepatitis
            $table->boolean('riwayat_hepatitis')->default(false);
            $table->string('riwayat_hepatitis_keterangan')->nullable();

            // Riwayat Pengobatan TBC
            $table->boolean('riwayat_pengobatan_tbc')->default(false);
            $table->string('riwayat_pengobatan_tbc_keterangan')->nullable();

            // Hipertensi / Tekanan Darah Tinggi
            $table->boolean('hipertensi')->default(false);

            // Diabetes Melitus / Kencing Manis
            $table->boolean('diabetes_melitus')->default(false);

            // Riwayat Operasi
            $table->boolean('riwayat_operasi')->default(false);
            $table->string('riwayat_operasi_keterangan')->nullable();

            // Riwayat Rawat Inap
            $table->boolean('riwayat_rawat_inap')->default(false);
            $table->string('riwayat_rawat_inap_keterangan')->nullable();

            // Pengobatan Saat Ini
            $table->boolean('pengobatan_saat_ini')->default(false);
            $table->string('pengobatan_saat_ini_keterangan')->nullable();

            // Alergi Obat / Makanan
            $table->boolean('alergi_obat_makanan')->default(false);
            $table->string('alergi_obat_makanan_keterangan')->nullable();

            // Konsumsi Obat
            $table->boolean('konsumsi_obat')->default(false);
            $table->string('konsumsi_obat_keterangan')->nullable();

            // Lain-lain
            $table->boolean('lain_lain')->default(false);
            $table->string('lain_lain_keterangan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_penyakit_pasien');
    }
};
