<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthControllers extends Controller
{
    public function login()
    {
        // Kiểm tra xem người dùng đã gửi dữ liệu đăng nhập chưa
        if ($this->request->getMethod() === 'post') {
            // Lấy thông tin đăng nhập từ biểu mẫu
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            // Kiểm tra thông tin đăng nhập trong cơ sở dữ liệu
            $userModel = new UserModel();
            $user = $userModel->where('email', $email)->first();

            if ($user && password_verify($password, $user['password'])) {
                // Đăng nhập thành công, lưu thông tin người dùng vào session và chuyển hướng đến trang chính
                $session = session();
                $session->set('user', $user);
                return redirect()->to('views/index');
            } else {
                // Đăng nhập không thành công, hiển thị thông báo lỗi
                return redirect()->back()->with('error', 'Email hoặc mật khẩu không chính xác');
            }
        }

        // Hiển thị form đăng nhập
        return view('views/login');
    }
}
