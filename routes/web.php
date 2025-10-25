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



// ==========================
// ROUTE UNTUK ROLE GURU
// ==========================

// Dashboard Guru
// Route::get('/dashboard-guru', function () {
//     return view('guru.dashboard-guru');
// })->name('dashboard.guru');

// // Daftar Absensi
// Route::get('/absensi-daftar', function () {
//     return view('guru.absensi-daftar');
// })->name('absensi.daftar');

// // Scan QR Absensi
// Route::get('/absensi-scan', function () {
//     return view('guru.absensi-scan');
// })->name('absensi.scan');

// // Rekap Absensi
// Route::get('/absensi-rekap', function () {
//     return view('guru.absensi-rekap');
// })->name('absensi.rekap');

// // Form Izin / Sakit
// Route::get('/izin-sakit-form', function () {
//     return view('guru.izin-sakit-form');
// })->name('izin.sakit');

// // Laporan Kelas
// Route::get('/laporan-kelas', function () {
//     return view('guru.laporan-kelas');
// })->name('laporan.kelas');

// // Pengumuman Sekolah
// Route::get('/pengumuman-sekolah', function () {
//     return view('guru.pengumuman-sekolah');
// })->name('pengumuman.sekolah');

// // Profil Guru
// Route::get('/profil-guru', function () {
//     return view('guru.profil-guru');
// })->name('profil.guru');




// <?php




// ===============================
// HALAMAN UNTUK ROLE GURU
// ===============================

// Dashboard
Route::get('/dashboard-guru', function () {
    return view('guru.dashboard-guru');
})->name('guru.dashboard');

// Data Absensi
Route::get('/absensi-daftar', function () {
    return view('guru.absensi-daftar');
})->name('guru.absensi.daftar');

// Scan QR
Route::get('/absensi-scan', function () {
    return view('guru.absensi-scan');
})->name('guru.absensi.scan');

// Rekap Absensi
Route::get('/absensi-rekap', function () {
    return view('guru.absensi-rekap');
})->name('guru.absensi.rekap');

// Izin / Sakit
Route::get('/izin-sakit-form', function () {
    return view('guru.izin-form');
})->name('guru.izin.form');

// Laporan Kelas
Route::get('/laporan-kelas', function () {
    return view('guru.laporan-kelas');
})->name('guru.laporan.kelas');

// Profil Guru
Route::get('/profil-guru', function () {
    return view('guru.profil');
})->name('guru.profil');

