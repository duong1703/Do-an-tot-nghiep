<?php

namespace App\Controllers\Users;
use App\Controllers\BaseController;

class UserLoginController extends BaseController
{
    public function login()
    {
        return view('login');
    }
    
}