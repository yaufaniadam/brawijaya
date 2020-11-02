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
        $email = $this->request->getVar('email');
        $nama_lengkap = $this->request->getVar('nama');
        $password = $this->request->getVar('password');
        $hidden_pass = $this->request->getVar('old_password');
        $photo = $this->request->getFile('photo_profile');

        // dd($this->request->getVar());

        // if (!$this->validate([
        //     'email' => [
        //         'rules' => ['is_unique[ci_users.email]'],
        //         'errors' => [
        //             'is_unique' => 'email sudah dipakai'
        //         ]
        //     ],
        //     'photo' => [
        //         'rules' => ['is_image[photo_profile]'],
        //         // |mime_in[photo,image/jpg,image/png]'
        //         'errors' => [
        //             'is_image' => 'file harus berupa gambar'
        //         ]
        //     ]
        // ])) {
        //     $validation = \Config\Services::validation();
        //     return redirect()->back()->withInput()->with('validation', $validation);
        // }

        // Photo
        if ($photo == '') {
            $photoName = $this->request->getVar('old_photo');
        } else {
            $photoName = $photo->getRandomName();
            $photo->move('users_profile_pic', $photoName);
            if ($this->request->getVar('old_photo')) {
                unlink('users_profile_pic/' . $this->request->getVar('old_photo'));
            }
        }

        $user_id = $_SESSION['user_id'];
        // $query = $this->user_model->getUserById($user_id);
        // $current_user_photo = $query['photo'];

        $data = [
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
            'photo' => $photoName,
            'password' => $password == "" ? $hidden_pass : $password,
        ];
        // dd($data);
        $result = $this->user_model->update($user_id, $data);
        if ($result) {
            return redirect()->to(base_url('/user/profile'))->with('success', 'Profile berhasil diubah');
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
