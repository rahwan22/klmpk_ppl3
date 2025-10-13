<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'admin_kode' => 'ADM0001',
                'nama' => 'Super Admin',
                'username' => 'superadmin',
                'password' => Hash::make('admin123'), // password: admin123
                'role' => 'SuperAdmin',
                'id_guru' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_kode' => 'ADM0002',
                'nama' => 'Operator Sekolah',
                'username' => 'operator',
                'password' => Hash::make('operator123'), // password: operator123
                'role' => 'Operator',
                'id_guru' => 1, // contoh: admin ini juga guru (Budi Santoso)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_kode' => 'ADM0003',
                'nama' => 'Admin Cadangan',
                'username' => 'admincadangan',
                'password' => Hash::make('backup123'), // password: backup123
                'role' => 'Operator',
                'id_guru' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
