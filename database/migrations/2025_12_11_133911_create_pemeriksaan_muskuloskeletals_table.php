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
        Schema::create('pemeriksaan_muskuloskeletals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mcu_id')->constrained('medical_check_up')->onDelete('cascade');
            $table->enum('kelainan_tulang_atau_sendi', ['tidak ada', 'ada'])->nullable();
            $table->enum('kelainan_otot', ['tidak ada', 'ada'])->nullable();
            $table->enum('kelainan_jari_atau_tangan', ['tidak ada', 'ada'])->nullable();
            $table->enum('kelainan_jari_atau_kaki', ['tidak ada', 'ada'])->nullable();
            $table->boolean('tulang_belakang_normal');
            $table->boolean('tulang_belakang_skoliosis');
            $table->boolean('tulang_belakang_lordosis');
            $table->boolean('tulang_belakang_kifosis');
            $table->text('lain_lain')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_muskuloskeletals');
    }
};
