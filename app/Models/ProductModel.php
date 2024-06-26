<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends BaseModel
{
    protected $table = 'products';
    protected $primaryKey = 'id_product';
    protected $allowedFields = ['name', 'description', 'price', 'images', 'amount', 'category',
                                'status_product', 'created_at', 'updated_at', 'deleted_at'];
    protected $useAutoIncrement = true; // Thêm dòng này để bật AUTO_INCREMENT cho cột khóa chính
    protected $returnType = 'array';
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


    public function __construct()
    {
        parent::__construct();
    }


    public function getcountbycategory(){
        return $this->countProducts();
    }

    public function getProduct($id)
    {
        return $this->find($id);
    }

    public function countProducts()
    {
        return $this->countAllesults(); // This will count all rows in the 'products' table
    }

    public function search($keyword)
    {
        return $this->like('name', $keyword)
                    ->orWhere('description', $keyword)
                    ->orWhere('category', $keyword);
    }
    
}

