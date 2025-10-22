<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id_user';
    public $incrementing = true;
    protected $fillable = ['nip','nama','username','password','role','aktif'];
    protected $hidden = ['password'];

    public function guru()
    {
        return $this->hasOne(Guru::class, 'id_user', 'id_user');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'id_user', 'id_user');
    }
}
