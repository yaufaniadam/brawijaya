<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    public function login($data)
    {
        $username = $data['username'];
        $query = $this->db->table("ci_users")->where(array('username' => $username));
        $result = $query->countAllResults();

        // dd($result);

        if ($result == 0) {
            return false;
        } else {
            $query2 = $this->db->table("ci_users")->where(array('username' => $username));
            $result = $query2->get()->getRowArray();
            // return $result['aktif'];
            $valid_password = password_verify($data['password'], $result['password']);
            if ($valid_password) {
                if ($result['aktif'] == 1) {
                    $query2 = $this->db->table("ci_users")->where(array('username' => $username));
                    return $result = $query2->get()->getRowArray();
                    // return $is_active;
                } else {
                    return false;
                }
            }
        }
    }
}
