<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('riwayat_kecelakaan_kerja', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mcu_id')->constrained('medical_check_up')->onDelete('cascade');

            // Jatuh dari ketinggian
            $table->boolean('jatuh_dari_ketinggian')->default(false);
            $table->integer('jatuh_dari_ketinggian_tahun')->nullable();

            // Tersayat benda tajam
            $table->boolean('tersayat_benda_tajam')->default(false);
            $table->integer('tersayat_benda_tajam_tahun')->nullable();

            // Tersengat listrik
            $table->boolean('tersengat_listrik')->default(false);
            $table->integer('tersengat_listrik_tahun')->nullable();

            // Terbakar
            $table->boolean('terbakar')->default(false);
            $table->integer('terbakar_tahun')->nullable();

            // Terbentur
            $table->boolean('terbentur')->default(false);
            $table->integer('terbentur_tahun')->nullable();

            // Tergores
            $table->boolean('tergores')->default(false);
            $table->integer('tergores_tahun')->nullable();

            // Terkilir
            $table->boolean('terkilir')->default(false);
            $table->integer('terkilir_tahun')->nullable();

            // Tertiban
            $table->boolean('tertiban')->default(false);
            $table->integer('tertiban_tahun')->nullable();

            // Tertusuk
            $table->boolean('tertusuk')->default(false);
            $table->integer('tertusuk_tahun')->nullable();

            // Terpotong
            $table->boolean('terpotong')->default(false);
            $table->integer('terpotong_tahun')->nullable();

            // Kemasukan benda asing
            $table->boolean('kemasukan_benda_asing')->default(false);
            $table->integer('kemasukan_benda_asing_tahun')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_kecelakaan_kerja');
    }
};
