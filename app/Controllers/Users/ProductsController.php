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
        

        $category = [
                        'MÀN HÌNH', 
                        'THÙNG MÁY', 
                        'CHIP',
                        'RAM, SSD',
                        'CARD ĐỒ HỌA',
                        'CHUỘT, BÀN PHÍM',
                        'RAM, SSD',
                        'BÀN, GHẾ GAMING',
                        'QUẠT TẢN NHIỆT',
                        'RAM, SSD LAPTOP',
                        'CHUỘT, BÀN PHÍM LAPTOP',
                        'TAI NGHE ASUS',
                        'Tai nghe Razer',
                        'Tai nghe Apple',
                        'Tai nghe Harmar Kadon',
                        'Tai nghe Havit',
                        'Máy tính laptop ASUS',
                        'Máy tính laptop ACER',
                        'Máy tính laptop RAZER',
                        'Máy tính laptop MSI',
                        'Máy tính MACBOOK',
                        'Máy tính laptop DELL',
                        'Máy tính đồng bộ',

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
            return false; // Assuming $product is false when not found
        }

        $condition = [
            'deleted_at' => null,
            'id' => $productId
        ];


        $withSelect = 'name, description, price, images, amount, category';
        $productObj = $productModel->getFirstByConditions($condition, '', $withSelect);

        if (!$productObj) {
            return false; // Assuming $productObj is false when not found
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
