<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';
    protected $primaryKey = 'id_absensi';
    protected $fillable = ['nis', 'id_guru', 'id_admin', 'tanggal', 'jam', 'lokasi', 'status', 'sumber', 'device_id', 'synced'];


    public function siswa()
    {
        return $this->belongsTo(Siswa::class, '', 'nis');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }
}
