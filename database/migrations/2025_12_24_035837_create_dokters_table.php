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
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->string('nip')->nullable()->unique();
            $table->string('jabatan')->nullable();
            $table->string('spesialisasi')->nullable();
            $table->string('no_sip')->nullable()->comment('Surat Izin Praktik');
            $table->string('no_telp')->nullable();
            $table->string('email')->nullable();
            $table->text('alamat')->nullable();
            $table->boolean('status')->default(true)->comment('true = aktif, false = nonaktif');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};
