<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kebiasaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mcu_id')->constrained('medical_check_up')->onDelete('cascade');

            // Minum Alkohol
            $table->boolean('minum_alkohol')->default(false);
            $table->integer('minum_alkohol_jumlah')->nullable(); // botol / hari

            // Merokok
            $table->boolean('merokok')->default(false);
            $table->integer('merokok_jumlah')->nullable(); // batang / hari

            // Olahraga
            $table->boolean('olahraga')->default(false);
            $table->integer('olahraga_jumlah')->nullable(); // kali / minggu

            // Minum Kopi
            $table->boolean('minum_kopi')->default(false);
            $table->integer('minum_kopi_jumlah')->nullable(); // gelas / hari

            $table->timestamps();

            // Optional foreign key
            // $table->foreign('mcu_id')->references('id')->on('mcus')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kebiasaan');
    }
};
