<?php

namespace App\Controllers\Admin;
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
       return view('login');
    }
}
