<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\JenisCuciController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesanController;
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


    Route::resource('/pemesanan', PemesanController::class);

    Route::group(['middleware' => 'role:pelanggan'], function(){
        Route::resource('/pelanggan', PelangganController::class);
        Route::get('/pemesanan-pelanggan', [PelangganController::class, 'pemesanan'])->name('pelanggan.pemesanan');
    });

    Route::group(['middleware' => 'role:manajer,kasir'], function(){
        Route::get('/', [DashboardController::class, 'index'])->name('home');
    });

    Route::group(['middleware' => 'role:manajer'], function(){
        Route::resource('/karyawan', KaryawanController::class);
        Route::resource('/jeniscuci', JenisCuciController::class);
    });

});
