<?php


namespace App\Models;


use CodeIgniter\Model;

class CartModel extends Model
{

    protected $table = 'cart';
    protected $primaryKey = 'id_cart';
    protected $allowedFields = ['id_cart ', 'user', 'id_product', 'quantity' , 'created_at', 'status_cart'];

    public function updateProduct($id_product, $quantity)
    {
        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $cartItem = $this->where('id_product', id_product())->where('id_product', $id_product)->first();

        if ($cartItem) {
            // Cập nhật số lượng sản phẩm
            $newQuantity = $cartItem['quantity'] + $quantity;
            $this->update($cartItem['id_product'], ['quantity' => $newQuantity]);
        } else {
            // Thêm mới sản phẩm vào giỏ hàng
            $this->insert(['id_product' => id_product(), 'id_product' => $id_product, 'quantity' => $quantity]);
        }
    }
}