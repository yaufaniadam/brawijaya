<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StaseModel;
use App\Models\UserModel;

class Stase extends BaseController
{

    protected $stase_model;
    protected $user_model;

    public function __construct()
    {
    
        $this->stase_model = new StaseModel();
        $this->user_model = new UserModel();

    }

    public function index()
    {
        $data['title'] = 'Daftar Stase';
        $data['query'] = $this->stase_model->getAllStase();
        $data['page_header'] = 'Daftar Stase';
        return view('admin/stase/index', $data);
    }

   

    public function detail($id)
    {
        $data = [
            'title' => 'Stase',
            'page_header' => 'Stase',
            'validation' => \Config\Services::validation(),
          //  'role' => $this->role_model->findAll(),
            'spv' => $this->user_model->getSpv(),
            'stase' => $this->stase_model->getStaseById($id),
        ];

        return view('admin/stase/detail', $data);
    }

    public function post()
    {
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $role = $this->request->getVar('role');
        $supervisor = $this->request->getVar('spv');
        $stase = $this->request->getVar('stase');

        if ($role == 4) {
            $rules = [
                'username' => [
                    'rules' => 'required|is_unique[ci_users.username]',
                    'errors' => [
                        'required' => 'username harus diisi',
                        'is_unique' => 'username sudah terpakai'
                    ]
                ],
                'email' => [
                    'rules' => 'required|is_unique[ci_users.email]|valid_email',
                    'errors' => [
                        'required' => 'email harus diisi',
                        'is_unique' => 'email sudah terpakai',
                        'valid_email' => 'email tidak valid'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'password harus diisi',
                    ]
                ],
                'role' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'role harus diisi',
                    ]
                ],
                'spv' => [
                    'rules' => ['required'],
                    'errors' => [
                        'required' => 'supervisor harus diisi',
                    ]
                ]
            ];
        } elseif ($role == 3) {
            $rules = [
                'username' => [
                    'rules' => 'required|is_unique[ci_users.username]',
                    'errors' => [
                        'required' => 'username harus diisi',
                        'is_unique' => 'username sudah terpakai'
                    ]
                ],
                'email' => [
                    'rules' => 'required|is_unique[ci_users.email]|valid_email',
                    'errors' => [
                        'required' => 'email harus diisi',
                        'is_unique' => 'email sudah terpakai',
                        'valid_email' => 'email tidak valid'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'password harus diisi',
                    ]
                ],
                'role' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'role harus diisi',
                    ]
                ],
                'stase' => [
                    'rules' => ['required'],
                    'errors' => [
                        'required' => 'stase harus diisi',
                    ]
                ]
            ];
        }

        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'role' => $role,
            'spv' => $supervisor,
            'stase' => $stase,
            'aktif' => 1,
        ];

        // dd($data);

        $is_supervisor_exist = $this->spv_model->getSpecificSpv($supervisor);

        if ($data['role'] == 4) {
            if ($is_supervisor_exist) {
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
                    return redirect()->to(base_url('/admin/users'))->with('success', 'Pengguna baru berhasil ditambahkan!');
                }
            } else {
                return redirect()->back()->withInput()->with('danger', 'Data supervisor tidak ditemukan!');
            }
        } else {
            if ($this->user_model->insert($data)) {
                return redirect()->to(base_url('/admin/users'))->with('success', 'Pengguna baru berhasil ditambahkan!');
            }
        }
    }

  
}
