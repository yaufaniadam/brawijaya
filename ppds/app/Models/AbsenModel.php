<?php

namespace App\Models;

use Codeigniter\Database\ConnectionInterface;
use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class AbsenModel extends Model
{
    protected $table = 'presensi_sidang';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id_ppds',
        'id_sidang'
    ];

    public function isAbsen($id_sidang)
    {
        $db = \Config\Database::connect();
        $id_ppds = session('user_id');

        $query = $db->query(
            "SELECT COUNT(id_ppds) AS jumlah FROM presensi_sidang WHERE id_ppds = $id_ppds AND id_ppds IN (SELECT id_ppds FROM presensi_sidang WHERE id_sidang = $id_sidang)"
        )->getRowObject()->jumlah;

        if ($query > 0) {
            return true;
        } else {
            return false;
        }
    }
}
