<?php


namespace App\Controllers\Admin;


use App\Controllers\BaseController;
use App\Models\CommentModel;
use App\Models\ProductModel;
use App\Services\CommentService;
use Exception;

class CommentControllers extends BaseController
{

    /**
     * @var Service
     */
    //private $service;

   
    public function __construct()
    {
        $this->service = new CommentService();
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

        $CommentModel = new CommentModel();
        $comment = $CommentModel->findAll();

        $dataLayout['comment'] = $comment;
        $data = $this->loadMasterLayout($data, 'Danh sách đánh giá', 'admin/pages/reviews/list', $dataLayout, $cssFiles, $jsFiles);
        return view('admin/main', $data);
    }

 public function delete()
    {

        $CommentModel = new CommentModel();
        $ids = $this->request->getPost('id_comment');

        // Chuyển $ids thành một mảng nếu nó không phải là mảng
        if (!is_array($ids)) {
            $ids = explode(',', $ids); // Phân tách chuỗi thành mảng dựa trên dấu phẩy
        }
        // Kiểm tra xem có id nào được gửi lên không
        if (!empty($ids)) {
            foreach ($ids as $id) {
                // Xóa bài viết với id được chỉ định
                $CommentModel->delete($id);
            }
            session()->setFlashdata('msg_success', 'Thành công');
        } else {
            session()->setFlashdata('msg_error', 'Không thành công');
        }

        return redirect()->to(base_url('admin/reviews/list'));
    }
}