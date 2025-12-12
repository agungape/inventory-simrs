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
        Schema::create('pemeriksaan_neurologis_khususes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mcu_id')->constrained('medical_check_up')->onDelete('cascade');
            $table->boolean('tes_romberg');
            $table->boolean('tes_laseque');
            $table->boolean('tes_kering');
            $table->boolean('tes_phallen');
            $table->boolean('tes_tunnel');
            $table->boolean('tes_patrick');
            $table->boolean('tes_kontra_patrick');
            $table->boolean('elchoff_tes');
            $table->text('lain_lain')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_neurologis_khususes');
    }
};
