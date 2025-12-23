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
        Schema::create('hasil_baca_radiologis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dokumen_mcu_id')->constrained('dokumen_mcus')->onDelete('cascade');
            $table->text('hasil')->nullable();
            $table->text('kesimpulan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_baca_radiologis');
    }
};
