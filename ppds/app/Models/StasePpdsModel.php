<?php

namespace App\Models;

use CodeIgniter\Model;

class StasePpdsModel extends Model
{
    // protected $table = 'ci_users';
    protected $allowedFields = ['id_user', 'id_stase', 'tanggal_mulai'];
    // protected $useTimestamps = true;
    // protected $createdField  = 'tanggal_mulai';
    // protected $updatedField  = 'updated_at';

    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('stase_ppds');
    }

    public function insertTo($data)
    {
        $this->builder->insert($data);
    }

    public function getCurrentUserStase()
    {
        $id_ppds = session('user_id');

        $this->builder->selectMax('id');
        $this->builder->where('id_user', $id_ppds);
        $max_id = $this->builder->get()->getRowObject()->id;

        $this->builder->select('id_stase');
        $this->builder->where('id_user', $id_ppds);
        $this->builder->where('id', $max_id);
        $query = $this->builder->get()->getRowObject()->id_stase;

        return $query;
    }

    public function getAllSTaseTahapSatuOfCurrentUser()
    {
        $id_user = session('user_id');

        $this->builder->select('*');
        $this->builder->join('stase', 'stase.id = stase_ppds.id_stase');
        $this->builder->where('stase_ppds.id_user', $id_user);
        $this->builder->where('stase.id_tahap', 1);
        return $this->builder->get()->getResultArray();
    }

    public function getAllSTaseTahapDuaOfCurrentUser()
    {
        $id_user = session('user_id');

        $this->builder->select('*');
        $this->builder->join('stase', 'stase.id = stase_ppds.id_stase');
        $this->builder->where('stase_ppds.id_user', $id_user);
        $this->builder->where('stase.id_tahap', 2);
        return $this->builder->get()->getResultArray();
    }

    public function getAllSTaseTahapTigaOfCurrentUser()
    {
        $id_user = session('user_id');

        $this->builder->select('*');
        $this->builder->join('stase', 'stase.id = stase_ppds.id_stase');
        $this->builder->where('stase_ppds.id_user', $id_user);
        $this->builder->where('stase.id_tahap', 3);
        return $this->builder->get()->getResultArray();
    }

    public function getAllSTaseTahapEmpatOfCurrentUser()
    {
        $id_user = session('user_id');

        $this->builder->select('*');
        $this->builder->join('stase', 'stase.id = stase_ppds.id_stase');
        $this->builder->where('stase_ppds.id_user', $id_user);
        $this->builder->where('stase.id_tahap', 4);
        return $this->builder->get()->getResultArray();
    }

    public function changePpdsStase($data)
    {
        $query = $this->db->table('stase_ppds')->update($data, array('id' => $data['id']));
        return $query;
    }

    function countPpdsStaseByTahap($id_ppds, $id_tahap)
    {
        $this->builder->select('*');
        $this->builder->join('stase', 'stase.id = stase_ppds.id_stase');
        $this->builder->where('stase_ppds.id_user', $id_ppds);
        $this->builder->where('stase.id_tahap', $id_tahap);
        return $this->builder->countAllResults();
    }
}
