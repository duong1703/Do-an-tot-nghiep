<?php

namespace App\Services;

use App\Models\UserModel;
use App\Common\ResultUtils;
use Exception;

class LoginService extends BaseService
{
   // private $users;
    /**
        Tạo hàm constructor
     */
    function __construct()
    {
        parent::__construct();
        //$this->users = new UserModel();
       // $this->users->protect(false);
    }

    public function hasLoginInfo($reqData)
    {
        $validate = $this->validateLogin($reqData);


        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => $validate->getError()
            ];
        }
    }

    private function validateLogin($reqData)
    {
        $rule = [
            'email' => 'valid_email',
            'password' => 'max_length[30], min_length[6]',
        ];

        $message = [
            'email' => [
                'valid_email' => 'Tài khoản {filled} {values} không đúng định dạng'
            ],
            'password' => [
                'max_length' => 'Mật khẩu quá dài, vui lòng nhập {param} ký tự',
                'min_length' => 'Mật khẩu không được ít hơn {param} ký tự'
            ],
        ];


        $this->validation->setRules($rule, $message);
        $this->validation->withrequest($reqData)->run();

        return $this->validation;
    }
}
