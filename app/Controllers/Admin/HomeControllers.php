<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class HomeControllers extends BaseController
{
    public function index(): string
    {
        $data = [];
        $cssFiles = [];
        $jsFiles = [];
        $data = $this->loadMasterLayout ($data, 'Trang chủ', 'admin/pages/home', $jsFiles, $cssFiles);
        return view('admin/main', $data);
    }
}