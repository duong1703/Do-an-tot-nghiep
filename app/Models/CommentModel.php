<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ProductModel;

class CommentModel extends Model
{
    protected $table = 'product_reviews'; // Tên của bảng trong cơ sở dữ liệu

    protected $primaryKey = 'id_comment'; // Tên của trường ID trong bảng

    protected $allowedFields = ['id_product', 'customer_name', 'customer_email', 'content', 'rating' , 'created_at']; // Các trường cho phép thêm/sửa

    protected $useTimestamps = true; // Sử dụng timestamp cho trường created_at

    protected $createdField = 'created_at'; // Tên của trường created_at

    protected function beforeInsert(array $data)
    {
        unset($data['customer_id']);
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

        $data['updated_at'] = $currentTimestamp;

        return $data;
    }

    // Method to insert a new rating
    public function rating($data)
    {
        return $this->insert($data);
    }

    public function getCommentByProductId($id_product)
    {
        $ProductModel = new ProductModel();
        $id_product = $ProductModel->findAll();
        return $id_product;
    }


    
    
}
