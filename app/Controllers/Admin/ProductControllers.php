<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\ProductsService;
use App\Services\getProductByID;


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
        $dataLayout['product'] = [];
        $data = $this->loadMasterLayout($data, 'Danh sách sản phẩm', 'admin/pages/product/list', $dataLayout, $cssFiles, $jsFiles);
        return view('admin/main', $data);
    }

    public function add()
    {
        $data = []; 
        $data = $this->loadMasterLayout($data, 'Thêm sản phẩm', 'admin/pages/product/add');
        return view('admin/main', $data);
       
    }

    public function create()
    {
        $result = $this->service->addProductsInfo($this->request);
        return redirect()->back()->withInput()->with($result['massageCode'], $result['messages']);
    }

    public function edit($id)
    {
        $user = $this->service->getProductByID($id);

        if(!$user){
            return redirect('error/404');
        }

        $cssFiles = [
            base_url() . '/assets/admin/js/event.js'
            
        ];

        $dataLayout['product'] = [];
        $data = $this->loadMasterLayout([], 'Sửa tài khoản', 'admin/pages/product/edit', $dataLayout, $cssFiles, [] );
        return view('admin/main', $data);
    }

    public function update()
    {   
        $result = $this->service->updateProductInfo($this->request);
        return redirect()->back()->withInput()->with($result['massageCode'], $result['messages']);
    }

    public function delete($id)
    {
        $user = $this->service->getProductByID($id);

        if(!$user){
            return redirect('error/404');
        }

        $result = $this->service->deleteProduct($id);
        return redirect('admin/product/list')->with($result['massageCode'], $result['messages']);
    }
}
