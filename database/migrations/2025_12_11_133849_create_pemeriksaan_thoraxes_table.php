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
        Schema::create('pemeriksaan_thoraxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mcu_id')->constrained('medical_check_up')->onDelete('cascade');
            $table->enum('bentuk', ['normal', 'tidak normal'])->nullable();
            $table->text('bentuk_tidak_normal')->nullable();
            $table->enum('inspeksi', ['normal', 'tidak normal'])->nullable();
            $table->text('inspeksi_tidak_normal')->nullable();
            $table->enum('palpasi', ['normal', 'tidak normal'])->nullable();
            $table->text('palpasi_tidak_normal')->nullable();
            $table->enum('perkusi', ['normal', 'tidak normal'])->nullable();
            $table->text('perkusi_tidak_normal')->nullable();
            $table->enum('aukultasi', ['normal', 'tidak normal'])->nullable();
            $table->text('aukultasi_tidak_normal')->nullable();
            $table->enum('lainnya', ['normal', 'tidak normal'])->nullable();
            $table->text('lainnya_tidak_normal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_thoraxes');
    }
};
