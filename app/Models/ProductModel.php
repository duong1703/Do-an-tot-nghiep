<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'price', 'images' , 'amount' , 'category'];

    public function getProduct($id)
    {
        return $this->find($id);
    }
}

