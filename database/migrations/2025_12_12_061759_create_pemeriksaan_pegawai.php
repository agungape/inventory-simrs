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
        Schema::create('pemeriksaan_pegawai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mcu_id')->constrained('medical_check_up')->onDelete('cascade');
            $table->foreignId('jenispemeriksaan_id')->constrained('jenispemeriksaans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_pegawai');
    }
};
