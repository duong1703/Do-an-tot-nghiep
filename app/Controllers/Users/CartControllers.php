<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\CartModel;

class CartControllers extends BaseController
{
    public function addToCart()
    {
        $id_product = $this->request->getPost('id_product');

        // Lấy thông tin sản phẩm từ CSDL
        $ProductModel = new ProductModel();
        $product = $ProductModel->find($id_product);

        if ($product) {
            // Thêm sản phẩm vào giỏ hàng
            $cart = session()->get('cart') ?? [];
            $cart[] = $product;
            session()->set('cart', $cart);

            // Trả về phản hồi JSON cho trình duyệt
            return $this->response->setJSON(['success' => true]);
        } else {
            // Trả về phản hồi JSON nếu không tìm thấy sản phẩm
            return $this->response->setJSON(['success' => false, 'message' => 'Sản phẩm không tồn tại.']);
        }
        return view('cart', ['product' => $product]);
    }

}
