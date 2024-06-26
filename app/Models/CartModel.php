<?php


namespace App\Models;


use CodeIgniter\Model;

class CartModel extends Model
{

    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customers_id', 'product_id ', 'images', 'quantity ', 'price ' , 'total', 'created_at '];
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

    public function getProductById($productId)
    {
        return $this->find($productId); 
    }

    public function addToCart($cartItem)
    {
        $this->insert($cartItem);
    }
}