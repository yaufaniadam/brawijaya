<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\RoleModel;
use App\Models\UserModel;
use App\Models\TahapModel;
use App\Models\SupervisorModel;
use App\Controllers\BaseController;
use App\Models\StasePpdsModel;
use App\Models\StaseModel;
use App\Models\NotifModel;

class Auth extends BaseController
{
    protected $auth_model;
    protected $user_model;
    protected $role_model;
    protected $tahap_model;
    protected $stase_ppds_model;
    protected $stase_model;
    protected $spv_model;
    protected $notif_model;
    public function __construct()
    {
        $this->auth_model = new AuthModel();
        $this->user_model = new UserModel();
        $this->role_model = new RoleModel();
        $this->tahap_model = new TahapModel();
        $this->stase_ppds_model = new StasePpdsModel();
        $this->stase_model = new StaseModel();
        $this->spv_model = new SuperVisorModel();
        $this->notif_model = new NotifModel();
    }

    public function login_view()
    {
        if (session('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        } else {
            return view('login');
        }
    }

    public function login()
    {
        $session = session();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = [
            'username' => $username,
            'password' => $password,
        ];

        $result = $this->auth_model->login($data);

        if ($result) {
            $user_data = [
                'user_id' => $result['id'],
                'user_name' => $result['username'],
                'role' => $result['role'],
                'isLoggedIn' => true,
                'stase' => $result['stase'] != '' ? $result['stase'] : '',
            ];
            $session->set($user_data);
            return redirect()->to(base_url('/'));
        } else {
            return redirect()->back()->with('warning', 'Invalid username or password');
        }
        // dd($result);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }

    public function register()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'spv' => $this->user_model->getSpv(),
        ];
        return view('register', $data);
    }

    public function register_post()
    {
        // dd($this->request->getVar());

        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[ci_users.username]',
                'errors' => [
                    'required' => 'username cant be empty',
                    'is_unique' => 'username already taken'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[ci_users.email]',
                'errors' => [
                    'required' => 'email cant be empty',
                    'is_unique' => 'email already taken'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'password cant be empty',
                ]
            ],
            're_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'kolom wajib diisi',
                    'matches' => 'password tidak cocok',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = [
            "username" => $this->request->getVar("username"),
            "password" => password_hash($this->request->getVar("password"), PASSWORD_BCRYPT),
            "email" => $this->request->getVar("email"),
            "nama_lengkap" => $this->request->getVar("nama_lengkap"),
            "usia" => $this->request->getVar("usia"),
            "jenis_kelamin" => $this->request->getVar("jenis_kelamin"),
            "role" => 4,
            "spv" => $this->request->getVar("spv"),
        ];

        if ($this->user_model->insert($data)) {
            date_default_timezone_set('Asia/Jakarta');
            $ppds_id = $this->user_model->getInsertID();
            $dataForTahap = [
                'id_user' => $ppds_id,
                'id_tahap' => 1,
                'tanggal_mulai' => date("Y-m-d")
            ];
            $this->tahap_model->insert($dataForTahap);

            $dataForStase = [
                'id_user' => $ppds_id,
                'id_stase' => 1,
                'tanggal_mulai' => date("Y-m-d")
            ];
            $this->stase_ppds_model->insert($dataForStase);

            return redirect()->to(base_url('/login'))->with('success', 'Pendaftaran akun baru berhasil dilakukan, mohon tunggu knofirmasi dari admin.');
        }
    }

    //--------------------------------------------------------------------

}
