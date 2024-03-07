<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $productModel = new ProductModel();
        
        // Lấy danh sách các danh mục sản phẩm
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

        ]; // Thay bằng danh sách các danh mục thực tế
        
        // Tạo mảng để lưu trữ sản phẩm theo từng danh mục
        $productsByCategory = [];
        
        // Lặp qua mỗi danh mục và lấy sản phẩm tương ứng
        foreach ($category as $category) {
            // Lấy sản phẩm theo danh mục
            $productsByCategory[$category] = $productModel->where('category', $category)->findAll();
        }
        
        // Truyền dữ liệu sản phẩm theo danh mục vào view và render view
        return view('product', ['productsByCategory' => $productsByCategory]);
    }

    public function detail($productId)
    {
        $productModel = new ProductModel();
        // Lấy thông tin của sản phẩm từ ID sản phẩm
        $product = $this->$productModel->find($productId);

        // Pass thông tin sản phẩm vào view để hiển thị
        return view('product_detail', ['product' => $product]);
    }
}
