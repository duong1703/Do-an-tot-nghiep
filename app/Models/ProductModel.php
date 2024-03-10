<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends BaseModel
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    public function getProduct($id)
    {
        return $this->find($id);
    }
    protected $allowedFields = ['name', 'description', 'price', 'images' , 'amount' , 'category', 'status_product', 'created_at', 'updated_at', 'deleted_at'];
    protected $beforeUpdate = ['updateTimestamp'];

    protected function updateTimestamp(array $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }
}

