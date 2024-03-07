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
        $categoryModel = new CategoryModel();
        $category = $categoryModel->findAll();
        $products = [];
        foreach ($category as $category) {
            $products[$category['name']] = $productModel->where('id', $category['id'])->findAll();
        }
        $data = [
            'products' => $products
        ];

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

    public function product_detail(){
        return view('product_detail');
    }
}


