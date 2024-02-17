<?php

namespace App\Controllers\Users;
use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function login()
    {
        return view('login');
    }
}