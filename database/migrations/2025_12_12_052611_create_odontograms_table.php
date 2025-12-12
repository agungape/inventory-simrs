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
        Schema::create('odontograms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemeriksaan_gigi_mulut_id')
                ->constrained('pemeriksaan_gigi_muluts')
                ->onDelete('cascade');

            $table->tinyInteger('tooth_number')->unsigned(); // 11-48
            $table->string('tooth_name'); // 11-48
            $table->enum('problem_type', [
                'karang_gigi',
                'gigi_tanggal',
                'gigi_berlubang',
                'sisa_akar',
                'tambalan_gigi',
                'perawatan_salakar',
                'tumpatan',
                'gigi_palsu',
                'lain_lain'
            ])->nullable();

            $table->text('description')->nullable();
            /*$table->enum('surface', [
                'mesial', 'distal', 'occlusal',
                'buccal', 'lingual', 'multiple'
            ])->nullable();*/

            /*$table->enum('severity', ['ringan', 'sedang', 'berat'])->nullable();*/

            // Unique constraint untuk mencegah duplikasi
            $table->unique(['pemeriksaan_gigi_mulut_id', 'tooth_number', 'problem_type'],
                'unique_tooth_condition');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('odontograms');
    }
};
