<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model

{
   
    protected $table = 'vnpay';
    protected $primaryKey = 'id';
    protected $allowedFields = 
    [
        'vnp_RequestId', 
        'vnp_Command', 
        'vnp_TmnCode', 
        'vnp_TxnRef', 
        'vnp_OrderInfo', 
        'vnp_TransactionDate', 
        'vnp_CreateDate',
        'vnp_IpAddr',
        'created_at',
    ];
    protected $useAutoIncrement = true; // Thêm dòng này để bật AUTO_INCREMENT cho cột khóa chính

    protected function beforeInsert(array $data)
    {
        // Add your logic here
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