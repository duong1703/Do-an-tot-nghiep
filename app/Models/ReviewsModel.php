<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewsModel extends Model
{
    protected $table = 'reviews'; // Tên của bảng trong cơ sở dữ liệu

    protected $primaryKey = 'id'; // Tên của trường ID trong bảng

    protected $allowedFields = ['user_id', 'id_product', 'rating', 'comment', 'created_at', 'updated_at']; // Các trường cho phép thêm/sửa

    protected $useTimestamps = true; // Sử dụng timestamp cho trường created_at

    protected $createdField = 'created_at'; // Tên của trường created_at

    protected $updatedField = 'updated_at'; // Tên của trường updated_at

    protected function beforeInsert(array $data)
    {
        unset($data['id_product']);
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
}
