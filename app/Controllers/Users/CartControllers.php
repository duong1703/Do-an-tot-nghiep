<?php

namespace App\Controllers\Users;

use App\Models\CartModel;
use App\Models\ProductModel;
use App\Controllers\BaseController;

class CartControllers extends BaseController
{
    // Trong CartControllers.php hoặc controller tương ứng
    public function addCart()
    {
        $productId = $this->request->getPost('product_id');
        // Kiểm tra xem productId có tồn tại không
        if (!$productId) {
            return $this->response->setStatusCode(400)->setJSON(['success' => false, 'message' => 'Không tìm thấy ID sản phẩm.']);
        }
        $cartModel = new CartModel();
        $product = $cartModel->find($productId);
        if (!$product) {
            // Nếu sản phẩm không tồn tại, trả về phản hồi lỗi
            return $this->response->setStatusCode(404)->setJSON(['success' => false, 'message' => 'Không tìm thấy sản phẩm.']);
        }
        return $this->response->setJSON(['success' => true, 'message' => 'Sản phẩm đã được thêm vào giỏ hàng.']);
    }
}