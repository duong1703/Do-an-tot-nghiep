<?php

namespace App\Services;

use App\Common\ResultUtils;
use Exception;

class ProductsService extends BaseService
{
    private $users;
    /**
        Tạo hàm constructor
     */
    function __construct()
    {
        parent::__construct();
        //$this->users = new UserModel();
        //$this->users->protect(false);
    }

    public function addProductsInfo($requestData)
    {
        $validate = $this->validateAddProducts($requestData);

        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => $validate->getError()
            ];
        }
        $dataSave = $requestData->getPost();
        dd($dataSave);
        $dataSave['password'] = password_hash($dataSave['password'], PASSWORD_BCRYPT);
        try {
            $this->users->save($dataSave);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'massageCode' => ResultUtils::MESSAGE_CODE_OK,
                'messages' => ['success' => 'Đăng ký thông tin thành công']
            ];
        } catch (Exception $e) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => ['success' => $e->getMessage()]
            ];
        }
    }

    public function validateAddProducts($requestData)
    {
        $rule = [
           'images' => 'max_length[4]',
           'name' => 'max_length[100]',
           'price' => 'max_length[255]',
           'description' => 'max_length[255]',
           'caterory' => 'max_length[255]',
           'amount' => 'max_length[255]',

        ];
        $message = [
            'images' => [
                'max_length' => 'Ảnh quá lớn, vui lòng chọn ảnh khác.',
            ],

            'name' => [
                'max_length' => 'Tên quá dài, vui lòng nhập {param} ký tự.',
            ],

            'price' => [
                'max_length' => 'Gía quá dài, vui lòng nhập {param} ký tự.',
            ],

            'description' => [
                'max_length' => 'Mô tả quá dài, vui lòng nhập {param} ký tự.',
            ],

            'caterory' => [
                'max_length' => 'Danh mục quá dài, vui lòng nhập {param} ký tự.',
            ],

            'amount' => [
                'max_length' => 'Số lượng quá dài, vui lòng nhập {param} ký tự.',
            ],
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withrequest($requestData)->run();

        return $this->validation;
    }


}

