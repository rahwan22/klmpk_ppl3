<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $primaryKey = 'nis';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['nis','nama','tanggal_lahir','id_kelas','qr_code','id_orangtua','aktif'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    public function orangtua()
    {
        return $this->belongsTo(Orangtua::class, 'id_orangtua', 'id_orangtua');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'nis', 'nis');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'nis', 'nis');
    }
}
