namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $fillable = ['nip', 'nama', 'role', 'password_hash'];

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id_guru_wali', 'id_guru');
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'id_guru', 'id_guru');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'id_guru', 'id_guru');
    }
}
