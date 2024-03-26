<?php


namespace App\Controllers;
use App\Models\CartModel;
use App\Models\ProductModel;

class CartControllers extends BaseController
{
    public function index(){
        $session = session();
        $data['products'] = $session->get('cart') ?? []; // Lấy dữ liệu giỏ hàng từ session, nếu không có thì trả về mảng rỗng
        return view('cart', $data);
    }

    public function buy($id)
    {
        $ProductModel = new ProductModel();
        $product = $ProductModel->find($id);

        $session = session();
        $cart = $session->get('cart') ?? [];

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $found = false;
        foreach ($cart as &$item) {
            if ($item['id_product'] == $product['id_product']) {
                $item['quantity']++;
                $found = true;
                break;
            }
        }

        // Nếu sản phẩm chưa tồn tại, thêm vào giỏ hàng
        if (!$found) {
            $item = [
                'id_product' => $product['id_product'],
                'name' => $product['name'],
                'images' => $product['images'],
                'price' => $product['price'],
                'quantity' => 1
            ];
            $cart[] = $item;
        }

        // Cập nhật session giỏ hàng
        $session->set('cart', $cart);

        return redirect()->to(site_url('views/cart'));
    }


}