<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\ProductsService;
use App\Models\ProductModel;


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
        $dataLayout['products'] = $this->service->getAllProduct();
        $data = $this->loadMasterLayout($data, 'Danh sách sản phẩm', 'admin/pages/product/list', $dataLayout, $cssFiles, $jsFiles);
        return view('admin/main', $data);
    }

    public function add()
    {
        $data = [];
        $products = new ProductModel();
        $data['products'] = $products->findAll();
        //return view('view/product',  $data); 
        $data = $this->loadMasterLayout($data, 'Thêm sản phẩm', 'admin/pages/product/add');
        return view('admin/main', $data);
    }

    public function create()
    {
        $result = $this->service->addProductsInfo($this->request);
        //dd( $result);
        return redirect()->back()->withInput()->with($result['messageCode'], $result['messages']);
    }

    public function edit($id)
    {

        $productModel = new ProductModel();


        $product = $this->service->getProductByID($id);

        if (!$product) {
            return redirect('error/404');
        }

        $cssFiles = [
            base_url() . '/assets/admin/js/event.js'
        ];
        $dataLayout['product'] = $productModel->find($id);;
        $data = $this->loadMasterLayout([], 'Sửa tài khoản', 'admin/pages/product/edit', $dataLayout, $cssFiles, []);
        return view('admin/main', $data);
    }

    public function update()
    {
        $productModel = new ProductModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'images' => $this->request->getPost('images'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description'),
            'category' => $this->request->getPost('category'),
            'amount' => $this->request->getPost('amount')
            // Thêm các trường dữ liệu khác tương ứng với dữ liệu cần cập nhật   
        ];

        $data = [
            'products' => $productModel->paginate(10), // Số lượng sản phẩm trên mỗi trang
            'pager' => $productModel->pager,
        ];

        $productModel->update($this->request->getPost('id'), $data);
        $result = $this->service->updateProductInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'], $result['messages']);
    }

    public function delete($id)
    {
        $product = $this->service->getProductByID($id);


        if (!$product) {
            return redirect('error/404');
        }

        $result = $this->service->deleteProduct($id);
        return redirect('admin/product/list')->with($result['massageCode'], $result['messages']);
    }
}
