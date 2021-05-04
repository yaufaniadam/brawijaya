<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\StasePpdsModel;

class User extends BaseController
{
    protected $user_model;
    protected $stase_ppds_model;
    public function __construct()
    {
        $this->user_model = new UserModel();
        $this->stase_ppds_model = new StasePpdsModel();
    }

    public function view()
    {
        return redirect()->to(base_url('user/profile'));
    }

    public function profile()
    {
        session();
        $user_id = $_SESSION['user_id'];
        $data = [
            'data_user' => $this->user_model->userProfile($user_id),
            'title' => 'Profile',
            'page_header' => 'Profile',
            'validation' => \Config\Services::validation(),
        ];

        // dd($data);

        return view('user/profile', $data);
    }

    function editProfile()
    {
        $db      = \Config\Database::connect();
        $email = $this->request->getVar('email');
        $nama_lengkap = $this->request->getVar('nama_lengkap');
        $jenis_kelamin = $this->request->getVar('jenis_kelamin');
        $password = $this->request->getVar('password');
        $hidden_pass = $this->request->getVar('old_password');
        $photo = $this->request->getFile('photo_profile');
        $alamat_asal = $this->request->getVar('alamat_asal');
        $alamat_domisili = $this->request->getVar('alamat_domisili');
        $no_telp = $this->request->getVar('no_telp');
        $no_telp_drt = $this->request->getVar('no_telp_drt');
        $nim = $this->request->getVar('nim');
        $status = $this->request->getVar('status');
        $pembiayaan = $this->request->getVar('pembiayaan');
        $no_sip = $this->request->getVar('no_sip');
        $no_str = $this->request->getVar('no_str');
        $no_bpjs = $this->request->getVar('no_bpjs');
        $no_rekening = $this->request->getVar('no_rekening');
        $stase = $this->request->getVar('stase[]');

        // dd($this->request->getVar());

        if (!$this->validate([
            'no_str' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NO. STR wajib diisi'
                ]
            ],
            'no_bpjs' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NO. BPJS wajib diisi'
                ]
            ],
            'no_bpjs' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NO. BPJS wajib diisi'
                ]
            ],
            'alamat_asal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Asal wajib diisi'
                ]
            ],
            'alamat_domisili' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Domisili wajib diisi'
                ]
            ],
            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No. Telp wajib diisi'
                ]
            ],
            'no_telp_drt' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No. Telp Darurat/Keluarga wajib diisi'
                ]
            ],
            'nim' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIM wajib diisi'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status wajib diisi'
                ]
            ],
            'pembiayaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pembiayaan wajib diisi'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        // Photo
        if ($photo == '') {
            $photoName = $this->request->getVar('old_photo');
        } else {
            $photoName = $photo->getRandomName();
            $photo->move('users_profile_pic', $photoName);
            if ($this->request->getVar('old_photo')) {
                if (file_exists('users_profile_pic/' . $this->request->getVar('old_photo'))) {
                    unlink('users_profile_pic/' . $this->request->getVar('old_photo'));
                }
            }
        }

        $userid = $this->request->getVar('id_ppds');

        $user_id = $_SESSION['user_id'] == $userid ? $_SESSION['user_id'] : $userid;
        // $query = $this->user_model->getUserById($user_id);
        // $current_user_photo = $query['photo'];

        $data = [
            'nama_lengkap' => $nama_lengkap,
            'jenis_kelamin' => $jenis_kelamin,
            'email' => $email,
            'photo' => $photoName,
            'password' => $password == "" ? $hidden_pass : password_hash($password, PASSWORD_BCRYPT),
            'alamat_asal' => $alamat_asal,
            'alamat_domisili' => $alamat_domisili,
            'no_telp' => $no_telp,
            'no_telp_drt' => $no_telp_drt,
            'nim' => $nim,
            'status' => $status,
            'pembiayaan' => $pembiayaan,
            'no_sip' => $no_sip,
            'no_str' => $no_str,
            'no_bpjs' => $no_bpjs,
            'no_rekening' => $no_rekening,
        ];

        foreach ($stase as $stase) {
            $builder = $db->table('stase_spv');

            $stase_spv = $builder->getWhere([
                'id_spv' => $user_id,
                'id_stase' => $stase
            ])->getResultObject();

            $all_stase_spv = $builder->getWhere([
                'id_spv' => $user_id,
            ])->getResultObject();

            if (count($stase_spv) > 0) {
                $data_stase_spv = [
                    'id_spv' => $user_id,
                    'id_stase' => $stase
                ];
                dd(count($stase_spv));

                $builder->insert($data_stase_spv);
            }
            // } elseif (!in_array($stase, $all_stase_spv)) {
            //     $builder->where([
            //         'id_stase' => $stase,
            //         'id_spv' => $user_id
            //     ]);
            //     $builder->delete();
            // }
        }

        // dd($data_stase_spv);
        $result = $this->user_model->update($user_id, $data);
        if ($result) {
            return redirect()->back()->with('success', 'Profile berhasil diubah');
            // return redirect()->to(base_url('/user/profile'))->with('success', 'Profile berhasil diubah');
        }
    }

    function stase()
    {
        $data = [
            'title' => 'Stase',
            'page_header' => 'Stase Saya',
            'tahap_satu' => $this->stase_ppds_model->getAllSTaseTahapSatuOfCurrentUser(),
            'tahap_dua' => $this->stase_ppds_model->getAllSTaseTahapDuaOfCurrentUser(),
            'tahap_tiga' => $this->stase_ppds_model->getAllSTaseTahapTigaOfCurrentUser(),
            'tahap_empat' => $this->stase_ppds_model->getAllSTaseTahapEmpatOfCurrentUser(),
        ];
        return view('user/stase', $data);
    }
}
