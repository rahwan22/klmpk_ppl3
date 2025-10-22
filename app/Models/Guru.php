<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $primaryKey = 'id_guru';
    protected $fillable = ['nip','nama','email','id_user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_wali_kelas', 'id_guru');
    }

    public function mapel()
    {
        return $this->hasMany(GuruMataPelajaran::class, 'id_guru', 'id_guru');
    }
}
