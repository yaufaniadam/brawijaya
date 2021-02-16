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

    public function detail($id)
    {
        $data = [
            'status' => 1
        ];

        $data_notif = $this->notif_model->find($id);

        $this->notif_model->update($id, $data);

        return redirect()->to($data_notif['isi']);
    }
}
