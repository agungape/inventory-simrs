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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nrp')->unique();
            $table->string('nama');
            $table->string('nik', 16)->unique()->comment('Nomor Induk Kependudukan');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('departement')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('bagian')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('no_hp')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
