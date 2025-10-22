<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // 1️⃣ USERS (Login system)
       Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nip', 20)->nullable();
            $table->string('nama', 100);
            $table->string('email', 100)->unique(); // email wajib dan unik
            $table->string('password', 255);
            $table->enum('role', ['admin', 'kepala_sekolah', 'guru'])->default('guru');
            $table->timestamps();
        });

        // 2️⃣ GURU (Data guru dan relasi opsional ke users)
        Schema::create('guru', function (Blueprint $table) {
            $table->id('id_guru');
            $table->string('nip', 20)->unique();
            $table->string('nama', 100);
            $table->string('email', 100)->nullable();
            $table->foreignId('id_user')
                ->nullable()
                ->constrained('users', 'id_user')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->timestamps();
        });

        // 3️⃣ MATA PELAJARAN (SD)
        Schema::create('mata_pelajaran', function (Blueprint $table) {
            $table->id('id_mapel');
            $table->string('nama_mapel', 100);
            $table->enum('tingkat', ['1', '2', '3', '4', '5', '6'])->nullable();
            $table->timestamps();
        });

        // 4️⃣ KELAS (dengan wali kelas)
        Schema::create('kelas', function (Blueprint $table) {
            $table->id('id_kelas');
            $table->string('nama_kelas', 50);
            $table->foreignId('id_wali_kelas')
                ->nullable()
                ->constrained('guru', 'id_guru')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('kontak', 100)->nullable();
            $table->timestamps();
        });

        // 5️⃣ GURU MENGAJAR (opsional, guru mapel tambahan)
        Schema::create('guru_mata_pelajaran', function (Blueprint $table) {
            $table->id('id_guru_mapel');
            $table->foreignId('id_guru')
                ->constrained('guru', 'id_guru')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('id_mapel')
                ->constrained('mata_pelajaran', 'id_mapel')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('id_kelas')
                ->nullable()
                ->constrained('kelas', 'id_kelas')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->timestamps();
        });

        // 6️⃣ ORANG TUA
        Schema::create('orangtua', function (Blueprint $table) {
            $table->id('id_orangtua');
            $table->string('nama', 100);
            $table->string('email', 100)->nullable();
            $table->string('no_wa', 50)->nullable();
            $table->json('preferensi_notif')->nullable();
            $table->timestamps();
        });

        // 7️⃣ SISWA
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

        // 8️⃣ ABSENSI
        Schema::create('absensi', function (Blueprint $table) {
            $table->id('id_absensi');
            $table->string('nis', 20);
            $table->foreign('nis')
                ->references('nis')
                ->on('siswa')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('id_user')
                ->nullable()
                ->constrained('users', 'id_user')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->date('tanggal');
            $table->time('jam');
            $table->enum('status', ['hadir', 'terlambat', 'izin', 'sakit', 'alpa'])->default('hadir');
            $table->enum('sumber', ['scan', 'manual'])->default('scan');
            $table->string('lokasi', 100)->nullable();
            $table->timestamps();
        });

        // 9️⃣ NILAI / RAPOR
        Schema::create('nilai', function (Blueprint $table) {
            $table->id('id_nilai');
            $table->string('nis', 20);
            $table->foreign('nis')
                ->references('nis')
                ->on('siswa')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('id_mapel')
                ->constrained('mata_pelajaran', 'id_mapel')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('id_kelas')
                ->nullable()
                ->constrained('kelas', 'id_kelas')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->float('nilai_tugas')->default(0);
            $table->float('nilai_uts')->default(0);
            $table->float('nilai_uas')->default(0);
            $table->float('nilai_akhir')->default(0);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });

        // 🔟 LAPORAN KELAS
        Schema::create('laporan_kelas', function (Blueprint $table) {
            $table->id('id_laporan_kelas');
            $table->foreignId('id_kelas')
                ->constrained('kelas', 'id_kelas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('id_user')
                ->nullable()
                ->constrained('users', 'id_user')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->date('periode_awal');
            $table->date('periode_akhir');
            $table->integer('total_siswa')->default(0);
            $table->integer('total_hadir')->default(0);
            $table->integer('total_terlambat')->default(0);
            $table->integer('total_izin')->default(0);
            $table->integer('total_sakit')->default(0);
            $table->integer('total_alpa')->default(0);
            $table->text('catatan')->nullable();
            $table->enum('status', ['draft', 'final'])->default('draft');
            $table->timestamps();
        });

        // 11️⃣ LAPORAN SISWA
        Schema::create('laporan_siswa', function (Blueprint $table) {
            $table->id('id_laporan_siswa');
            $table->string('nis', 20);
            $table->foreign('nis')
                ->references('nis')
                ->on('siswa')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('id_kelas')
                ->nullable()
                ->constrained('kelas', 'id_kelas')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->date('periode_awal');
            $table->date('periode_akhir');
            $table->integer('hadir')->default(0);
            $table->integer('terlambat')->default(0);
            $table->integer('izin')->default(0);
            $table->integer('sakit')->default(0);
            $table->integer('alpa')->default(0);
            $table->text('catatan')->nullable();
            $table->enum('status', ['draft', 'final'])->default('draft');
            $table->timestamps();
        });

        // 12️⃣ NOTIFIKASI
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
            $table->enum('jenis', ['absensi', 'pengumuman', 'nilai']);
            $table->text('pesan');
            $table->enum('status_kirim', ['pending', 'sent', 'failed'])->default('pending');
            $table->enum('channel', ['email', 'wa'])->default('wa');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
        Schema::dropIfExists('laporan_siswa');
        Schema::dropIfExists('laporan_kelas');
        Schema::dropIfExists('nilai');
        Schema::dropIfExists('absensi');
        Schema::dropIfExists('siswa');
        Schema::dropIfExists('orangtua');
        Schema::dropIfExists('guru_mata_pelajaran');
        Schema::dropIfExists('mata_pelajaran');
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('guru');
        Schema::dropIfExists('users');
    }
};
