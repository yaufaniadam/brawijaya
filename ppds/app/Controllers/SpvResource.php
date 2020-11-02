<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class SpvResource extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\SupervisorModel';

    public function index()
    {
        $id_ppds = $this->request->getVar('id_ppds');
        return $this->respond($this->model->getNotPpdsStase($id_ppds));
    }

    public function pengujisatu()
    {
        $db = \Config\Database::connect();
        return $db->query("SELECT * FROM ci_users WHERE role = 3")->getResultArray();
    }

    public function pengujidua()
    {
        $db = \Config\Database::connect();
        $idPengujiSatu = $this->request->getVar('id_penguji_1');
        return $this->respond($db->query("SELECT * FROM ci_users WHERE role = 3 AND id !=$idPengujiSatu")->getResultArray());
    }

    public function pembimbingsatu()
    {
        $db = \Config\Database::connect();
        $idPengujiSatu = $this->request->getVar('id_penguji_1');
        $idPengujiDua = $this->request->getVar('id_penguji_2');
        return $this->respond($db->query("SELECT * FROM ci_users WHERE role = 3 AND id !=$idPengujiSatu AND id != $idPengujiDua")->getResultArray());
    }

    public function pembimbingdua()
    {
        $db = \Config\Database::connect();
        $idPengujiSatu = $this->request->getVar('id_penguji_1');
        $idPengujiDua = $this->request->getVar('id_penguji_2');
        $idPembimbingSatu = $this->request->getVar('id_pembimbing_1');
        return $this->respond($db->query("SELECT * FROM ci_users WHERE role = 3 AND id !=$idPengujiSatu AND id != $idPengujiDua AND id != $idPembimbingSatu")->getResultArray());
    }
}
