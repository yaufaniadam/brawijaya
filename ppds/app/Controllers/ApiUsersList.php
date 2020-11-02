<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ApiUsersList extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\UserModel';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }
}
