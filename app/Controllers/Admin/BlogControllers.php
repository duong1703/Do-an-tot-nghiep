<?php

namespace App\Controllers\Admin;

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
        $dataLayout['blogs']= $this->service->getAllBlogs();
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
        $result = $this->service->addBlogsInfo($this->request);
        dd($result);
        return redirect()->back()->withInput()->with($result['messageCode'], $result['messages']);
    }

    public function edit($id)
    {

        $BlogModel = new BlogModel();


        $blogs = $this->service->getBlogsByID($id);

        if (!$blogs) {
            return redirect('error/404');
        }

        $cssFiles = [
            base_url() . '/assets/admin/js/event.js'
        ];
        $dataLayout['blogs'] = $BlogModel->find($id);;
        $data = $this->loadMasterLayout([], 'Sửa tài khoản', 'admin/pages/blog/edit', $dataLayout, $cssFiles, []);
        return view('admin/main', $data);
    }

    public function update()
    {
        $BlogModel = new BlogModel();
        $data = [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'created_at' => $this->request->getPost('created_at'),
            'updated_at' => $this->request->getPost('updated_at'),
            'delete_at' => $this->request->getPost('delete_at'),
            // Thêm các trường dữ liệu khác tương ứng với dữ liệu cần cập nhật   
        ];

        $data = [
            'products' =>  $BlogModel ->paginate(10), // Số lượng sản phẩm trên mỗi trang
            'pager' =>  $BlogModel ->pager,
        ];

        $BlogModel ->update($this->request->getPost('id'), $data);
        $result = $this->service->updateBlogsInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'], $result['messages']);
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