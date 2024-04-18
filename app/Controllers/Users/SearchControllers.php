<?php

namespace App\Controllers;

use App\Models\ProductModel;

class SearchControllers extends BaseController
{
    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        
        $productModel = new ProductModel();
        $products = $productModel->search($keyword)->findAll();
        
        return view('search_results', ['products' => $products]);
    }
}
