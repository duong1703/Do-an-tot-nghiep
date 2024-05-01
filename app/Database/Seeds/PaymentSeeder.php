<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' =>'test',
                'vnp_RequestId'  =>'test',
                'vnp_Command' =>'test',
                'vnp_TmnCode '  =>'test', 
                'vnp_TxnRef'  =>'test',
                'vnp_OrderInfo'  =>'test',
                'vnp_TransactionDate' =>'test',
                'vnp_CreateDate' =>'test',
                'vnp_IpAddr' =>'test',
                'created_at' =>'test',
            ],

        ];

        $this->db->table('vnpay')->insertBatch($data);
    }
}