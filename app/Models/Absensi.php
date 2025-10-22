<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $primaryKey = 'id_absensi';
    protected $fillable = ['nis','id_user','tanggal','jam','status','sumber','lokasi'];

    public function siswa() { return $this->belongsTo(Siswa::class, 'nis','nis'); }
    public function user() { return $this->belongsTo(User::class, 'id_user','id_user'); }
}
