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
        Schema::create('pemeriksaan_abdomens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mcu_id')->constrained('medical_check_up')->onDelete('cascade');
            $table->enum('bentuk', ['normal', 'tidak normal'])->nullable();
            $table->text('bentuk_tidak_normal')->nullable();
            $table->enum('palpasi', ['normal', 'tidak normal'])->nullable();
            $table->text('palpasi_tidak_normal')->nullable();
            $table->enum('perkusi', ['normal', 'tidak normal'])->nullable();
            $table->text('perkusi_tidak_normal')->nullable();
            $table->enum('hati', ['normal', 'teraba'])->nullable();
            $table->enum('limpa', ['normal', 'teraba'])->nullable();
            $table->enum('ginjal_test_ketok', ['normal', 'positif'])->nullable();
            $table->enum('hernia', ['tidak ada', 'ada'])->nullable();
            $table->enum('rectal', ['normal', 'haemorhold grade I/II/III', 'skin tag', 'abses','haemorhold externa / interna'])->nullable();
            $table->text('lain_lain')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_abdomens');
    }
};
