<?php

namespace App\Controllers\Users;
use App\Controllers\BaseController; 
use App\Models\ProductModel;
use App\Models\BlogModel;
use App\Models\CategoryModel;
use App\Models\UserModel;

class HomeControllers extends BaseController
{
    public function index(): string
    {
        $productModel = new ProductModel();
        $allParam = $productModel->findAll();
        $products = [];
        $data['cateObj'] = $allParam;
        $data['recommendedProducts'] = $productModel->findAll();
        return view('index', $data);
    }

    public function login(){
        return view('login');
    }

    public function register(){
            echo view('register');

    }

    public function logout(){
        return redirect()->to('views/login');
    }

    public function contact(){
        return view('contact');
    }

    public function reviews(){
        return view('reviews');
    }

    public function blog(){
        $model = new BlogModel();
        $data['blogsObj'] = $model->findAll();
        return view('blog', $data);
    }

    public function product(){
        $productModel = new ProductModel();
//        $product = $productModel->paginate(10);
//        if($product == null){
//            return false;
//        }
        $data['products'] = $productModel->paginate(12);
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




