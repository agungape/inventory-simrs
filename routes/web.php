<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\McuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('employees', EmployeeController::class);
Route::get('form', [FormController::class,'index']);
Route::post('form', [FormController::class,'store'])->name('form.store');
Route::get('check-in', [EmployeeController::class, 'checkin'])->name('checkin');
Route::post('/mcu/checkin', [McuController::class, 'store'])->name('mcu.checkin.store');
Route::get('/checkin/print-label/{checkinId}/{jenisId}', [McuController::class, 'printLabel'])
    ->name('checkin.print-label');
