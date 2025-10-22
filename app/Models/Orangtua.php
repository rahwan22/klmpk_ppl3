<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    protected $primaryKey = 'id_orangtua';
    protected $fillable = ['nama','email','no_wa','preferensi_notif'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_orangtua', 'id_orangtua');
    }
}
