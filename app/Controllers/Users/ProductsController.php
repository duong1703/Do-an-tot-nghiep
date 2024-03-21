<?php

namespace App\Controllers\Users;
use App\Controllers\BaseController;

use App\Models\ProductModel;
use App\Models\CategoryModel;
class ProductsController extends BaseController
{
    public function index($category)
    {
        

        $product = new ProductModel();
        $categoryModel = new CategoryModel();
        $category = $categoryModel->find($category);
        $products = $product->where('category_id', $category)->findAll();
        $data['products'] = $product->findAll();

        $data = [
            'products' => $product->paginate(10), // Số lượng sản phẩm trên mỗi trang
            'pager' => $product->pager
        ];


        $perPage = 10; // Số lượng sản phẩm trên mỗi trang
        $currentPage = $this->request->getGet('page') ?? 1; // Trang hiện tại, mặc định là trang 1 nếu không có page

        // Tính toán vị trí bắt đầu của sản phẩm trong truy vấn dữ liệu
        $start = ($currentPage - 1) * $perPage;

        // Lấy dữ liệu sản phẩm từ cơ sở dữ liệu với giới hạn số lượng và vị trí bắt đầu
        $products = $this->productModel->findAll($perPage, $start);

        // Tính toán tổng số sản phẩm dựa trên dữ liệu trong cơ sở dữ liệu
        $totalProducts = $this->productModel->countAll();

        // Tính toán tổng số trang dựa trên tổng số sản phẩm và số lượng sản phẩm trên mỗi trang
        $totalPages = ceil($totalProducts / $perPage);
        
        $category = [
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
                        'TAI NGHE ',
                        'LAPTOP',
                        'BALO MÁY TÍNH',
                        'IPAD',
                        'TABLET',
                        'LOA',

        ];

        return view('product', $data , [
            'category' => $category,
            'products' => $products,
            'totalPages' => $totalPages
            ]);

        
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
}
