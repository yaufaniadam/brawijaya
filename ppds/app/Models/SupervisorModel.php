<?php

namespace App\Models;

use CodeIgniter\Model;

class SupervisorModel extends Model
{
    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('ci_users');
    }

    public function getAllSpv()
    {
        return $this->builder->getWhere(['role' => 3])->getResultArray();
    }

    public function getSpecificSpv($id_spv)
    {
        $this->builder->where(['id' => $id_spv, 'role' => 3]);
        $query = $this->builder->countAllResults();
        if ($query > 0) {
            return true;
        } else {
            return false;
        }
    }
}
