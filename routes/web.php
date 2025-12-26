<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\McuController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resource('employees', EmployeeController::class);

    // ========== MCU ROUTES ==========
    // Check-in
    Route::get('check-in', [EmployeeController::class, 'checkin'])->name('checkin');
    Route::post('mcu/checkin', [McuController::class, 'store'])->name('mcu.checkin.store');
    Route::delete('mcu/checkin/{id}', [McuController::class, 'destroy'])->name('mcu.checkin.destroy');
    Route::get('checkin/print-label/{checkinId}/{jenisId}', [McuController::class, 'printLabel'])
        ->name('checkin.print-label');

    // MCU Management
    Route::get('mcu', [McuController::class, 'index'])->name('mcu.index');
    Route::get('mcu/{id}', [McuController::class, 'show'])->name('mcu.show');
    Route::put('mcu/{id}/complete', [McuController::class, 'complete'])->name('mcu.complete');

    // ========== FORM PEMERIKSAAN ROUTES ==========
    Route::prefix('form')->name('form.')->group(function () {
        // Main form
        Route::get('pemeriksaan-mcu', [FormController::class, 'index'])->name('pemeriksaan.index');
        Route::get('pemeriksaan-mcu/{mcu_id}', [FormController::class, 'edit'])->name('pemeriksaan.edit');

        // API endpoints
        Route::get('check-mcu-status/{employee_id}', [FormController::class, 'checkMCUStatus'])
            ->name('check-mcu-status');

        // Store endpoints untuk masing-masing tab
        Route::post('data-awal', [FormController::class, 'storeDataAwal'])->name('data-awal.store');
        Route::post('bahaya-lingkungan', [FormController::class, 'storeBahayaLingkungan'])->name('bahaya-lingkungan.store');
        Route::post('kecelakaan-kerja', [FormController::class, 'storeKecelakaanKerja'])->name('kecelakaan-kerja.store');
        Route::post('kebiasaan', [FormController::class, 'storeKebiasaan'])->name('kebiasaan.store');
        Route::post('riwayat-keluarga', [FormController::class, 'storeRiwayatKeluarga'])->name('riwayat-keluarga.store');
        Route::post('riwayat-pasien', [FormController::class, 'storeRiwayatPasien'])->name('riwayat-pasien.store');
        Route::post('tanda-vital', [FormController::class, 'storeTandaVital'])->name('tanda-vital.store');
        Route::post('pemeriksaan-fisik', [FormController::class, 'storePemeriksaanFisik'])->name('pemeriksaan-fisik.store');
        Route::post('tht', [FormController::class, 'storeTHT'])->name('tht.store');
        Route::post('gigi', [FormController::class, 'storeGigi'])->name('gigi.store');
        Route::post('thorax', [FormController::class, 'storeThorax'])->name('thorax.store');
        Route::post('abdomen', [FormController::class, 'storeAbdomen'])->name('abdomen.store');
        Route::post('muskuloskeletal', [FormController::class, 'storeMuskuloskeletal'])->name('muskuloskeletal.store');
        Route::post('neurologis', [FormController::class, 'storeNeurologis'])->name('neurologis.store');
        Route::post('neurologis-khusus', [FormController::class, 'storeNeurologisKhusus'])->name('neurologis-khusus.store');
        Route::post('dokumen-pemeriksaan', [FormController::class, 'storeDokumenPemeriksaan'])->name('dokumen-pemeriksaan.store');
        Route::get('/dokumen-pemeriksaan/{employee_id}', [FormController::class, 'getDokumenPemeriksaan'])->name('dokumen-pemeriksaan.get');
        Route::post('/hasil-pemeriksaan', [FormController::class, 'storeHasilPemeriksaan'])->name('hasil-pemeriksaan.store');
        Route::get('/hasil-pemeriksaan/{employeeId}', [FormController::class, 'showHasilPemeriksaan'])->name('hasil-pemeriksaan.show');
        Route::delete('/dokumen-pemeriksaan/{id}', [FormController::class, 'deleteDokumenPemeriksaan'])
            ->name('dokumen-pemeriksaan.delete');
    });

    Route::prefix('dokumen-hasil')->group(function () {
        Route::get('/', [FormController::class, 'getDokumenHasil'])->name('dokumen.hasil');

        // Untuk AJAX/data
        Route::get('/employee/{employeeId}/checkins', [FormController::class, 'getCheckinHistory'])->name('dokumen.checkin.history');

        // Preview PDF (tampil di browser)
        Route::get('/mcu/{mcuId}/preview-full', [FormController::class, 'previewFullPDF'])->name('dokumen.mcu.preview.full');

        // Download PDF (langsung download)
        Route::get('/mcu/{mcuId}/download-full', [FormController::class, 'downloadFullPDF'])->name('dokumen.mcu.download.full');
    });

    // Routes untuk CRUD Dokter
    Route::prefix('dokter')->name('dokter.')->group(function () {
        Route::get('/', [DokterController::class, 'index'])->name('index');
        Route::get('/create', [DokterController::class, 'create'])->name('create');
        Route::post('/', [DokterController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [DokterController::class, 'edit'])->name('edit');
        Route::put('/{id}', [DokterController::class, 'update'])->name('update');
        Route::delete('/{id}', [DokterController::class, 'destroy'])->name('destroy');
        Route::get('/{id}/restore', [DokterController::class, 'restore'])->name('restore');
    });

    // API untuk mendapatkan list dokter
    Route::get('/api/dokter/list', [DokterController::class, 'getDokterList'])->name('api.dokter.list');
});

// routes/web.php
Route::get('/mcu/validate/{code}', [FormController::class, 'validateQRCode'])
    ->name('mcu.validate');
