<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuruMataPelajaran extends Model
{
    protected $primaryKey = 'id_guru_mapel';
    protected $fillable = ['id_guru','id_mapel','id_kelas'];

    public function guru() { return $this->belongsTo(Guru::class, 'id_guru', 'id_guru'); }
    public function mapel() { return $this->belongsTo(MataPelajaran::class, 'id_mata_pelajaran','id_mapel'); }
    public function kelas() { return $this->belongsTo(Kelas::class, 'id_kelas','id_kelas'); }
}
