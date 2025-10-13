<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    protected $table = 'orangtua';
    protected $primaryKey = 'id_orangtua';
    protected $fillable = ['nama', 'kontak_email', 'kontak_wa', 'preferensi_notif'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_orangtua', 'id_orangtua');
    }

    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class, 'id_orangtua', 'id_orangtua');
    }
}
