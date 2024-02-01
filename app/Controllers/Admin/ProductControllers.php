<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\ProductsService;


class ProductControllers extends BaseController
{
    /**
        @var Service
    */
    private $service;

    public function __construct()
    {
        $this->service = new ProductsService();
    }


    public function list(): string
    {
        $data = [];
       
        
        $cssFiles = [
            'http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js',
            base_url() . '/assets/admin/js/datatable.js',
            base_url() . '/assets/admin/js/event.js',
            
        ];

        $jsFiles = [
            'https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css',
            base_url() . '/assets/admin/css/datatable.css'

        ];
        $dataLayout['products'] = [];
        $data = $this->loadMasterLayout($data, 'Danh sách sản phẩm', 'admin/pages/product/list',$dataLayout, $cssFiles, $jsFiles);
        return view('admin/main', $data);
    }

    public function add(){
        $data = []; 
        $data = $this->loadMasterLayout($data, 'Thêm sản phẩm', 'admin/pages/product/add');
        return view('admin/main', $data);
    }
}