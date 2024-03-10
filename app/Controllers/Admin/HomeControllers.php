<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UserModel;

class HomeControllers extends BaseController
{
    public function index(): string
    {
        $userModel = new UserModel();
        $totalUsers = $userModel->countAllResults();
        $data = [];
        $cssFiles = [];
        $jsFiles = [];
        $data = $this->loadMasterLayout ($data, 'Trang chủ', 'admin/pages/home', $jsFiles, $cssFiles);
        return view('admin/main', $data );
    }

    public function countUser(){
        $userModel = new UserModel();
        $totalUsers = $userModel->countAllResults();
        return view('admin/pages/home', ['totalUsers' => $totalUsers]);
    }



}