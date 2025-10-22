<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1️⃣ USERS
        DB::table('users')->insert([
            [
                'nip' => '0001',
                'nama' => 'Admin Sekolah',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nip' => '0002',
                'nama' => 'Kepala Sekolah',
                'email' => 'kepala@gmail.com',
                'password' => Hash::make('kepala123'),
                'role' => 'kepala_sekolah',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nip' => '0003',
                'nama' => 'Guru Matematika',
                'email' => 'guru1@gmail.com',
                'password' => Hash::make('guru123'),
                'role' => 'guru',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        // 2️⃣ GURU (link ke users)
        DB::table('guru')->insert([
            [
                'nip' => '19851201',
                'nama' => 'Ibu Siti Rahma',
                'email' => 'siti@guru.com',
                'id_user' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        // 3️⃣ MATA PELAJARAN
        DB::table('mata_pelajaran')->insert([
            ['nama_mapel' => 'Matematika', 'tingkat' => '1', 'created_at'=>now(),'updated_at'=>now()],
            ['nama_mapel' => 'Bahasa Indonesia', 'tingkat' => '1', 'created_at'=>now(),'updated_at'=>now()],
            ['nama_mapel' => 'IPA', 'tingkat' => '1', 'created_at'=>now(),'updated_at'=>now()],
        ]);

        // 4️⃣ KELAS
        DB::table('kelas')->insert([
            ['nama_kelas' => '1A', 'id_wali_kelas' => 1, 'kontak'=>'081234567890','created_at'=>now(),'updated_at'=>now()],
            ['nama_kelas' => '1B', 'id_wali_kelas' => null, 'kontak'=>'081234567891','created_at'=>now(),'updated_at'=>now()],
        ]);

        // 5️⃣ ORANG TUA
        DB::table('orangtua')->insert([
            ['nama'=>'Bapak Andi','email'=>'bapakandi@mail.com','no_wa'=>'0811111111','preferensi_notif'=>json_encode(['email','wa']),'created_at'=>now(),'updated_at'=>now()],
            ['nama'=>'Ibu Sari','email'=>'ibusari@mail.com','no_wa'=>'0822222222','preferensi_notif'=>json_encode(['email']),'created_at'=>now(),'updated_at'=>now()],
        ]);

        // 6️⃣ SISWA
        DB::table('siswa')->insert([
            [
                'nis'=>'12345',
                'nama'=>'Ahmad Fauzi',
                'tanggal_lahir'=>'2012-05-10',
                'id_kelas'=>1,
                'qr_code'=>'QR12345',
                'id_orangtua'=>1,
                'aktif'=>true,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'nis'=>'12346',
                'nama'=>'Budi Santoso',
                'tanggal_lahir'=>'2012-07-12',
                'id_kelas'=>1,
                'qr_code'=>'QR12346',
                'id_orangtua'=>2,
                'aktif'=>true,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
        ]);
    }
}
