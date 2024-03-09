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

    public function editOrUpdate($id)
    {
        $productModel = new ProductModel();
        $product = $this->service->getProductByID($id);

        if (!$product) {
            return redirect()->to('error/404')->with('error', 'Không tìm thấy sản phẩm với ID: ' . $id);
        }
        if ($this->request->getMethod() === 'post') {
            // Xử lý biểu mẫu khi người dùng gửi để cập nhật thông tin sản phẩm
            $updatedData = [
                'name' => $this->request->getPost('name'),
                'price' => $this->request->getPost('price'),
                'description' => $this->request->getPost('description'),
                'amount' => $this->request->getPost('amount'),
                'category' => $this->request->getPost('category'),
                // 'images' => $this->request->getPost('images'),
            ];

            // Cập nhật thông tin sản phẩm trong cơ sở dữ liệu
            $productModel->update($id, $updatedData);
            // Chuyển hướng đến trang sản phẩm đã chỉnh sửa hoặc bất kỳ trang nào khác mong muốn
            session()->setFlashdata('success', 'Sửa thành công');
            return redirect()->to('admin/product/edit/' . $id);
        }
        // Hiển thị biểu mẫu chỉnh sửa
        $cssFiles = [
            base_url() . '/assets/admin/js/event.js'
        ];
        $dataLayout['product'] = $product;
        $data = $this->loadMasterLayout([], 'Sửa tài khoản', 'admin/pages/product/edit', $dataLayout, $cssFiles, []);
        return view('admin/main', $data);
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
