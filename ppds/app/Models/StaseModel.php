<?php

namespace App\Models;

use CodeIgniter\Model;

class StaseModel extends Model
{
    // protected $table = 'ci_users';
    // protected $allowedFields = ['id_user', 'id_stase', 'tanggal_mulai'];
    // protected $useTimestamps = true;
    // protected $createdField  = 'tanggal_mulai';
    // protected $updatedField  = 'updated_at';

    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('stase');
    }

    public function getAllStase()
    {
        return $this->builder->getWhere(['id !=' => '25'])->getResultArray();
    }

    public function getNotPpdsStase($id_ppds)
    {
        $tahap_ppds = $this->db->query("SELECT id_tahap FROM tahap_ppds WHERE id = (SELECT MAX(id) FROM tahap_ppds WHERE id_user = $id_ppds)")->getRowObject()->id_tahap;

        return $this->db->query(
            "SELECT * FROM stase 
            WHERE id NOT IN (SELECT id_stase FROM stase_ppds WHERE id_user = $id_ppds) AND id_tahap = $tahap_ppds"
        )->getResultArray();
    }

    public function countStasePerTahap($id_tahap)
    {
        $this->builder->select('*');
        $this->builder->where('id_tahap', $id_tahap);
        return $this->builder->countAllResults();
    }

    // public function getUserById($user_id)
    // {
    //     $query = $this->builder->getWhere(['id' => $user_id])->getRowObject();
    //     return $query;
    // }
}
