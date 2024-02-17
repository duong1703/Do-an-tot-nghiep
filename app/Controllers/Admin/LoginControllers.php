<?php

namespace App\Controllers\Admin;

use App\Common\ResultUtils;
use App\Controllers\BaseController;
use App\Services\LoginService;


class LoginControllers extends BaseController
{
    /**
        @var Service
    */
    private $service;

    public function __construct()
    {
        $this->service = new LoginService();
    }


    public function index()
    {
       return view('admin/login');
    }

    public function login()
    {
        $result= $this->service->hasLoginInfo($this->request);

        if($result['status'] === ResultUtils::STATUS_CODE_OK){
            return redirect("admin/pages/home");
        }elseif($result['status'] === ResultUtils::STATUS_CODE_ERR){
            return redirect("admin/login")->with($result['massageCode'],$result['messages']);
        }
        return redirect("home");
    }
}
