<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('riwayat_penyakit_keluarga', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mcu_id')->constrained('medical_check_up')->onDelete('cascade');

            // A. Penyakit Jantung
            $table->boolean('penyakit_jantung')->default(false);

            // B. Penyakit Darah Tinggi
            $table->boolean('penyakit_darah_tinggi')->default(false);

            // C. Penyakit Kencing Manis
            $table->boolean('penyakit_kencing_manis')->default(false);

            // D. Penyakit Stroke
            $table->boolean('penyakit_stroke')->default(false);

            // E. Penyakit Paru / Menahun / Asthma / TB
            $table->boolean('penyakit_paru_menahun_asthma_tb')->default(false);

            // F. Penyakit Kanker / Tumor
            $table->boolean('penyakit_kanker_tumor')->default(false);

            // G. Penyakit Gangguan Jiwa
            $table->boolean('penyakit_gangguan_jiwa')->default(false);

            // H. Penyakit Ginjal
            $table->boolean('penyakit_ginjal')->default(false);

            // I. Penyakit Saluran Cerna
            $table->boolean('penyakit_saluran_cerna')->default(false);

            // J. Penyakit Lainnya
            $table->boolean('penyakit_lainnya')->default(false);
            $table->string('penyakit_lainnya_keterangan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_penyakit_keluarga');
    }
};
