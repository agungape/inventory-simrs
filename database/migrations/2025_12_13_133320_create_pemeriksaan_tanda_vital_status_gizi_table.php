<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pemeriksaan_tanda_vital_status_gizi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mcu_id')->constrained('medical_check_up')->onDelete('cascade');

            // Tanda vital & status gizi
            $table->decimal('tinggi_badan', 5, 2)->nullable(); // cm
            $table->decimal('berat_badan', 5, 2)->nullable();  // kg
            $table->decimal('lingkar_perut', 5, 2)->nullable(); // cm

            $table->integer('pernafasan')->nullable(); // x / menit
            $table->integer('nadi')->nullable();       // x / menit
            $table->string('tekanan_darah', 10)->nullable(); // mmHg (contoh: 120/80)

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tanda_vital_status_gizi');
    }
};
