<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('dashboard'));


Route::view('/dashboard', 'dashboard', ['title' => 'Dashboard', 'subtitle' => 'Rekap Harian'])->name('dashboard');
Route::view('/students', 'students', ['title' => 'Data Siswa'])->name('students');
Route::view('/generate', 'generate', ['title' => 'Generate & Cetak QR'])->name('generate');
Route::view('/scan', 'scan', ['title' => 'Scan Absensi'])->name('scan');
Route::view('/reports', 'reports', ['title' => 'Laporan Absensi'])->name('reports');
Route::view('/settings', 'settings', ['title' => 'Pengaturan'])->name('settings');

