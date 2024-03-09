<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        // Kiểm tra nếu người dùng đã đăng nhập
        if (session()->get('isLoggedIn')) {
            return redirect()->to('views/profile');
        }

        // Nếu không, hiển thị trang đăng nhập
        return view('views/login');
    }

    public function processLogin()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Đăng nhập thành công, lưu thông tin người dùng vào session
            session()->set([
                'isLoggedIn' => true,
                'userId' => $user['id'],
                'email' => $user['email'],
                // Lưu thêm thông tin khác của người dùng nếu cần
            ]);

            return redirect()->to('views/profile');
        } else {
            // Đăng nhập không thành công, redirect lại trang đăng nhập với thông báo lỗi
            return redirect()->back()->withInput()->with('error', 'Invalid email or password');
        }
    }

    public function logout()
    {
        // Xóa tất cả các biến session liên quan đến đăng nhập
        session()->remove(['isLoggedIn', 'userId', 'email']);

        return redirect()->to('/');
    }
}
