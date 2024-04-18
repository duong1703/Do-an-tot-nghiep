<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\CartModel;

class CartControllers extends BaseController
{
    public function addToCart($id_products)
    {
      // Lấy thông tin sản phẩm từ CSDL dựa vào $productId
      $product = $this->ProductModel->find($id_products);

      // Kiểm tra nếu sản phẩm tồn tại
      if ($product) {
          // Lấy thông tin giỏ hàng từ session (nếu có)
          $cart = session()->get('cart');

            // Nếu giỏ hàng chưa được khởi tạo, khởi tạo giỏ hàng
            if (!$cart) {
                $cart = [];
            }

          // Kiểm tra xem giỏ hàng đã được khởi tạo hay chưa
          if (!$cart) {
              $cart = [
                  $id_products => [
                      'id_products' => $product['id_products'],
                      'name' => $product['name'],
                      'price' => $product['price'],
                      'quantity' => 1
                  ]
              ];
          } else {
              // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
              if (isset($cart[$id_products])) {
                  // Nếu đã có, tăng số lượng lên 1
                  $cart[$id_products]['quantity']++;
              } else {
                  // Nếu chưa có, thêm sản phẩm mới vào giỏ hàng
                  $cart[$id_products] = [
                      'id_products' => $product['id_products'],
                      'name' => $product['name'],
                      'price' => $product['price'],
                      'quantity' => 1
                  ];
              }
          }

          // Lưu thông tin giỏ hàng vào session
          session()->set('cart', $cart);

          // Redirect hoặc trả về view giỏ hàng
          return redirect()->to('views/cart');
      } else {
          // Xử lý khi không tìm thấy s
}}


}