<?php

namespace App\Controllers\Users;
use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\CategoryModel;

class ProductsController extends BaseController
{
    public function index($category)
    {
        $data = [];

        // Tạo model và truy vấn các sản phẩm thuộc danh mục được chọn
        $productModel = new ProductModel();
        $products = $productModel->where('category', $category)->findAll();

        // Danh sách các danh mục sản phẩm
        $data['categories'] = [
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

        // Kiểm tra nếu không có sản phẩm nào thuộc danh mục này
        if (empty($products)) {
            // Trả về thông báo lỗi
            return view('category', $data);
        }

        // Truyền danh sách sản phẩm vào view để hiển thị
        $data['products'] = $products;
        // Truyền dữ liệu sang view
        return view('category', $data);
    }

    public function productDetail($id_product)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id_product);
        if (!$product) {
            return false;
        }
        $condition = [
            'deleted_at' => null,
            'id_product' => $id_product
        ];
        $withSelect = 'id_product, name, description, price, images, amount, category';
        $productObj = $productModel->getFirstByConditions($condition, '', $withSelect);
        if (!$productObj) {
            return false;
        }
        $data['productObj'] = $productObj;
        $data['id_product'] = $id_product;
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


    public function countProductsByCategory()
    {
        $ProductModel= new ProductModel();

        // Fetch the counts of products for each category
        $categories = $ProductModel->groupBy('category')->findAll();

        // Loop through each category and get the count of products
        $categoryCounts = [];
        foreach ($categories as $category) {
            $count = $ProductModel->where('category', $category['category'])->countAllResults();
            $categoryCounts[$category['category']] = $count;
        }

        // Pass $categoryCounts array to the view
        return view('category', ['categoryCounts' => $categoryCounts]);
    }
}
