<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('riwayat_bahaya_lingkungan_kerja', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mcu_id')->constrained('medical_check_up')->onDelete('cascade');

            // Bising
            $table->boolean('bising')->default(false);
            $table->integer('bising_jam_per_hari')->nullable();
            $table->integer('bising_selama_tahun')->nullable();

            // Getaran
            $table->boolean('getaran')->default(false);
            $table->integer('getaran_jam_per_hari')->nullable();
            $table->integer('getaran_selama_tahun')->nullable();

            // Debu
            $table->boolean('debu')->default(false);
            $table->integer('debu_jam_per_hari')->nullable();
            $table->integer('debu_selama_tahun')->nullable();

            // Zat Kimia
            $table->boolean('zat_kimia')->default(false);
            $table->integer('zat_kimia_jam_per_hari')->nullable();
            $table->integer('zat_kimia_selama_tahun')->nullable();

            // Panas
            $table->boolean('panas')->default(false);
            $table->integer('panas_jam_per_hari')->nullable();
            $table->integer('panas_selama_tahun')->nullable();

            // Asap
            $table->boolean('asap')->default(false);
            $table->integer('asap_jam_per_hari')->nullable();
            $table->integer('asap_selama_tahun')->nullable();

            // Gerakan Berulang
            $table->boolean('gerakan_berulang')->default(false);
            $table->integer('gerakan_berulang_jam_per_hari')->nullable();
            $table->integer('gerakan_berulang_selama_tahun')->nullable();

            // Monitor Komputer
            $table->boolean('monitor_komputer')->default(false);
            $table->integer('monitor_komputer_jam_per_hari')->nullable();
            $table->integer('monitor_komputer_selama_tahun')->nullable();

            // Mendorong / Menarik
            $table->boolean('mendorong_menarik')->default(false);
            $table->integer('mendorong_menarik_jam_per_hari')->nullable();
            $table->integer('mendorong_menarik_selama_tahun')->nullable();

            // Angkat Beban Berat
            $table->boolean('angkat_beban_berat')->default(false);
            $table->integer('angkat_beban_berat_jam_per_hari')->nullable();
            $table->integer('angkat_beban_berat_selama_tahun')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_bahaya_lingkungan_kerja');
    }
};
