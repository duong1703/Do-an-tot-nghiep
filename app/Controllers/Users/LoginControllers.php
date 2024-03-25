<?php


namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use Firebase\JWT\JWT;


class LoginControllers extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        helper(['form']);
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ];
        if(!$this->validate($rules)) return $this->fail($this->validator->getErrors());
        $UserModel = new UserModel();
        $user = $UserModel->where("email", $this->request->getVar('email'))->first();
        if(!$user) return $this->failNotFound('Email Not Found');

        $verify = password_verify($this->request->getVar('password'), $user['password']);
        if(!$verify) return $this->fail('Wrong Password');

        $key = getenv('TOKEN_SECRET');
        // Thiết lập "nbf" để token chỉ có thể sử dụng sau 10 phút kể từ thời điểm hiện tại
        $notBefore = time() + (10 * 60); // 10 phút * 60 giây/phút
        $payload = array(
            "iat" => time(),
            "nbf" => $notBefore,
            "uid" => $user['id'],
            "email" => $user['email']
        );

        $token = JWT::encode($payload, $key);

        return $this->respond($token);
    }

}