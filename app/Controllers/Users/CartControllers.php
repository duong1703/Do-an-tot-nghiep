<?php


namespace App\Controllers;
use App\Models\CartModel;
use App\Models\ProductModel;

class CartControllers extends BaseController
{
    protected $CartModel;
    protected $ProductModel;

    public function __construct()
    {
        $this->CartModel = new CartModel();
        $this->ProductModel = new ProductModel();
    }

    public function addToCart()
    {
        // Nhận dữ liệu từ request POST
        $id_product = $this->request->getPost('id_product');
        $quantity = $this->request->getPost('quantity');

        // Kiểm tra xem sản phẩm có tồn tại không
        $product = $this->ProductModel->find($id_product);
        if (!$product) {
            return $this->response->setJSON(['success' => false, 'message' => 'Sản phẩm không tồn tại.']);
        }

        // Thêm sản phẩm vào giỏ hàng
        $this->CartModel->addToCart($id_product, $quantity);

        return $this->response->setJSON(['success' => true, 'message' => 'Sản phẩm đã được thêm vào giỏ hàng.']);
    }
}