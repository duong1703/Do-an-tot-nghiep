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

    public function intro()
    {
        return view('intro');
    }

    public function blog()
    {
        $BlogModel = new BlogModel();
        $data['blogs'] = $BlogModel->findAll();
        $data['blogs'] = $BlogModel->paginate(5);
        return view('blog', $data);
    }

    public function blog_single($id_blogs)
    {
        $BlogModel = new BlogModel();
        $data['blogs'] = $BlogModel->find($id_blogs);
        return view('blog_single', $data);
    }

    public function product($category = null)
    {
        $productModel = new ProductModel();
        $data = [];
        if ($category) {
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
        // Kiểm tra xem giỏ hàng đã tồn tại hay chưa
        if (session()->has('cart')) {
            // Lấy thông tin giỏ hàng từ session
            $cart = session()->get('cart');
    
            // Lấy danh sách các ID sản phẩm trong giỏ hàng
            $productIds = array_keys($cart);
    
            // Tạo một instance của model ProductModel
            $productModel = new ProductModel();
    
            // Lấy thông tin sản phẩm từ model ProductModel
            $products = $productModel->whereIn('id_product', $productIds)->findAll();
    
            // Tạo một mảng để lưu thông tin chi tiết của từng sản phẩm trong giỏ hàng
            $cartItems = [];
            


            // Duyệt qua danh sách các sản phẩm và lấy thông tin chi tiết
            foreach ($products as $product) {
                $productId = $product['id_product'];
    
                // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
                if (isset($cart[$productId])) {
                    $quantity = intval($cart[$productId]);
    
                    // Chuyển đổi giá thành số
                    $price = floatval($product['price']);
                    
    
                    // Tính tổng tiền cho từng sản phẩm
                    $total = $price * $quantity;
    
                    // Tạo một mảng chứa thông tin chi tiết của sản phẩm
                    $cartItem = [
                        'product' => $product,
                        'quantity' => $quantity,
                        'total' => $total
                    ];
    
                    // Thêm sản phẩm vào danh sách
                    $cartItems[] = $cartItem;
                }
            }
    
            // Truyền danh sách sản phẩm và giỏ hàng vào view
            return view('cart', ['cartItems' => $cartItems]);
        }
    
        // Nếu giỏ hàng không tồn tại, trả về view giỏ hàng rỗng
        return view('emptycart');
    }
    

    public function addToCart()
    {
        $id_product = $this->request->getPost('id_product');
        $price = $this->request->getPost('price');
        $quantity = $this->request->getPost('quantity');

        // Kiểm tra xem giỏ hàng đã tồn tại hay chưa
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng hay chưa
        if (isset($_SESSION['cart'][$id_product])) {
            // Sản phẩm đã có trong giỏ hàng, cập nhật số lượng
            $_SESSION['cart'][$id_product]['quantity'] += $quantity;
        } else {
            // Sản phẩm chưa có trong giỏ hàng, thêm mới
            $_SESSION['cart'][$id_product] = [
                'id_product' => $id_product,
                'price' => $price,
                'quantity' => $quantity
            ];
        }
       

        // Gán thông báo vào biến flashdata
        session()->setFlashdata('cart_message', 'Sản phẩm đã được thêm vào giỏ hàng.');

        // Chuyển hướng trở lại trang chi tiết sản phẩm
        return redirect()->to('/product/product_detail/' . $id_product);
    }
  
    public function removeFromCart()
    {
        // Kiểm tra xem giỏ hàng đã được tạo trong session chưa
        // Kiểm tra xem có dữ liệu được gửi lên không
        if ($this->request->isAJAX()) {
            // Lấy ID sản phẩm cần xóa từ request
            $productId = $this->request->getPost('product_id');

            // Xóa sản phẩm khỏi session dựa trên ID
            $cartItems = session()->get('cart');
            unset($cartItem['product']['id_product'] );
            session()->set('cart', $cartItems);

            // Trả về JSON để thông báo rằng sản phẩm đã được xóa thành công
            return $this->response->setJSON(['success' => true]);
        }

        // Nếu không phải yêu cầu AJAX, trả về 404
        return $this->response->setStatusCode(404);
    }
    

    public function checkout()
    {
        // if(isset($_POST['COD'])){
        //     echo 'COD';
        // }elseif(isset($_POST['redirect'])){
        //     $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        //     $vnp_Returnurl = "http://localhost:8080/";
        //     $vnp_TmnCode = "R4DYJ8FU";
        //     $vnp_HashSecret = "RLNYRYRCRVFXLXOOMFKKUJKXLJLKUUGW"; 
            
        //     $vnp_TxnRef = 'Thanh toán sản phẩm'; 
        
        //     $vnp_OrderInfo ='Thanh toán';
        //     $vnp_OrderType = 'Thanh toán';
        //     $vnp_Amount = 120000 * 100;
        //     $vnp_Locale = $_POST['language'];
        //     $vnp_BankCode = $_POST['bank_code'];
        //     $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //     // //Add Params of 2.0.1 Version
        //     // $vnp_ExpireDate = $_POST['txtexpire'];
        //     $inputData = array(
        //         "vnp_Version" => "2.1.0",
        //         "vnp_TmnCode" => $vnp_TmnCode,
        //         "vnp_Amount" => $vnp_Amount,
        //         "vnp_Command" => "pay",
        //         "vnp_CreateDate" => date('YmdHis'),
        //         "vnp_CurrCode" => "VND",
        //         "vnp_IpAddr" => $vnp_IpAddr,
        //         "vnp_Locale" => $vnp_Locale,
        //         "vnp_OrderInfo" => $vnp_OrderInfo,
        //         "vnp_OrderType" => $vnp_OrderType,
        //         "vnp_ReturnUrl" => $vnp_Returnurl,
        //         "vnp_TxnRef" => $vnp_TxnRef,
        //         // "vnp_ExpireDate"=>$vnp_ExpireDate,
        //     );
            
        //     if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        //         $inputData['vnp_BankCode'] = $vnp_BankCode;
        //     }
        //     // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        //     //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        //     // }
            
        //     //var_dump($inputData);
        //     ksort($inputData);
        //     $query = "";
        //     $i = 0;
        //     $hashdata = "";
        //     foreach ($inputData as $key => $value) {
        //         if ($i == 1) {
        //             $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        //         } else {
        //             $hashdata .= urlencode($key) . "=" . urlencode($value);
        //             $i = 1;
        //         }
        //         $query .= urlencode($key) . "=" . urlencode($value) . '&';
        //     }
            
        //     $vnp_Url = $vnp_Url . "?" . $query;
        //     if (isset($vnp_HashSecret)) {
        //         $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        //         $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        //     }
        //     $returnData = array('code' => '00'
        //         , 'message' => 'success'
        //         , 'data' => $vnp_Url);
        //         if (isset($_POST['redirect'])) {
        //             header('Location: ' . $vnp_Url);
        //             die();
        //         } else {
        //             echo json_encode($returnData);
        //         }
        //         // vui lòng tham 
        // }
        return view('checkout');
    }

    public function comment_product()
    {

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
            } else {
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

    public function thanks()
    {
        return view('thankspage');
    }

}