<?php

namespace App\Controllers\Admin;


use App\Controllers\BaseController;
use App\Models\BlogModel;
use App\Services\BlogsService;
use Exception;

class BlogControllers extends BaseController
{
    /**
     * @var Service
     */
    private $service;

    public function __construct()
    {
        $this->service = new BlogsService();
    }

    public function list(): string
    {
        $data = [];
        //$data = $this->service->getAllBlogs();
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

        $BlogModel = new BlogModel();
        $blogs = $BlogModel->findAll();

        $dataLayout = [];
        if ($blogs) {
            foreach ($blogs as &$blog) {
                $blog['content'] = strlen($blog['content']) > 500 ? substr($blog['content'], 0, 199) . '...' : $blog['content'];
            }
            $dataLayout['blogs'] = $blogs;
        }
        $data = $this->loadMasterLayout($data, 'Danh sách bài viết', 'admin/pages/blog/list', $dataLayout, $cssFiles, $jsFiles);
        return view('admin/main', $data);
    }


    public function add()
    {

        $data = [];
        $BlogModel = new BlogModel();
        $data['blogs'] = $BlogModel->findAll();
        $data = $this->loadMasterLayout($data, 'Thêm bài viết', 'admin/pages/blog/add');
        return view('admin/main', $data);
    }

    public function create()
    {
        $BlogModel = new BlogModel();

        // Lấy dữ liệu post
        $blogsObj = $this->request->getPost();

        // Kiểm tra xem đã có tệp ảnh được tải lên hay chưa
        if ($imageFile = $this->request->getFile('images')) {
            // Đường dẫn thư mục lưu trữ ảnh
            $uploadDirectory = FCPATH . 'uploads'; // Thư mục lưu trữ trên máy chủ

            // Tạo tên file duy nhất để tránh trùng lặp
            $newName = $imageFile->getRandomName();

            // Di chuyển ảnh vào thư mục lưu trữ
            if ($imageFile->move($uploadDirectory, $newName)) {
                // Lưu đường dẫn của ảnh vào mảng dữ liệu sản phẩm
                $blogsObj['images'] = $newName; // Chỉ lưu đường dẫn tương đối
            }
        } else {
            // Nếu không có ảnh được tải lên, đặt giá trị của trường ảnh là chuỗi rỗng
            $blogsObj['images'] = '';
        }

        // Thiết lập giá trị cho trường khóa chính
        $blogsObj['id_blogs'] = null;
        $BlogModel->protect(false)->insert($blogsObj); // Loại bỏ bảo vệ trường khóa chính

        // Chuyển hướng người dùng đến trang danh sách sản phẩm sau khi thêm thành công
        return redirect()->to(base_url('admin/blog/list'));
    }


    public function editOrUpdate($id)
    {
        $BlogModel = new BlogModel();
        $blogObj = $this->service->getBlogsByID($id);

        if (!$blogObj) {
            return redirect()->to('error/404')->with('error', 'Không tìm thấy bài viết với ID: ' . $id);
        }
        if ($this->request->getMethod() === 'post') {
            // Xử lý biểu mẫu khi người dùng gửi để cập nhật thông tin sản phẩm
            $updatedData = [
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content'),
                // 'images' => $this->request->getPost('images'),
            ];

            // Cập nhật thông tin sản phẩm trong cơ sở dữ liệu
            $BlogModel->update($id, $updatedData);
            // Chuyển hướng đến trang bài viết đã chỉnh sửa hoặc bất kỳ trang nào khác mong muốn
            session()->setFlashdata('success', 'Sửa bài viết thành công');
            return redirect()->to('admin/blog/edit/' . $id);
        }
        // Hiển thị biểu mẫu chỉnh sửa
        $cssFiles = [
            base_url() . '/assets/admin/js/event.js'
        ];
        $dataLayout['blog'] = $blogObj;
        $data = $this->loadMasterLayout([], 'Sửa sản phẩm', 'admin/pages/blog/edit', $dataLayout, $cssFiles, []);
        return view('admin/main', $data);
    }
    public function delete()
    {

        $blogModel = new BlogModel();
        $ids = $this->request->getPost('id_blogs');

        // Chuyển $ids thành một mảng nếu nó không phải là mảng
        if (!is_array($ids)) {
            $ids = explode(',', $ids); // Phân tách chuỗi thành mảng dựa trên dấu phẩy
        }
        // Kiểm tra xem có id nào được gửi lên không
        if (!empty($ids)) {
            foreach ($ids as $id) {
                // Xóa bài viết với id được chỉ định
                $blogModel->delete($id);
            }
            session()->setFlashdata('msg_success', 'Thành công');
        } else {
            session()->setFlashdata('msg_error', 'Không thành công');
        }

        return redirect()->to(base_url('admin/blog/list'));
    }
}