<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    public function getProduct($id)
    {
        return $this->find($id);
    }
    protected $allowedFields = ['name', 'description', 'price', 'images' , 'amount' , 'category', 'created_at', 'updated_at', 'deleted_at'];
}

