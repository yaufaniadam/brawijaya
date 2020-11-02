<?php

namespace App\Models;

use CodeIgniter\Model;

class TahapModel extends Model
{
    // protected $table = 'ci_users';
    protected $allowedFields = ['id_user', 'id_tahap', 'tanggal_mulai'];
    // protected $useTimestamps = true;
    // protected $createdField  = 'tanggal_mulai';
    // protected $updatedField  = 'updated_at';

    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('tahap_ppds');
    }

    public function insertTo($data)
    {
        $this->builder->insert($data);
    }

    public function getUserById($user_id)
    {
        $query = $this->builder->getWhere(['id' => $user_id])->getRowObject();
        return $query;
    }

    public function getPpdsTahap($id_ppds)
    {
        $this->builder->selectMax('id');
        $this->builder->where('id_user', $id_ppds);
        $max_id = $this->builder->get()->getRowObject()->id;

        $this->builder->select('id_tahap');
        $this->builder->where('id_user', $id_ppds);
        $this->builder->where('id', $max_id);
        $query = $this->builder->get()->getRowObject()->id_tahap;

        return $query;
    }

    public function updatePpdsTahap($id, $data)
    {
        $this->builder->where('id', $id);
        $this->builder->update($data);
    }
}
