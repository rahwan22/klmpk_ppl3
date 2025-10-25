<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    // 🏠 Dashboard
    public function dashboard()
    {
        // Data dummy sementara
        $totalSiswa = 30;
        $hadir = 25;
        $izinSakit = 3;
        $alpa = 2;

        return view('guru.dashboard-guru', compact('totalSiswa', 'hadir', 'izinSakit', 'alpa'));
    }

    // 📋 Daftar Absensi
    public function absensiDaftar()
    {
        $kelas = (object) ['nama' => 'XII RPL 1'];
        $absensi = [
            (object) ['nis' => '1001', 'nama_siswa' => 'Ahmad', 'status' => 'Hadir', 'waktu_masuk' => '07:30', 'waktu_pulang' => '13:00'],
            (object) ['nis' => '1002', 'nama_siswa' => 'Budi', 'status' => 'Izin', 'waktu_masuk' => null, 'waktu_pulang' => null],
        ];

        return view('guru.absensi-daftar', compact('kelas', 'absensi'));
    }

    // 📷 Scan QR
    public function absensiScan()
    {
        return view('guru.absensi-scan');
    }

    // 📊 Rekap Absensi
    public function absensiRekap()
    {
        $rekap = [
            (object) ['nama_siswa' => 'Ahmad', 'hadir' => 20, 'izin' => 2, 'sakit' => 1, 'alpa' => 0, 'terlambat' => 1],
            (object) ['nama_siswa' => 'Budi', 'hadir' => 18, 'izin' => 3, 'sakit' => 2, 'alpa' => 1, 'terlambat' => 0],
        ];

        return view('guru.absensi-rekap', compact('rekap'));
    }

    // 🩺 Izin / Sakit Form
    public function izinForm()
    {
        $siswa = [
            (object) ['nis' => '1001', 'nama_siswa' => 'Ahmad'],
            (object) ['nis' => '1002', 'nama_siswa' => 'Budi'],
        ];

        return view('guru.izin-sakit-form', compact('siswa'));
    }

    // 📑 Laporan Kelas
    public function laporanKelas()
    {
        $kelas = (object) ['nama' => 'XII RPL 1'];
        $laporan = [
            (object) ['nama_siswa' => 'Ahmad', 'hadir' => 20, 'izin' => 2, 'sakit' => 1, 'alpa' => 0, 'terlambat' => 1],
            (object) ['nama_siswa' => 'Budi', 'hadir' => 18, 'izin' => 3, 'sakit' => 2, 'alpa' => 1, 'terlambat' => 0],
        ];

        return view('guru.laporan-kelas', compact('kelas', 'laporan'));
    }

    // 📢 Pengumuman Sekolah
    public function pengumuman()
    {
        $pengumuman = [
            (object) ['judul' => 'Ujian Tengah Semester', 'tanggal' => '2025-10-24', 'isi' => 'UTS dimulai tanggal 30 Oktober 2025.'],
            (object) ['judul' => 'Libur Sekolah', 'tanggal' => '2025-11-10', 'isi' => 'Sekolah diliburkan memperingati Hari Pahlawan.'],
        ];

        return view('guru.pengumuman-sekolah', compact('pengumuman'));
    }

    // 👤 Profil Guru
    public function profil()
    {
        $guru = (object) [
            'nama_guru' => 'Ibu Asdini Sahabuddin',
            'nip' => '19851234',
            'role' => 'Guru',
            'username' => 'asdini.s'
        ];

        return view('guru.profil-guru', compact('guru'));
    }
}
