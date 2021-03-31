<?php

namespace App\Models;

use Codeigniter\Database\ConnectionInterface;
use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class NotifModel extends Model
{
    protected $table = 'notif';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'sender',
        'receiver',
        'title',
        'isi',
        'redirect',
        'status',
        // 'tanggal',
    ];

    public function getAllNotif()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('notif');

        return $builder->getWhere(['receiver' => session('user_id')])->getResultArray();
    }
}
