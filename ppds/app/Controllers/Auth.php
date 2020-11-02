<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    protected $auth_model;
    public function __construct()
    {
        $this->auth_model = new AuthModel();
    }

    public function view()
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

    //--------------------------------------------------------------------

}
