<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';

    protected $fillable = [
        'id_kelas',
        'id_guru',
        'id_admin',
        'tanggal_awal',
        'tanggal_akhir',
        'total_hadir',
        'total_terlambat',
        'total_izin',
        'total_sakit',
        'total_alpa',
        'catatan',
        'file_path',
        'status',
    ];

    /* ===========================
       🔗 RELASI ANTAR MODEL
       =========================== */

    // Setiap laporan milik satu kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    // Laporan dibuat oleh satu guru (wali/piket)
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }

    // Laporan juga bisa dibuat/diotorisasi oleh admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }

    // Relasi opsional: laporan bisa merekap banyak absensi siswa
    public function absensi()
    {
        return $this->hasManyThrough(
            Absensi::class,
            Siswa::class,
            'id_kelas',   // foreign key di tabel siswa
            'nis',        // foreign key di tabel absensi
            'id_kelas',   // local key di tabel laporan
            'nis'         // local key di tabel siswa
        );
    }

    /* ===========================
       🧠 FUNGSI TAMBAHAN (UTILITY)
       =========================== */

    // Hitung total kehadiran (opsional, jika mau rekap ulang)
    public function hitungRekapAbsensi()
    {
        if ($this->kelas) {
            $rekap = \DB::table('absensi')
                ->join('siswa', 'absensi.nis', '=', 'siswa.nis')
                ->where('siswa.id_kelas', $this->id_kelas)
                ->whereBetween('absensi.tanggal', [$this->tanggal_awal, $this->tanggal_akhir])
                ->selectRaw("
                    SUM(CASE WHEN status = 'hadir' THEN 1 ELSE 0 END) as total_hadir,
                    SUM(CASE WHEN status = 'terlambat' THEN 1 ELSE 0 END) as total_terlambat,
                    SUM(CASE WHEN status = 'izin' THEN 1 ELSE 0 END) as total_izin,
                    SUM(CASE WHEN status = 'sakit' THEN 1 ELSE 0 END) as total_sakit,
                    SUM(CASE WHEN status = 'alpa' THEN 1 ELSE 0 END) as total_alpa
                ")
                ->first();

            // Update ke tabel laporan
            $this->update([
                'total_hadir' => $rekap->total_hadir ?? 0,
                'total_terlambat' => $rekap->total_terlambat ?? 0,
                'total_izin' => $rekap->total_izin ?? 0,
                'total_sakit' => $rekap->total_sakit ?? 0,
                'total_alpa' => $rekap->total_alpa ?? 0,
            ]);
        }
    }
}
