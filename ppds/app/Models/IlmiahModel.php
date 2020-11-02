<?php

namespace App\Models;

use Codeigniter\Database\ConnectionInterface;
use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class IlmiahModel extends Model
{
    protected $table = 'tugas';
    protected $primaryKey = 'id';
    protected $deletedField  = 'deleted_at';
    protected $useSoftDeletes = true;
    protected $db;
    protected $builder;
    protected $allowedFields = [
        'id_ppds',
        'judul',
        'deskripsi',
        'id_kategori',
        'file',
        'jadwal_sidang',
        'id_penguji_1',
        'id_penguji_2',
        'id_stase'
    ];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('tugas');
    }

    public function getAlltugas()
    {
        $this->builder->select("*,tugas.id");
        $this->builder->join('kategori', 'kategori.id = tugas.id_kategori');
        $this->builder->join('ci_users', 'ci_users.id = tugas.id_ppds');
        $this->builder->join('stase', 'stase.id = tugas.id_stase');
        $this->builder->where('deleted_at', !0);
        $this->builder->where('id_kategori', !2);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function getMyIlmiah()
    {
        $this->builder->select("*,tugas.id");
        $this->builder->join('kategori', 'kategori.id = tugas.id_kategori');
        $this->builder->join('ci_users', 'ci_users.id = tugas.id_ppds');
        $this->builder->join('stase', 'stase.id = tugas.id_stase');
        $this->builder->where('deleted_at', !0);
        $this->builder->where('id_ppds', session('user_id'));
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function getSpecificTugas($id_tugas)
    {
        $query = $this->builder->getWhere(['id' => $id_tugas])->getRowArray();
        return $query;
    }

    public function detailTugas($id_tugas)
    {
        $this->builder->select("*,tugas.id,kategori.kategori,ci_users.nama_lengkap");
        $this->builder->join('kategori', 'kategori.id = tugas.id_kategori');
        $this->builder->join('ci_users', 'ci_users.id = tugas.id_ppds');
        $this->builder->join('stase', 'stase.id = tugas.id_stase');
        $this->builder->where('deleted_at', !0);
        $this->builder->where('tugas.id', $id_tugas);
        $query = $this->builder->get()->getRowArray();
        return $query;
    }
}
