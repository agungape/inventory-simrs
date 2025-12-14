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
        Schema::create('data_awal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mcu_id')->constrained('medical_check_up')->onDelete('cascade');
            $table->enum('jenis_mcu', ['pra_kerja', 'anuual_periodik', 'purnakarya'])->nullable();
            $table->text('keluhan_sekarang')->nullable();
            $table->string('puasa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_awal');
    }
};
