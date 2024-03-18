<?php

namespace App\Controllers\Users;
use App\Controllers\BaseController;

use App\Models\ProductModel;
use App\Models\CategoryModel;
class ProductsController extends BaseController
{
    public function index($category)
    {
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();
        $category = $categoryModel->find($category);
        $products = $productModel->where('category_id', $category)->findAll();
        $data['products'] = $productModel->findAll();

        $data = [
            'products' => $productModel->paginate(10), // Số lượng sản phẩm trên mỗi trang
            'pager' => $productModel->pager
        ];

        

        
        $category = [
                        'MÀN HÌNH', 
                        'THÙNG MÁY', 
                        'CHIP',
                        'RAM',
                        'SSD',
                        'HDD',
                        'CARD ĐỒ HỌA',
                        'CHUỘT', 
                        'BÀN PHÍM',
                        'BÀN, GHẾ GAMING',
                        'QUẠT TẢN NHIỆT',
                        'TAI NGHE ',
                        'LAPTOP',
                        'BALO MÁY TÍNH',
                        'IPAD',
                        'TABLET',
                        'LOA',

        ];

        return view('product', $data , [
            'category' => $category,
            'products' => $products
            ]);

        
    }

    public function productDetail($productId)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($productId);

        if (!$product) {
            return false; //Assuming $product is false when not found
        }

        $condition = [
            'deleted_at' => null,
            'id' => $productId
        ];
        $withSelect = 'name, description, price, images, amount, category';
        $productObj = $productModel->getFirstByConditions($condition, '', $withSelect);

        if (!$productObj) {
            return false; //Assuming $productObj is false when not found
        }
        $data['productObj'] = $productObj;
        $data['productId'] = $productId;


        return view('product_detail', $data);
    }

    public function products()
    {
        // Load model ProductModel
        $productModel = new ProductModel();
        
        // Lấy danh sách sản phẩm từ model
        $data['products'] = $productModel->getAllProducts();

        // Load view và truyền dữ liệu sản phẩm vào view
        return view('products', $data);
        
    }
}
