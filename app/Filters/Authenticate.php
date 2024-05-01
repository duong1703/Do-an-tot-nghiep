<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Authenticate implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $authenticationService = Services::authentication();

        if (! $authenticationService->check()) {
            // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect()->to('/login');
        }

        // Người dùng đã đăng nhập, cho phép tiếp tục
        return;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Thực hiện sau khi xử lý request
    }
}
