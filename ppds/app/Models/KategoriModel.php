<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;

class KategoriModel extends Model
{
    protected $db;
    protected $builder;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('kategori');
    }

    public function getAllKategoriesBasedOnJenisTugas($id_tugas)
    {
        $db = \Config\Database::connect();

        $jenis_tugas = $db->query("SELECT * FROM tugas WHERE id = $id_tugas")->getRowObject()->jenis_tugas;

        return $this->builder->getWhere(['jenis_tugas' => $jenis_tugas])->getResultArray();
    }

    public function getAllIlmiahKategories()
    {
        return $this->builder->getWhere(['jenis_tugas' => 1])->getResultArray();
    }

    public function getAllTugasBesarKategories()
    {
        return $this->builder->getWhere(['jenis_tugas' => 2])->getResultArray();
        // $this->builder->select('*');
        // $this->builder->whereNotIn();
        // $this->builder->orWhereNotIn('id', function (BaseBuilder $builder) {
        //     return $builder->select('id_kategori')->from('tugas')->where('id_ppds', session('user_id'));
        // });
    }
}
