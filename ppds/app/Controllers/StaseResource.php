<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Staseresource extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\StaseModel';

    public function index()
    {
        $id_ppds = $this->request->getVar('id_ppds');
        return $this->respond($this->model->getNotPpdsStase($id_ppds));
    }
}
