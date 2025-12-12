<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemeriksaan_thts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mcu_id')->constrained('medical_check_up')->onDelete('cascade');
            $table->enum('daun_telinga', ['normal', 'tidak normal'])->nullable();
            $table->text('daun_telinga_tidak_normal')->nullable();
            $table->enum('lubang_telinga', ['normal', 'tidak normal'])->nullable();
            $table->text('lubang_telinga_tidak_normal')->nullable();
            $table->enum('membran_tymphani', ['normal', 'tidak normal'])->nullable();
            $table->text('membran_tymphani_tidak_normal')->nullable();
            $table->enum('hidung_septum_concha', ['normal', 'tidak normal'])->nullable();
            $table->text('hidung_septum_concha_tidak_normal')->nullable();
            $table->enum('faring', ['normal', 'tidak normal'])->nullable();
            $table->text('faring_tidak_normal')->nullable();
            $table->enum('tonsil', ['normal', 'tidak normal'])->nullable();
            $table->text('tonsil_tidak_normal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_thts');
    }
};
