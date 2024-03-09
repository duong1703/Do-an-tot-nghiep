<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use CodeIgniter\Controller;

class ProductController extends Controller
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

    public function detail($productId)
    {
        $productModel = new ProductModel();
   
        $product = $this->$productModel->find($productId);

 
        return view('product_detail', ['product' => $product]);
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
