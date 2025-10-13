namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';
    protected $primaryKey = 'id_admin';
    protected $fillable = ['admin_kode', 'nama', 'username', 'password', 'role', 'id_guru'];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'id_admin', 'id_admin');
    }
}
