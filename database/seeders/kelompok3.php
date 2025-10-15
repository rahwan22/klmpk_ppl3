<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;   // ✅ tambahkan baris ini
use Illuminate\Support\Str;
use Carbon\Carbon;


class kelompok3 extends Seeder
{
 
    public function run(): void
    {
        
            // 1️⃣ Guru
        DB::table('guru')->insert([
            [
                'nip' => '1978010119900101',
                'nama' => 'Budi Santoso',
                'role' => 'wali_kelas',
                'password_hash' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => '1980050519990202',
                'nama' => 'Ani Wijaya',
                'role' => 'guru_piket',
                'password_hash' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => '1989101020080103',
                'nama' => 'Rahmat Hidayat',
                'role' => 'admin',
                'password_hash' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 2️⃣ Kelas
        DB::table('kelas')->insert([
            [
                'nama_kelas' => '6A',
                'id_guru_wali' => 1,
                'kontak' => '08123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kelas' => '6B',
                'id_guru_wali' => 3,
                'kontak' => '08129876543',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kelas' => '5A',
                'id_guru_wali' => 2,
                'kontak' => '081300112233',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 3️⃣ Orang Tua
        DB::table('orangtua')->insert([
            [
                'nama' => 'Siti Rahmawati',
                'kontak_email' => 'siti@gmail.com',
                'kontak_wa' => '081345678901',
                'preferensi_notif' => json_encode(['wa' => true, 'email' => true]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ahmad Yusuf',
                'kontak_email' => 'ahmad@gmail.com',
                'kontak_wa' => '081355555432',
                'preferensi_notif' => json_encode(['wa' => true]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dewi Kartika',
                'kontak_email' => 'dewi@gmail.com',
                'kontak_wa' => '081366666789',
                'preferensi_notif' => json_encode(['email' => true]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 4️⃣ Siswa
        DB::table('siswa')->insert([
            [
                'nis' => '20230001',
                'nama' => 'Rina Andayani',
                'tanggal_lahir' => '2012-05-12',
                'id_kelas' => 1,
                'qr_code' => Str::random(32),
                'id_orangtua' => 1,
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nis' => '20230002',
                'nama' => 'Dedi Gunawan',
                'tanggal_lahir' => '2012-07-03',
                'id_kelas' => 2,
                'qr_code' => Str::random(32),
                'id_orangtua' => 2,
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nis' => '20230003',
                'nama' => 'Aulia Putri',
                'tanggal_lahir' => '2013-02-21',
                'id_kelas' => 3,
                'qr_code' => Str::random(32),
                'id_orangtua' => 3,
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 5️⃣ Absensi
        DB::table('absensi')->insert([
            [
                'nis' => '20230001',
                'id_guru' => 1,
                'tanggal' => Carbon::today(),
                'jam' => '07:10:00',
                'lokasi' => 'Gerbang Sekolah',
                'status' => 'hadir',
                'sumber' => 'scan',
                'device_id' => 'DEVICE001',
                'synced' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nis' => '20230002',
                'id_guru' => 3,
                'tanggal' => Carbon::today(),
                'jam' => '07:25:00',
                'lokasi' => 'Pintu Barat',
                'status' => 'terlambat',
                'sumber' => 'scan',
                'device_id' => 'DEVICE002',
                'synced' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nis' => '20230003',
                'id_guru' => 2,
                'tanggal' => Carbon::today(),
                'jam' => '07:00:00',
                'lokasi' => 'Gerbang Utama',
                'status' => 'hadir',
                'sumber' => 'manual',
                'device_id' => 'DEVICE003',
                'synced' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 6️⃣ Notifikasi
        DB::table('notifikasi')->insert([
            [
                'id_orangtua' => 1,
                'nis' => '20230001',
                'jenis' => 'absensi',
                'pesan' => 'Rina Andayani hadir pukul 07:10 di sekolah.',
                'status_kirim' => 'sent',
                'channel' => 'wa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_orangtua' => 2,
                'nis' => '20230002',
                'jenis' => 'absensi',
                'pesan' => 'Dedi Gunawan datang terlambat pukul 07:25.',
                'status_kirim' => 'sent',
                'channel' => 'wa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_orangtua' => 3,
                'nis' => '20230003',
                'jenis' => 'pengumuman',
                'pesan' => 'Akan ada rapat orang tua minggu depan.',
                'status_kirim' => 'pending',
                'channel' => 'email',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
