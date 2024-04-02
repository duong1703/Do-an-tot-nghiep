<?php

namespace App\Controllers\Users;
use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class ProductsController extends BaseController
{
    public function index($category = null)
    {
        $data = [];

        // Danh sách các danh mục sản phẩm
        $categories = [
            'MÀN HÌNH',
            'THÙNG MÁY',
            'CHIP',
            'RAM',
            'SSD',
            'HDD',
            'CARD ĐỒ HỌA',
            'CHUỘT',
            'BÀN PHÍM',
            'BÀN, GHẾ GAMING',
            'QUẠT TẢN NHIỆT',
            'TAI NGHE',
            'LAPTOP',
            'BALO MÁY TÍNH',
            'IPAD',
            'TABLET',
            'LOA',
        ];

        // In ra dữ liệu của mảng $categories
        print_r($categories);
        die("!@142");
        // Truyền danh sách danh mục vào view để hiển thị trong thanh điều hướng
        $data['categories'] = $categories;
        // Tạo model và truy vấn các sản phẩm thuộc danh mục được chọn (nếu có)
        $productModel = new ProductModel();
        if ($category) {
            $products = $productModel->where('category', $category)->findAll();
        } else {
            // Nếu không có danh mục được chọn, truy vấn tất cả sản phẩm
            $products = $productModel->findAll();
        }

        // Truyền danh sách sản phẩm vào view để hiển thị
        $data['products'] = $products;

        return view('product', $data);
    }


    public function productDetail($productId)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($productId);
        if (!$product) {
            return false;
        }
        $condition = [
            'deleted_at' => null,
            'id_product' => $productId
        ];
        $withSelect = 'name, description, price, images, amount, category';
        $productObj = $productModel->getFirstByConditions($condition, '', $withSelect);
        if (!$productObj) {
            return false;
        }
        $data['productObj'] = $productObj;
        $data['productId'] = $productId;
        return view('product_detail', $data);
    }

    public function products()
    {
        // Load model ProductModel
        $productModel = new ProductModel();

        // Lấy danh sách sản phẩm từ model
        $data['products'] = $productModel->getAllProducts();

        // Load view và truyền dữ liệu sản phẩm vào view
        return view('products', $data);
        
    }

    public function category($category)
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel->getProductsByCategory($category);

        return view('category', $data);
    }

    public function search()
    {
        // Lấy từ khóa tìm kiếm từ URL
        $keyword = $this->request->getGet('keyword');

        // Tạo một đối tượng Model
        $productModel = new ProductModel();

        // Tìm kiếm sản phẩm với từ khóa
        $products = $productModel->like('name', $keyword)->findAll();

        // Truyền dữ liệu sản phẩm tìm được vào view để hiển thị
        //return view('admin/product/list', ['products' => $products]);
    }


}
