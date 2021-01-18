<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    public function login($data)
    {
        $username = $data['username'];
        $query = $this->db->table("ci_users")->where(array('username' => $username));
        $is_active = $query->get()->getRowObject();

        if ($query->countAllResults() == 0) {
            return false;
        } else {
            $query = $this->db->table("ci_users")->where(array('username' => $username));
            $result = $query->get()->getRowArray();
            $valid_password = password_verify($data['password'], $result['password']);
            if ($valid_password) {
                if ($is_active->aktif == 1) {
                    $query = $this->db->table("ci_users")->where(array('username' => $username));
                    return $result = $query->get()->getRowArray();
                } else {
                    return false;
                }
            }
        }
    }
}
