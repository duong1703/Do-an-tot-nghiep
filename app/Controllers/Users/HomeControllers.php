<?php

namespace App\Controllers\Users;
use App\Controllers\BaseController; 
use App\Models\ProductModel;
use App\Models\BlogModel;
use App\Models\CategoryModel;
use App\Models\UserModel;
use App\Models\CustomerModel;

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
        // Kiểm tra nếu đã đăng nhập, chuyển hướng người dùng đến trang dashboard hoặc trang chính
        if (session()->has('logged_in') && session()->get('logged_in')) {
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
                return redirect()->to('/');
            } else {
                // Đăng nhập không thành công, hiển thị thông báo lỗi
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
                return redirect()->to('views/login');
            }
        }
        return view('register');
    }



    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
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




