<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;


Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'loginPost'])->name('login.post');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');



Route::get('/', fn() => redirect()->route('dashboard'));


Route::view('/dashboard', 'dashboard', ['title' => 'Dashboard', 'subtitle' => 'Rekap Harian'])->name('dashboard');
Route::view('/students', 'students', ['title' => 'Data Siswa'])->name('students');
Route::view('/generate', 'generate', ['title' => 'Generate & Cetak QR'])->name('generate');
Route::view('/scan', 'scan', ['title' => 'Scan Absensi'])->name('scan');
Route::view('/reports', 'reports', ['title' => 'Laporan Absensi'])->name('reports');
Route::view('/settings', 'settings', ['title' => 'Pengaturan'])->name('settings');


