<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class CartControllers extends Controller
{
    public function add()
    {
        // Lấy dữ liệu từ request
        $productId = $this->request->getVar('product_id');
        $quantity = $this->request->getVar('quantity');

        // Lấy thông tin sản phẩm
        $productModel = new ProductModel();
        $product = $productModel->find($productId);

        // Thêm sản phẩm vào giỏ hàng
        $cart = \Config\Services::cart();
        $cart->insert([
            'id' => $product['id'],
            'images' => $product['images'],
            'name' => $product['name'],
            'price' => $product['price'],
            'qty' => $quantity,
            'total' => $product['total'],
            'options' => [],
        ]);

        // Chuyển hướng đến trang giỏ hàng
        return redirect()->to('views/cart');
    }
}