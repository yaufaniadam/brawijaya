<?php

namespace App\Models;

use Codeigniter\Database\ConnectionInterface;
use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class TugasModel extends Model
{
    // protected $table = 'tugas';
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
        'file_presentasi',
        'jadwal_sidang',
        'id_penguji_1',
        'id_penguji_2',
        'id_pembimbing_1',
        'id_pembimbing_2',
        'id_stase',
        'jenis_tugas',
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
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function getAllIlmiah()
    {
        $this->builder->select("*,tugas.id");
        $this->builder->join('kategori', 'kategori.id = tugas.id_kategori');
        $this->builder->join('ci_users', 'ci_users.id = tugas.id_ppds');
        $this->builder->join('stase', 'stase.id = tugas.id_stase');
        $this->builder->where('tugas.deleted_at', !0);
        $this->builder->where('tugas.jenis_tugas', 1);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function getAllTugasBesar()
    {
        $this->builder->select("*,tugas.id");
        $this->builder->join('kategori', 'kategori.id = tugas.id_kategori');
        $this->builder->join('ci_users', 'ci_users.id = tugas.id_ppds');
        $this->builder->join('stase', 'stase.id = tugas.id_stase');
        $this->builder->where('deleted_at', !0);
        $this->builder->where('tugas.jenis_tugas', 2);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function getSidang()
    {
        $this->builder->select("*,tugas.id");
        $this->builder->join('kategori', 'kategori.id = tugas.id_kategori');
        $this->builder->join('ci_users', 'ci_users.id = tugas.id_ppds');
        $this->builder->join('stase', 'stase.id = tugas.id_stase');
        $this->builder->where('deleted_at', !0);
        // $this->builder->where('tugas.jenis_tugas', 2);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function getMyTugas()
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

    public function getMyTugasBesar()
    {
        $this->builder->select("*,tugas.id");
        $this->builder->join('kategori', 'kategori.id = tugas.id_kategori');
        $this->builder->join('ci_users', 'ci_users.id = tugas.id_ppds');
        $this->builder->join('stase', 'stase.id = tugas.id_stase');
        $this->builder->where('deleted_at', !0);
        $this->builder->where('id_ppds', session('user_id'));
        $this->builder->where('tugas.jenis_tugas', 2);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function getMyIlmiah()
    {
        $this->builder->select("*,tugas.id");
        $this->builder->join('kategori', 'kategori.id = tugas.id_kategori');
        $this->builder->join('ci_users', 'ci_users.id = tugas.id_ppds');
        $this->builder->join('stase', 'stase.id = tugas.id_stase');
        $this->builder->where('tugas.deleted_at', !0);
        $this->builder->where('id_ppds', session('user_id'));
        $this->builder->where('tugas.jenis_tugas', 1);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function getMyBimbinganIlmiah()
    {
        $this->builder->select("*,tugas.id");
        $this->builder->join('kategori', 'kategori.id = tugas.id_kategori');
        $this->builder->join('ci_users', 'ci_users.id = tugas.id_ppds');
        $this->builder->join('stase', 'stase.id = tugas.id_stase');
        $this->builder->where('tugas.deleted_at', !0);
        $this->builder->where('tugas.jenis_tugas', 1);
        // $this->builder->groupStart();
        $this->builder->where('tugas.id_penguji_1', session('user_id'));
        // $this->builder->orWhere('tugas.id_penguji_2', session('user_id'));
        // $this->builder->orWhere('tugas.id_pembimbing_1', session('user_id'));
        // $this->builder->orWhere('tugas.id_pembimbing_2', session('user_id'));
        // $this->builder->groupEnd();
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function getMyBimbinganTugasBesar()
    {
        $this->builder->select("*,tugas.id");
        $this->builder->join('kategori', 'kategori.id = tugas.id_kategori');
        $this->builder->join('ci_users', 'ci_users.id = tugas.id_ppds');
        $this->builder->join('stase', 'stase.id = tugas.id_stase');
        $this->builder->where('tugas.deleted_at', !0);
        $this->builder->where('tugas.jenis_tugas', 2);
        $this->builder->groupStart();
        $this->builder->where('tugas.id_penguji_1', session('user_id'));
        $this->builder->orWhere('tugas.id_penguji_2', session('user_id'));
        $this->builder->orWhere('tugas.id_pembimbing_1', session('user_id'));
        $this->builder->orWhere('tugas.id_pembimbing_2', session('user_id'));
        $this->builder->groupEnd();
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

    public function countMyIlmiah()
    {
        $this->builder->select('*');
        $this->builder->where('id_ppds', session('user_id'));
        $this->builder->where('jenis_tugas', 1);
        $this->builder->where('deleted_at', 0);
        return $this->builder->countAllResults();
    }

    public function countMyTugasBesar()
    {
        $this->builder->select('*');
        $this->builder->where('id_ppds', session('user_id'));
        $this->builder->where('jenis_tugas', 2);
        $this->builder->where('deleted_at', 0);
        return $this->builder->countAllResults();
    }

    public function incomingSidang()
    {
        $query = $this->db->query("SELECT * FROM tugas
        WHERE DATE_FORMAT(jadwal_sidang,'%Y-%m-%d') >= CURDATE() AND jenis_tugas = 2 AND deleted_at = 0
        ORDER BY jadwal_sidang ASC")->getResultArray();
        return $query;
    }

    public function myIncomingSidang()
    {
        $user_id = session('user_id');
        $query = $this->db->query("SELECT * FROM tugas
        WHERE DATE_FORMAT(jadwal_sidang,'%Y-%m-%d') >= CURDATE() AND jenis_tugas = 2 AND deleted_at = 0 AND id_ppds = $user_id
        ORDER BY jadwal_sidang ASC")->getResultArray();
        return $query;
    }

    public function detailSidang($id_sidang)
    {
        if ($this->builder->getWhere(['id' => $id_sidang])->getRowObject()->jenis_tugas == 2) {
            $this->builder->select(
                'tugas.*,
                ci_users.nama_lengkap as ppds,
                penguji_1.nama_lengkap as pj1,
                penguji_2.nama_lengkap as pj2,
                pembimbing_1.nama_lengkap as pb1,
                pembimbing_2.nama_lengkap as pb2'
            );
            $this->builder->join('ci_users', 'ci_users.id = tugas.id_ppds');
            $this->builder->join('ci_users penguji_1', 'penguji_1.id = tugas.id_penguji_1');
            $this->builder->join('ci_users penguji_2', 'penguji_2.id = tugas.id_penguji_2');
            $this->builder->join('ci_users pembimbing_1', 'pembimbing_1.id = tugas.id_pembimbing_1');
            $this->builder->join('ci_users pembimbing_2', 'pembimbing_2.id = tugas.id_pembimbing_2');
            $this->builder->where('tugas.id', $id_sidang);
        } else {
            $this->builder->select(
                'tugas.*,
                ci_users.nama_lengkap as ppds,
                penguji_1.nama_lengkap as pj1,'
            );
            $this->builder->join('ci_users', 'ci_users.id = tugas.id_ppds');
            $this->builder->join('ci_users penguji_1', 'penguji_1.id = tugas.id_penguji_1');
            $this->builder->where('tugas.id', $id_sidang);
        }

        return $this->builder->get()->getRowObject();
    }

    public function postNilai($id_tugas, $data)
    {
        $query = $this->db->table('tugas')->update($data, array('id' => $id_tugas));
        return $query;
        // $this->builder->where('id', $id_tugas);
        // $this->builder->update($data);
        // return true;
    }

    public function daftarHadirSidang($id_sidang)
    {
        return $this->db->query(
            "SELECT presensi_sidang.id,ci_users.nama_lengkap FROM presensi_sidang 
            LEFT JOIN ci_users ON presensi_sidang.id_ppds = ci_users.id
            WHERE presensi_sidang.id_sidang = $id_sidang"
        )->getResultArray();
    }

    public function updateTugas($id_tugas, $data)
    {
        $this->builder->where('id', $id_tugas);
        $this->builder->update($data);
        return true;
    }
}
