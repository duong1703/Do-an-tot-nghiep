<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' =>'1',
                'images' => 'public/assets/images/DellXPS14.jpg',
                'name' => 'Asus Vivobook S210',
                'price' => '20.000.000 VND',
                'description' => 'Sản phẩm mới luôn tốt và bền',
                'caterory' => 'Laptop',
                'amount' => '100',
            ],

        ];

        $this->db->table('products')->insertBatch($data);
    }
}
