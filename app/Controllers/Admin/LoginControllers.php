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
        // Xử lý đăng nhập ở đây và có kết quả của quá trình đăng nhập
        $result = array(
            'success' => true, // Đặt thành true nếu đăng nhập thành công, false nếu không thành công
            'messageCode' => 'success', // Mã thông điệp
            'message' => 'Đăng nhập thành công' // Thông điệp
        );

        if ($result['success']) {
            // Nếu đăng nhập thành công, thiết lập dữ liệu flash và chuyển hướng đến trang dashboard
            session()->setFlashdata('messageCode', $result['messageCode']);
            session()->setFlashdata('message', $result['message']);
            return redirect()->to('admin/home');
        } else {
            // Nếu đăng nhập không thành công, thiết lập dữ liệu flash và chuyển hướng đến trang login
            session()->setFlashdata('messageCode', $result['messageCode']);
            session()->setFlashdata('message', $result['message']);
            return redirect()->to('admin/login');
        }
    }
    public function home()
    {
        // Trang dashboard sau khi đăng nhập thành công
        // Hiển thị thông báo flash nếu có
        $data['messageCode'] = session()->getFlashdata('messageCode');
        $data['message'] = session()->getFlashdata('message');

        // Load view của trang dashboard với dữ liệu
        return view('admin/home', $data);
    }

    public function logout()
    {
        // Xóa tất cả dữ liệu phiên
        session()->destroy();

        // Chuyển hướng người dùng đến trang đăng nhập
        return redirect()->to('admin/login');
    }
}
