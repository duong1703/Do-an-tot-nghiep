<?php

namespace App\Controllers\Users;
use App\Controllers\BaseController; 
use App\Models\ProductModel;
use App\Models\CategoryModel;

class HomeControllers extends BaseController
{
    public function index(): string
    {
        //return view('index');
        $productModel = new ProductModel();
        $allParam = $productModel->findAll();
        $products = [];
        $data['cateObj'] = $allParam;
        return view('index', $data);
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function contact(){
        return view('contact');
    }

    public function product(){
        return view('product');
    }

    public function cart(){
        return view('cart');
    }

    public function profile(){
        return view('profile');
    }

    public function checkout(){
        return view('checkout');
    }

    public function vnpay_pay(){
        return view('vnpay/vnpay_pay');
    }
}


