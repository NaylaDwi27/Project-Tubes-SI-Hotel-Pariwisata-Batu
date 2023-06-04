<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\JenisHotelController;
use App\Http\Controllers\JenisTempatWisataController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\KriteriaHotelController;
use App\Http\Controllers\KriteriaTempatWisataController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObjekAtraksiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\TempatWisataController;
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

// fungsi login
Route::get('/', [LoginController::class, 'index']);
Route::get('login', [LoginController::class, 'index']);
Route::post('check_login', [LoginController::class, 'checkLogin']);
Route::get('logout', [LoginController::class, 'logout']);

Route::get('dashboard', [DashboardController::class, 'index']);

Route::resource('hotel', HotelController::class);
Route::resource('fasilitass', FasilitasController::class);
Route::resource('jenis-hotel', JenisHotelController::class);
Route::resource('jenis-tempat-wst', JenisTempatWisataController::class);
Route::resource('kamar', KamarController::class);
Route::resource('kriteria-hotel', KriteriaHotelController::class);
Route::resource('kriteria-tempat-wst', KriteriaTempatWisataController::class);
Route::resource('objek-atraksi', ObjekAtraksiController::class);
Route::resource('pegawai', PegawaiController::class);
Route::resource('pemesanan', PemesananController::class);
Route::resource('penilaian', PenilaianController::class);
Route::resource('tempat-wst', TempatWisataController::class);

// route untuk print pdf
Route::get('print-hotel', [HotelController::class, 'print']);
Route::get('print-tempat-wst', [TempatWisataController::class, 'print']);
Route::get('print-jenis-hotel', [JenisHotelController::class, 'print']);
Route::get('print-jenis-tempat-wst', [JenisTempatWisataController::class, 'print']);
Route::get('print-kamar', [KamarController::class, 'print']);
Route::get('print-kriteria-hotel', [KriteriaHotelController::class, 'print']);
Route::get('print-kriteria-tempat-wst', [KriteriaTempatWisataController::class, 'print']);
Route::get('print-objek-atraksi', [ObjekAtraksiController::class, 'print']);
Route::get('print-fasilitas', [FasilitasController::class, 'print']);
Route::get('print-pegawai', [PegawaiController::class, 'print']);
Route::get('print-pemesanan', [PemesananController::class, 'print']);
Route::get('print-penilaian', [PenilaianController::class, 'print']);
