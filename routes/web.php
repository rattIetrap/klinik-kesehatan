<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JanjiTemuController;
use App\Http\Controllers\RekamMedisController;

// Rute untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk Pasien
Route::resource('pasiens', PasienController::class);

// Rute untuk Dokter
Route::resource('dokters', DokterController::class);

// Rute untuk Janji Temu
Route::resource('janji-temus', JanjiTemuController::class);

// Rute untuk Rekam Medis
Route::resource('rekam-medis', RekamMedisController::class);

// Rute untuk autentikasi (jika diperlukan)
// Route::auth();