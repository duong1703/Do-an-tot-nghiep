<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\BaseModel;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'password'];

    public function getUser(){
        return $this->findAll();
    }

    public function getCount($id)
    {
    $userModel = new UserModel();
    
    $count = $userModel->where('id', $id)->countAllResults(); 

   
    return $count;
    }

}