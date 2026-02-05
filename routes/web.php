<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| PUBLIC (BELUM LOGIN)
|--------------------------------------------------------------------------
*/

// Landing page
Route::get('/', function () {
    return view('index');
});

// Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.proses');

/*
|--------------------------------------------------------------------------
| SISWA (HARUS LOGIN & ROLE SISWA)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth.custom', 'role:siswa'])->group(function () {

    Route::get('/siswa/dashboard', function () {
        return view('siswa.dashboard');
    })->name('siswa.dashboard');

    Route::get('/siswa/pengajuan-konseling', function () {
        return view('siswa.pengajuan');
    })->name('siswa.pengajuan');

    Route::get('/siswa/riwayat-konseling', function () {
        return view('siswa.riwayat');
    })->name('siswa.riwayat');

    Route::get('/siswa/profil', function () {
        return view('siswa.profile');
    })->name('siswa.profile');

    // Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| KONSELOR (HARUS LOGIN & ROLE KONSELOR)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth.custom', 'role:konselor'])->group(function () {

    Route::get('/konselor/dashboard', function () {
        return view('konselor.dashboard');
    })->name('konselor.dashboard');

    Route::get('/konselor/permintaan-konseling', function () {
        return view('konselor.permintaan');
    })->name('konselor.permintaan');

    Route::get('/konselor/jadwal-konseling', function () {
        return view('konselor.jadwal');
    })->name('konselor.jadwal');

    Route::get('/konselor/laporan-konseling', function () {
        return view('konselor.laporan');
    })->name('konselor.laporan');

    // Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
