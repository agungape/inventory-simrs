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
        Schema::create('pemeriksaan_gigi_muluts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mcu_id')->constrained('medical_check_up')->onDelete('cascade');
            $table->enum('lidah', ['normal', 'tidak normal'])->nullable();
            $table->text('lidah_tidak_normal')->nullable();
            $table->enum('gusi', ['normal', 'tidak normal'])->nullable();
            $table->text('gusi_tidak_normal')->nullable();
            $table->enum('gigi', ['normal', 'tidak normal'])->nullable();
            $table->text('gigi_tidak_normal')->nullable();
            $table->enum('leher', ['normal', 'tidak normal'])->nullable();
            $table->text('leher_tidak_normal')->nullable();
            $table->boolean('karang_gigi');
            $table->boolean('gigi_berlubang');
            $table->boolean('tambalan_gigi');
            $table->boolean('gigi_tanggal');
            $table->boolean('gigi_miring');
            $table->boolean('sisa_akar_gigi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_gigi_muluts');
    }
};
