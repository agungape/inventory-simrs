<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pemeriksaan_fisik', function (Blueprint $table) {
            $table->id();

            // Relasi MCU
            $table->foreignId('mcu_id')->constrained('medical_check_up')->onDelete('cascade');

            // Keadaan Umum
            $table->enum('kesan_umum', ['baik', 'cukup', 'kurang'])->nullable();
            $table->enum('kepala_dan_wajah', ['normal', 'deformitas', 'luka', 'tumor'])->nullable();

            // Kulit
            $table->boolean('kulit_pucat')->nullable();
            $table->boolean('kulit_ikterik')->nullable();

            // Mata
            $table->boolean('mata_normal')->nullable();
            $table->boolean('hiperemis')->nullable();
            $table->boolean('strabismus')->nullable();
            $table->boolean('sekret')->nullable();
            $table->boolean('ikterik_mata')->nullable();
            $table->boolean('anemis')->nullable();
            $table->boolean('pterigium')->nullable();
            // OD / OS
            $table->boolean('od_os')->nullable();
            $table->string('od_nilai')->nullable();
            $table->string('os_nilai')->nullable();

            // Visus
            $table->boolean('visus_jauh')->nullable();
            $table->string('nilai_visus_jauh')->nullable();
            $table->boolean('visus_dekat')->nullable();
            $table->string('nilai_visus_dekat')->nullable();
            $table->boolean('lapang_pandang')->nullable();
            $table->string('nilai_lapang_pandang')->nullable();
            $table->boolean('tiga_dimensi')->nullable();
            $table->string('nilai_tiga_dimensi')->nullable();

            // Buta warna
            $table->boolean('buta_warna')->nullable();
            $table->enum('nilai_buta_warna', ['parsial', 'total'])->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_fisik');
    }
};
