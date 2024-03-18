<?php

namespace App\Controllers\Users;
use App\Controllers\BaseController; 
use App\Models\ProductModel;
use App\Models\BlogModel;
use App\Models\CategoryModel;

class HomeControllers extends BaseController
{
    public function index(): string
    {
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

    public function blog(){
        $model = new BlogModel();
        $data['blogsObj'] = $model->findAll();
        return view('blog', $data);
    }

    public function product(){
        $productModel = new ProductModel();
        $allParam = $productModel->findAll();
        if($allParam == null){
            return false;
        }
        $data['products'] = $allParam;
        return view('product',$data);
    }

    public function product_detail(){
        return view('product_detail');
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


