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
}
