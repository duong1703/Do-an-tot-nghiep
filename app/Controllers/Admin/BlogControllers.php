<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogModel;
use App\Models\ProductModel;
use App\Services\BlogsService;
use Exception;

class BlogControllers extends BaseController
{  
     /**
        @var Service
     */
    private $service;
    public function __construct()
    {
        $this->service = new BlogsService();
    }

    public function list(): string
    {
        $data = [];
        $cssFiles = [
            'http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js',
            base_url() . '/assets/admin/js/datatable.js',
            base_url() . '/assets/admin/js/event.js',
        ];

        $jsFiles = [
            'https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css',
            base_url() . '/assets/admin/css/datatable.css'
        ];
        $blogModel = new BlogModel();
        $blogs = $blogModel->findAll();
        if (!empty($blogs)) {
            $dataLayout['blogs'] = $blogs;
            $data = $this->loadMasterLayout($data, 'Danh sách bài viết', 'admin/pages/blog/list', $dataLayout, $cssFiles, $jsFiles);

            return view('admin/main', $data);
        } else {
            return 'No data found';
        }
    }
    public function add(){
        $data = []; 
        $blogs = new BlogModel();
        $data['blogs'] = $blogs->findAll();
        $data = $this->loadMasterLayout($data, 'Thêm bài viết', 'admin/pages/blog/add');
        return view('admin/main', $data);
    }

    public function create()
    {
        // Check if the form is submitted
        if ($this->request->getMethod() === 'post') {
            // Get the form input
            $content = $this->request->getPost('content');
            $title = $this->request->getPost('title');
            $data = [
                'content' => $content,
                'title' => $title,
                // Add other fields here if needed
            ];
            $blogModel = new BlogModel();
            $newBlogID = $blogModel->save($data);
            session()->setFlashdata('msg_success', 'Thành công');
            return redirect()->to('admin/blog/list');
        }
        return view('admin/blog/create');
    }


    public function editOrUpdate($id)
    {
        $blogModel = new BlogModel();
        $product = $this->service->getBlogsByID($id);

        if (!$product) {
            return redirect()->to('error/404')->with('error', 'Không tìm thấy sản phẩm với ID: ' . $id);
        }
        if ($this->request->getMethod() === 'post') {
            // Xử lý biểu mẫu khi người dùng gửi để cập nhật thông tin sản phẩm
            $updatedData = [
                'content' => $this->request->getPost('content'),
                'title' => $this->request->getPost('title'),

            ];
            // Cập nhật thông tin sản phẩm trong cơ sở dữ liệu
            $blogModel->update($id, $updatedData);
            // Chuyển hướng đến trang sản phẩm đã chỉnh sửa hoặc bất kỳ trang nào khác mong muốn
            session()->setFlashdata('success', 'Sửa thành công');
            return redirect()->to('admin/blog/edit/' . $id);
        }
        // Hiển thị biểu mẫu chỉnh sửa
        $cssFiles = [
            base_url() . '/assets/admin/js/event.js'
        ];
        $dataLayout['blog'] = $product;
        $data = $this->loadMasterLayout([], 'Sửa tài khoản', 'admin/pages/blog/edit', $dataLayout, $cssFiles, []);
        return view('admin/main', $data);
    }



    public function delete($id)
    {
        $blogs = $this->service->getBlogsByID($id);


        if (!$blogs) {
            return redirect('error/404');
        }

        $result = $this->service->deleteBlogs($id);
        return redirect('admin/blog/list')->with($result['massageCode'], $result['messages']);
    }

}