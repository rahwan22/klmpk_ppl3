<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanKelas extends Model
{
    protected $primaryKey = 'id_laporan_kelas';
    protected $fillable = ['id_kelas','id_user','periode_awal','periode_akhir','total_siswa','total_hadir','total_terlambat','total_izin','total_sakit','total_alpa','catatan','status'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

}
