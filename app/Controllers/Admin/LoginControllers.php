<?php

namespace App\Controllers\Admin;

use App\Common\ResultUtils;
use App\Controllers\BaseController;
use App\Services\LoginService;


class LoginControllers extends BaseController
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
        return view('admin/pages/login');
    }

    public function login()
    {
        $result = $this->service->hasLoginInfo($this->request);
        if($result["status"] === ResultUtils::STATUS_CODE_OK){
            return redirect("admin/home");
        }elseif($result["status"] === ResultUtils::STATUS_CODE_ERR){
            return redirect("admin/login")->with($result['messageCode'], $result['messages']);
        }
        return redirect("home");
    }

    public function logout()
    {
        // Xóa tất cả dữ liệu phiên
        $this->service->logout();

        // Chuyển hướng người dùng đến trang đăng nhập
        return redirect('admin/login');
    }
}
