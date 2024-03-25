<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'password'];

    protected function getUserInfo($userId)
    {
        $userModel = new \App\Models\UserModel();
        $userInfo = $userModel->find($userId);
        return $userInfo;
    }

    public function registerUsers($data){
        return $this->db->insert('users', $data);
    }
}
