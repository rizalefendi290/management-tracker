<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Session;

// Admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GajiController as AdminGajiController;
use App\Http\Controllers\Admin\ShiftController;

// Karyawan
use App\Http\Controllers\Karyawan\BiodataController;
use App\Http\Controllers\Karyawan\BerkasController;
use App\Http\Controllers\Karyawan\GajiViewController;
use App\Http\Controllers\Karyawan\ShiftViewController;
use App\Http\Controllers\Karyawan\KaryawanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sistem', fn () => view('auth.form'))->name('login.form');

//Auth routes
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::resource('/gaji', AdminGajiController::class);
    Route::get('/gaji/pdf', [AdminGajiController::class, 'exportPDF'])->name('gaji.pdf');

    Route::resource('/shift', ShiftController::class);
    Route::get('/admin/shift', [ShiftController::class, 'index'])->name('shift.index');

});

//Karyawan Routes
Route::prefix('karyawan')->group(function () {
    Route::get('/dashboard', [KaryawanController::class, 'index'])->name('karyawan.dashboard');

    Route::get('/gaji', [GajiViewController::class, 'index'])->name('karyawan.gaji.index');
    Route::get('/shift', [ShiftViewController::class, 'index'])->name('karyawan.shift.index');

    Route::resource('/biodata', BiodataController::class)->names([
        'index' => 'karyawan.biodata.index',
        'create' => 'karyawan.biodata.create',
        'store' => 'karyawan.biodata.store',
        'edit' => 'karyawan.biodata.edit',
        'update' => 'karyawan.biodata.update',
        'show' => 'karyawan.biodata.show',
        'destroy' => 'karyawan.biodata.destroy',
    ]);

    Route::post('/karyawan/biodata', [BiodataController::class, 'store'])->name('karyawan.biodata.store');


    Route::get('/berkas/{id}/download', [BerkasController::class, 'download'])->name('berkas.download');

    Route::resource('/berkas', BerkasController::class)->names([
        'index' => 'karyawan.berkas.index',
        'create' => 'karyawan.berkas.create',
        'store' => 'karyawan.berkas.store',
        'edit' => 'karyawan.berkas.edit',
        'update' => 'karyawan.berkas.update',
        'show' => 'karyawan.berkas.show',
        'destroy' => 'karyawan.berkas.destroy',
    ]);
});
