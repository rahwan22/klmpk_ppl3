<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        
        // 1️⃣ Guru
        Schema::create('guru', function (Blueprint $table) {
            $table->id('id_guru');
            $table->string('nip', 20)->nullable();
            $table->string('nama', 100);
            $table->enum('role', ['guru', 'guru_piket', 'wali_kelas', 'admin'])->default('guru');
            $table->string('password_hash', 255);
            $table->timestamps();
        });
        // 0️⃣ Admins
        Schema::create('admins', function (Blueprint $table) {
            $table->id('id_admin');
            $table->string('admin_kode', 10)->unique(); // contoh: ADM0001
            $table->string('nama', 100);
            $table->string('username', 50)->unique();
            $table->string('password', 255);
            $table->enum('role', ['SuperAdmin', 'Operator'])->default('Operator');
            $table->foreignId('id_guru')
                ->nullable()
                ->constrained('guru', 'id_guru')
                ->cascadeOnUpdate()
                ->nullOnDelete(); // admin bisa dikaitkan ke guru (opsional)
            $table->timestamps();
        });

        // 2️⃣ Kelas
        Schema::create('kelas', function (Blueprint $table) {
            $table->id('id_kelas');
            $table->string('nama_kelas', 50);
            $table->string('jurusan', 50)->nullable();
            $table->foreignId('id_guru_wali')
                ->nullable()
                ->constrained('guru', 'id_guru')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('kontak', 100)->nullable();
            $table->timestamps();
        });

        // 3️⃣ Orang Tua
        Schema::create('orangtua', function (Blueprint $table) {
            $table->id('id_orangtua');
            $table->string('nama', 100);
            $table->string('kontak_email', 100)->nullable();
            $table->string('kontak_wa', 50)->nullable();
            $table->json('preferensi_notif')->nullable();
            $table->timestamps();
        });

        // 4️⃣ Siswa
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('nis', 20)->primary();
            $table->string('nama', 100);
            $table->date('tanggal_lahir')->nullable();
            $table->foreignId('id_kelas')
                ->constrained('kelas', 'id_kelas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('qr_code', 255);
            $table->foreignId('id_orangtua')
                ->nullable()
                ->constrained('orangtua', 'id_orangtua')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });

        // 5️⃣ Absensi
        Schema::create('absensi', function (Blueprint $table) {
            $table->id('id_absensi');
            $table->string('nis', 20);
            $table->foreign('nis')
                ->references('nis')
                ->on('siswa')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('id_guru')
                ->nullable()
                ->constrained('guru', 'id_guru')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('id_admin')
                ->nullable()
                ->constrained('admins', 'id_admin')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->date('tanggal');
            $table->time('jam');
            $table->string('lokasi', 100)->nullable();
            $table->enum('status', ['hadir', 'terlambat', 'izin', 'sakit', 'alpa'])->default('hadir');
            $table->enum('sumber', ['scan', 'manual', 'offline_sync'])->default('scan');
            $table->string('device_id', 100)->nullable();
            $table->boolean('synced')->default(true);
            $table->timestamps();
        });

        // 6️⃣ Notifikasi
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id('id_notif');
            $table->foreignId('id_orangtua')
                ->constrained('orangtua', 'id_orangtua')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('nis', 20);
            $table->foreign('nis')
                ->references('nis')
                ->on('siswa')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->enum('jenis', ['absensi', 'pengumuman']);
            $table->text('pesan');
            $table->enum('status_kirim', ['pending', 'sent', 'failed'])->default('pending');
            $table->enum('channel', ['email', 'wa', 'sms'])->default('wa');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
        Schema::dropIfExists('absensi');
        Schema::dropIfExists('siswa');
        Schema::dropIfExists('orangtua');
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('guru');
        Schema::dropIfExists('admins');
    }
};


