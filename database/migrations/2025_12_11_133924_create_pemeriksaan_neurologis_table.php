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
        Schema::create('pemeriksaan_neurologis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mcu_id')->constrained('medical_check_up')->onDelete('cascade');
            $table->enum('reflek_fisologis', ['normal', 'tidak normal'])->nullable();
            $table->text('reflek_fisologis_tidak_normal')->nullable();
            $table->enum('reflek_patologis', ['tidak ada', 'ada'])->nullable();
            $table->enum('kekuatan_motorik', ['normal', 'tidak normal'])->nullable();
            $table->text('kekuatan_motorik_tidak_normal')->nullable();
            $table->enum('sensorik', ['normal', 'tidak normal'])->nullable();
            $table->text('sensorik_tidak_normal')->nullable();
            $table->enum('otot_otot_atau_tonus', ['normotoni', 'hipertoni'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_neurologis');
    }
};
