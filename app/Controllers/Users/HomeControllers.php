<?php

namespace App\Controllers\Users;
use App\Controllers\BaseController;

class HomeControllers extends BaseController
{
    public function index(): string
    {
        return view('index');
 
    }

    public function login(){
        return view('login');
    }

    public function contact(){
        return view('contact');
    }

    public function product(){
        return view('product');
    }
}


