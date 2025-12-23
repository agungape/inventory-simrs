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
        Schema::create('hasil_pemeriksaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mcu_id')->constrained('medical_check_up')->onDelete('cascade');
            $table->text('kesimpulan')->nullable();
            $table->text('saran')->nullable();
            $table->enum('kategori_hasil', ['fit', 'fit_dengan_catatan', 'unfit', 'pending'])->default('pending');
            $table->text('tim_medis')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hasil_pemeriksaans');
    }
};
