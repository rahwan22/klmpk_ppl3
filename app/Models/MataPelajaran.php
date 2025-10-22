<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $primaryKey = 'id_mapel';
    protected $fillable = ['nama_mapel','tingkat'];

    public function pengajar()
    {
        return $this->hasMany(GuruMataPelajaran::class, 'id_mata_pelajaran','id_mapel');
    }
}
