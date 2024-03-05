<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProfileControllers extends BaseController
{

    // Trong Controller của trang tài khoản
    public function profile()
{
    $session = session();

    if (!$session->get('logged_in')) {
        return redirect()->to('views/login');
    }

    // Lấy thông tin người dùng từ session hoặc database
    $data['username'] = $session->get('username');
    $data['email'] = $session->get('email');

    echo view('profile', $data);
}


  
}
