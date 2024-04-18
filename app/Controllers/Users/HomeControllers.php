<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\CartModel;
use App\Models\CommentModel;
use App\Models\ProductModel;
use App\Models\BlogModel;
use App\Models\CategoryModel;
use App\Models\ReviewsModel;
use App\Models\UserModel;
use App\Models\CustomerModel;
use CodeIgniter\Database\RawSql;

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

    public function login() 
    {
        // Kiểm tra nếu đã đăng nhập và là người dùng, chuyển hướng đến trang chính
        if (session()->has('logged_in') && session()->has('customer_id')) {
            return redirect()->to('/');
        }
        // Kiểm tra nếu có dữ liệu được gửi từ form đăng nhập
        if ($this->request->getMethod() === 'post') {
            // Lấy email và mật khẩu từ form đăng nhập
            $email = $this->request->getPost('customer_email');
            $password = $this->request->getPost('customer_password');

            // Kiểm tra xác thực đăng nhập
            $customerModel = new CustomerModel();
            $customer = $customerModel->where('customer_email', $email)->first();
            if ($customer && password_verify($password, $customer['customer_password'])) {
                // Đăng nhập thành công, lưu thông tin người dùng vào session và chuyển hướng đến trang chính
                session()->set('logged_in', true);
                session()->set('customer_id', $customer['customer_id']);
                session()->set('customer_name', $customer['customer_name']);
                session()->set('customer_email', $customer['customer_email']);
                session()->set('created_at', $customer['created_at']);
                return redirect()->to('/');
            } else {
                // Đăng nhập không thành công, hiển thị thông báo lỗi
                $error = 'Email hoặc mật khẩu không chính xác';
                session()->setFlashdata('error', $error);
                $data['error'] = 'Email hoặc mật khẩu không chính xác.';
                return view('login', $data);
            }
        }
        return view('login');
    }

    public function register()
    {
        if ($this->request->getMethod() === 'post') {
            $email = $this->request->getPost('customer_email');
            $password = $this->request->getPost('customer_password');
            $nameCustomer = $this->request->getPost('customer_name');
            $confirmPassword = $this->request->getPost('confirm_password');
            $email = strtolower($email);
            $rules = [
                'customer_email' => 'required|valid_email',
                'customer_password' => 'required|min_length[8]',
                'confirm_password' => 'matches[customer_password]'
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                $error = 'Thông tin đăng ký không đúng, vui lòng thử lại';
                session()->setFlashdata('error', $error);
                return view('register', $data);
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $customerModel = new CustomerModel();
                $data = [
                    'customer_email' => $email,
                    'customer_password' => $hashedPassword,
                    'customer_name' => $nameCustomer,
                ];
                $customerModel->insert($data);
                return redirect()->to('login');
            }
        }
        return view('register');
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }


    public function contact()
    {
        return view('contact');
    }

    public function intro(){
        return view('intro');
    }

    public function blog()
    {
        $BlogModel = new BlogModel();
        $data['blogs'] = $BlogModel->findAll();
        $data['blogs'] = $BlogModel->paginate(5);
        return view('blog', $data);
    }

    public function blog_single($id_blogs){
        $BlogModel = new BlogModel();
        $data['blogs'] = $BlogModel->find($id_blogs);
        return view('blog_single', $data);
    }

    public function product($category = null){
        $productModel = new ProductModel();
        $data = [];
        if($category){
            // Nếu có danh mục được chọn, lọc sản phẩm theo danh mục
            $data['products'] = $productModel->where('category', $category)->paginate(12);
            
        } else {
            // Nếu không có danh mục được chọn, hiển thị tất cả sản phẩm
            $data['products'] = $productModel->paginate(12);
        }
        // Khởi tạo đối tượng Pager và truyền vào view
        $pager = $productModel->pager;
        $data['pager'] = $pager;
        // Danh sách các danh mục cố định
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
            'LOA'
        ];
        
        return view('product', $data);
    }

    public function product_detail($category = null)
    {
        return view('product_detail');
    }

    public function cart()
    {
        return view('cart');
    }

    public function addtocart()
    {
        return view('cart');
    }

    public function comment_product(){
      
        if ($this->request->getMethod() === 'post') {
            $customer_email = $this->request->getPost('customer_email');
            $customer_name = $this->request->getPost('customer_name');
            $content = $this->request->getPost('content');
            $rating = $this->request->getPost('rating');

            $rules = [
                'customer_email' => 'required|valid_email',
                'customer_name' => 'required',
        
            ];
            
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                $error = 'Gui danh gia that bai, vui long thu lai';
                session()->setFlashdata('error', $error);
                return view('comment_product', $data);
            }else {
                $CommentModel = new CommentModel();
                $data = [
                    'customer_email' => $customer_email,
                    'customer_name' => $customer_name,
                    'content' => $content,
                    'rating' => $rating,
                ];
                $CommentModel->insert($data);
                $success = 'Danh gia thanh cong';
                session()->setFlashdata('success', $success);
                return redirect()->to('/');
            }

        }
    }
    public function viewProductReviews($id_product)
    {
        $CommentModel = new CommentModel();
        $data['comment_product'] = $CommentModel->getCommentByProductId($id_product);
        return view('comment_product', $data);
    }



    public function profile()
    {
        // Create a new instance of the CustomerModel
        $customerModel = new CustomerModel();

        // Get the customer_id from the session
        $customer_id = session()->get('customer_id');

        // Retrieve the customer record from the database based on the customer_id
        $customer = $customerModel->find($customer_id);

        // If the customer is not found, handle the case here
        if (!$customer) {
            // For example, you might redirect to an error page or return an error message
            return redirect()->route('error')->with('error', 'Customer not found!');
        }

        // Pass the customer data to the view
        return view('profile', ['customer' => $customer]);
    }


    public function search()
    {
        $keyword = $this->request->getVar('keyword');
        
        $productModel = new ProductModel();
        $products = $productModel->search($keyword)->findAll();
        
        return view('product', ['products' => $products]);
    }

}