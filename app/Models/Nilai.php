<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $primaryKey = 'id_nilai';
    protected $fillable = ['nis','id_mapel','id_kelas','nilai_tugas','nilai_uts','nilai_uas','nilai_akhir','keterangan'];

    public function siswa() { return $this->belongsTo(Siswa::class, 'nis','nis'); }
    public function mapel() { return $this->belongsTo(MataPelajaran::class, 'id_mapel','id_mapel'); }
}
