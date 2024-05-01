<?php


namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;

class CartSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'customer_id' =>'1',
                'product_id' =>'1',
                'images' => '1709628953_fdc2eb489ee063d95cb4.jpg',
                'quantity' =>'5',
                'created_at' => '28/04/2024',
                
                
            ],

        ];

        $this->db->table('Cart')->insertBatch($data);
    }

}