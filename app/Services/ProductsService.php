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

}

