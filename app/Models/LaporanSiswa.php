<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanSiswa extends Model
{
    protected $primaryKey = 'id_laporan_siswa';
    protected $fillable = ['nis','id_kelas','periode_awal','periode_akhir','hadir','terlambat','izin','sakit','alpa','catatan','status'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

}
