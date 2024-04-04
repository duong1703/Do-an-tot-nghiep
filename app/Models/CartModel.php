<?php


namespace App\Models;


use CodeIgniter\Model;

class CartModel extends Model
{

    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'product_id ', 'images', 'quantity ', 'price ' , 'total', 'created_at '];
    protected $useAutoIncrement = true; // Thêm dòng này để bật AUTO_INCREMENT cho cột khóa chính
    protected function beforeInsert(array $data)
    {
        // Add your logic here
        return $this->updateTimestamp($data);
    }
    protected function beforeUpdate(array $data)
    {
        return $this->updateTimestamp($data);
    }
    protected function updateTimestamp(array $data)
    {
        $currentTimestamp = date('Y-m-d H:i:s');

        if (!array_key_exists('created_at', $data)) {
            $data['created_at'] = $currentTimestamp;
        }

        return $data;
    }

    public function getProduct($productId)
    {
        // Viết truy vấn để lấy thông tin của sản phẩm từ CSDL dựa trên $productId
        // Trả về thông tin sản phẩm hoặc false nếu không tìm thấy sản phẩm
    }

    public function addToCart($cartItem)
    {
        $this->insert($cartItem);
    }
}