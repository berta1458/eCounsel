<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', fn () => view('index'));
Route::get('/siswa-dashboard', fn () => view('siswa/dashboard'));
Route::get('/profil-siswa', fn () => view('siswa/profile'));
Route::get('/pengajuan-konseling', fn () => view('siswa/pengajuan'));
Route::get('/riwayat-konseling', fn () => view('siswa/riwayat'));

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.proses');

Route::middleware(['auth.custom', 'role:siswa'])->group(function () {
    Route::get('/siswa/dashboard', function () {
        return view('siswa.dashboard');
    });
});

Route::middleware(['auth.custom', 'role:konselor'])->group(function () {
    Route::get('/konselor/dashboard', function () {
        return view('konselor.dashboard');
    });
});
