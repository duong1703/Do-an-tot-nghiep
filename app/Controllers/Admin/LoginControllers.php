<?php

namespace App\Controllers\Admin;

use App\Common\ResultUtils;
use App\Controllers\BaseController;
use App\Services\LoginService;
use App\Models\UserModel;


class LoginControllers extends BaseController
{
    /**
        @var Service
     */
    private $service;

    public function __construct()
    {
        $this->service = new LoginService();
    }


    public function index()
    {
        if(session()->has('user_login')){
            return redirect('admin/login');
        }
        return view('admin/pages/login');
    }

    public function login()
    {
        //$result = $this->service->hasLoginInfo($this->request);
        //if($result["status"] === ResultUtils::STATUS_CODE_OK){
        //    return redirect("admin/home");
        //}elseif($result["status"] === ResultUtils::STATUS_CODE_ERR){
        //    return redirect("admin/login")->with($result['messageCode'], $result['messages']);
        //}
        //return redirect("home")

        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();

        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id'       => $data['id'],
                    'email'     => $data['email'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('admin/pages/home');
            }else{
                $session->setFlashdata('error', 'Password is incorrect.');
                return redirect()->to('login');
            }
        }else{
            $session->setFlashdata('error', 'Email does not exist.');
            return redirect()->to('login');
        }
    }

    public function login_customers()
    {
        //$result = $this->service->hasLoginInfo($this->request);
        //if($result["status"] === ResultUtils::STATUS_CODE_OK){
        //    return redirect("admin/home");
        //}elseif($result["status"] === ResultUtils::STATUS_CODE_ERR){
        //    return redirect("admin/login")->with($result['messageCode'], $result['messages']);
        //}
        //return redirect("home");



        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();

        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id'       => $data['id'],
                    'name'     => $data['name'],
                    'email'     => $data['email'],
                    'password'     => $data['password'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('admin/pages/home');
            }else{
                $session->setFlashdata('error', 'Password is incorrect.');
                return redirect()->to('admin/pages/login');
            }
        }else{
            $session->setFlashdata('error', 'Email does not exist.');
            return redirect()->to('admin/pages/login');
        }
    }


    public function logout()
    {
        // Load the session service
        $session = session();

        // Destroy the session
        $session->destroy();
        // Xóa tất cả dữ liệu phiên
        $this->service->logout();

        // Chuyển hướng người dùng đến trang đăng nhập
        return redirect('login');
    }
}
