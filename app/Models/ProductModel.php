<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
<<<<<<< HEAD
    protected $allowedFields = ['name', 'description', 'price', 'images' , 'amount' , 'category'];

    public function getProduct($id)
    {
        return $this->find($id);
    }
=======
    protected $allowedFields = ['name', 'description', 'price', 'images' , 'amount' , 'category', 'created_at', 'updated_at', 'deleted_at'];
>>>>>>> 1c1b7617754c92c946817e718fa36a11c7d51f36
}

