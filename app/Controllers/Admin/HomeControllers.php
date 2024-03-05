<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UserModel;

class HomeControllers extends BaseController
{
    public function index(): string
    {
        $userModel = new UserModel();

        $data = [
            'totalUsers' => $userModel->countAllResults(),
            ];
        $cssFiles = [];
        $jsFiles = [];
        $data = $this->loadMasterLayout ($data, 'Trang chủ', 'admin/pages/home', $jsFiles, $cssFiles);
        return view('admin/main', $data);
    }
}