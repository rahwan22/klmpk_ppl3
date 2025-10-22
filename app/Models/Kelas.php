<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $primaryKey = 'id_kelas';
    protected $fillable = ['nama_kelas','id_wali_kelas','kontak'];

    public function waliKelas()
    {
        return $this->belongsTo(Guru::class, 'id_wali_kelas', 'id_guru');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_kelas', 'id_kelas');
    }
}
