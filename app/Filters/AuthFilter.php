<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = Services::session();

        // Kiểm tra xem người dùng đã đăng nhập vào trang quản trị chưa
        if (!$session->get('admin_logged_in')) {
            // Nếu không, chuyển hướng đến trang đăng nhập
            return redirect()->to(site_url('admin/login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Không cần thực hiện gì sau khi xử lý yêu cầu
    }
}
