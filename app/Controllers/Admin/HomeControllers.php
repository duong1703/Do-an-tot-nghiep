<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\BlogModel;

class HomeControllers extends BaseController
{

    public function __construct()
    {
        $db      = \Config\Database::connect();
    }

    public function index(): string
    {
        $data = [];

        $UserModel  = new UserModel();
        $usercount = $UserModel->countAllResults();

        $ProductModel  = new ProductModel();
        $productcount = $ProductModel->countAllResults();

        $BlogModel  = new BlogModel();
        $blogcount = $BlogModel->countAllResults();

        $dataLayout = [];

        if ($usercount) { 
            $dataLayout['usercount'] = $usercount;
        }
        if ($productcount) { 
            $dataLayout['productcount'] = $productcount;
        }
        if ($blogcount) { 
            $dataLayout['blogcount'] = $blogcount;
        }

       
        $cssFiles = [];
        $jsFiles = [];
        $data = $this->loadMasterLayout ($data, 'Trang chủ', 'admin/pages/home', $dataLayout, $jsFiles, $cssFiles);
        return view('admin/main', $data);
    }


}