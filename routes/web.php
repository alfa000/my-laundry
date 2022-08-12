<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\JenisCuciController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {


    Route::resource('/pemesanan', PemesananController::class);

    Route::group(['middleware' => 'role:pelanggan'], function(){
        Route::resource('/pelanggan', PelangganController::class);
        Route::get('/pelanggan-form-pemesanan', [PelangganController::class, 'pemesanan'])->name('pelanggan.pemesanan');
        Route::get('/pelanggan-data-pemesanan', [PelangganController::class, 'createPemesanan'])->name('pelanggan.pemesanan.create');
    });

    Route::group(['middleware' => 'role:manajer,kasir'], function(){
        Route::get('/', [DashboardController::class, 'index'])->name('home');
        Route::put('/pemesanan-update-status/{id}', [PemesananController::class, 'updateStatus'])->name('pemesanan.update.status');
        Route::get('/pemesanan-print', [PemesananController::class, 'print'])->name('pemesanan.print');
    });

    Route::group(['middleware' => 'role:manajer'], function(){
        Route::resource('/karyawan', KaryawanController::class);
        Route::resource('/jeniscuci', JenisCuciController::class);
    });

});
