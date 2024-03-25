<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Services\LoginService;
use CodeIgniter\Controller;

class AuthControllers extends Controller
{
    /**
    @var Service
     */
    private $service;

    public function __construct()
    {
        $this->service = new LoginService();
    }

    public function index()
    {
        if(session()->has('user_login')){
            return redirect('views/login');
        }
        return view('views/login');
    }


    public function logout()
    {
        // Load the session service
        $session = session();

        // Destroy the session
        $session->destroy();
        // Xóa tất cả dữ liệu phiên
        $this->service->logout();

        // Chuyển hướng người dùng đến trang đăng nhập
        return redirect('views/login');
    }
}
