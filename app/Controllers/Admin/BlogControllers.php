<?php

namespace App\Controllers\Admin;

use App\Common\ResultUtils;
use App\Models\BaseModel;
use App\Controllers\BaseController;
use App\Models\BlogModel;
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

        $data = $this->service->getAllBlogs();
        //dd($data);
        $cssFiles = [
            'http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js',
            base_url() . '/assets/admin/js/datatable.js',
            base_url() . '/assets/admin/js/event.js',

        ];

        $jsFiles = [
            'https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css',
            base_url() . '/assets/admin/css/datatable.css'

        ];
        $dataLayout['blogs']= $data;
        $data = $this->loadMasterLayout($data, 'Danh sách bài viết', 'admin/pages/blog/list', $dataLayout, $cssFiles, $jsFiles);
        return view('admin/main', $data );
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
        $model = new BlogModel();
        $data = [
            'id_blogs'=> $this->request->getPost('id_blogs'),
            'content' => $this->request->getPost('content'),
            // 'created_at' và 'updated_at' được tự động điền nếu $useTimestamps = true
        ];
        
        $model->insert($data);
        session()->setFlashdata('success', 'Thêm bài viết thành công');
        return redirect()->to(base_url('admin/blog/add'));

    }

    public function editOrUpdate($id_blogs)
    {
        $BlogModel = new BlogModel();
        $blogs = $this->service->getBlogsByID($id_blogs);

        if (!$$blogs) {
            return redirect()->to('error/404')->with('error', 'Không tìm thấy bài viết với ID: ' . $id_blogs);
        }
        if ($this->request->getMethod() === 'post') {
            // Xử lý biểu mẫu khi người dùng gửi để cập nhật thông tin sản phẩm
            $updatedData = [
                'id_blogs' => $this->request->getPost('id_blogs'),
                'content' => $this->request->getPost('content'),
                'create_at' => $this->request->getPost('create_at'),
                'updated_at' => $this->request->getPost('updated_at'),
                'delete_at' => $this->request->getPost('delete_at'),
            ];

            // Cập nhật thông tin bài viết trong cơ sở dữ liệu
            $BlogModel->update($id_blogs, $updatedData);
            // Chuyển hướng đến trang bài viết đã chỉnh sửa hoặc bất kỳ trang nào khác mong muốn
            session()->setFlashdata('success', 'Sửa thành công');
            return redirect()->to('admin/blog/edit/' . $id_blogs);
        }
        // Hiển thị biểu mẫu chỉnh sửa
        $cssFiles = [
            base_url() . '/assets/admin/js/event.js'
        ];
        $dataLayout['blogs'] = $blogs;
        $data = $this->loadMasterLayout([], 'Sửa bài viết', 'admin/pages/blog/edit', $dataLayout, $cssFiles, []);
        return view('admin/main', $data);
    }

    public function delete($id)
    {
        $blogs = $this->service->getBlogsByID($id);
        

        if (!$blogs) {
            return redirect('error/404');
        }

        $result = $this->service->deleteById($id);
        
        return redirect('admin/blog/list')->with($result['massageCode'], $result['messages']);
    }

  

}