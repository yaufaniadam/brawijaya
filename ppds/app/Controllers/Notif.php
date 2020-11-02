<?php

namespace App\Controllers;

use App\Models\NotifModel;

class Notif extends BaseController
{
    protected $notif_model;

    public function __construct()
    {
        $this->notif_model = new NotifModel();
    }

    public function index()
    {
        dd($this->notif_model->getAllNotif());
    }
}
