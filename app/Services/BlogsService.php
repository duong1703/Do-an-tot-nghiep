<?php

namespace App\Services;
use App\Models\BlogModel;
use App\Models\BaseModel;
use App\Common\ResultUtils;
use Exception;

class BlogsService extends BaseService
{
    private $blogs;
    /**
        Tạo hàm constructor
     */
    function __construct()
    {
        parent::__construct();
        $this->blogs = new BlogModel();
        $this->blogs->protect(false);

        //$this->users->protect(false);
    }

    public function getAllBlogs()
    {
        return $this->blogs->findAll();

    }

    public function getBlogsByID($blogs)
    {
        return $this->blogs->where('id_blogs', $blogs)->first();
    }

    public function addBlogsInfo($requestData)
    {
        // Thực hiện xác thực dữ liệu
        $validate = $this->validateAddBlogs($requestData);
        if ($validate->getErrors()) {
            // Trả về thông báo lỗi nếu có lỗi xác thực
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => $validate->getErrors() // Sử dụng $validate->getErrors() để lấy thông báo lỗi
            ];
        }

        // Lấy dữ liệu từ yêu cầu POST
        $dataSave = $requestData->getPost();
        $file = $requestData->getFile('images');

        // Kiểm tra xem file có hợp lệ và chưa được di chuyển hay không
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $dataSave['images'] = $newName;

            // Di chuyển file vào thư mục 'uploads'
            if (!$file->move('uploads', $newName)) {
                // Trả về thông báo lỗi nếu không thể di chuyển file
                return [
                    'status' => ResultUtils::STATUS_CODE_ERR,
                    'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                    'messages' => ['success' => 'Không thể di chuyển file']
                ];
            }
        } else {
            // Trả về thông báo lỗi nếu file không hợp lệ
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => ['success' => 'File không hợp lệ hoặc đã được di chuyển']
            ];
        }

        try {
            // Thêm bài viết vào cơ sở dữ liệu
            $this->blogs->insert($dataSave);

            // Trả về thông báo thành công nếu không có lỗi
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'messageCode' => ResultUtils::MESSAGE_CODE_OK,
                'messages' => ['success' => 'Thêm bài viết thành công']
            ];
        } catch (Exception $e) {
            // Trả về thông báo lỗi nếu có lỗi khi thêm bài viết
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => ['success' => $e->getMessage()]
            ];
        }
    }

    public function validateAddBlogs($requestData)
    {
        $rule = [
            'id' => 'max_length[255]',
            'title' => 'max_length[255]',
            'content' => 'max_length[200]',
            'created_at' => 'max_length[255]',
            'updated_at' => 'max_length[255]',
            'deleted_at' => 'max_length[255]',
           

        ];
        $message = [
            'title' => [
                'max_length' => 'Tiêu đề quá dài, vui lòng nhập {param} ký tự.',
            ],

            'content' => [
                'max_length' => 'Nội dung quá dài, vui lòng nhập {param} ký tự.',
            ],

            'created_at' => [
                'max_length' => 'Ngày tạo sai, vui lòng nhập {param} ký tự.',
            ],

            'updated_at' => [
                'max_length' => 'Ngày cập nhật sai, vui lòng nhập {param} ký tự.',
            ],

            'deleted_at' => [
                'max_length' => 'Ngày xóa lỗi, vui lòng nhập {param} ký tự.',
            ],
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withrequest($requestData)->run();

        return $this->validation;
    }

    public function deleteById($id)
    {
        try {
            $this->blogs->delete($id);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'massageCode' => ResultUtils::MESSAGE_CODE_OK,
                'messages' => ['success' => 'Xóa bài viết thành công']
            ];
        } catch (Exception $e) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => ['error' => $e->getMessage()]
            ];
        }
    }

    public function updateBlogsInfo($requestData)
    {

        $validate = $this->validateEditBlogs($requestData);

        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => $validate->getError()
            ];
        }
    }

    public function validateEditBlogs($requestData)
    {
        $rule = [
            'id' => [
                'rules' => 'is_unique[products.id,id,' . $$this->request->getPost('id') . ']',
                'errors' => [
                    'is_unique' => 'ID must be unique'
                ]

            ],
            'title' => 'max_length[255]',
            'content' => 'max_length[255]',
            'created_at' => 'max_length[255]',
            'updated_at' => 'max_length[255]',
            'deleted_at' => 'max_length[255]',

        ];

        $message = [
            'title' => [
                'max_length' => 'Tiêu đề quá dài, vui lòng nhập {param} ký tự.',
            ],

            'content' => [
                'max_length' => 'Nội dung quá dài, vui lòng nhập {param} ký tự.',
            ],

            'created_at' => [
                'max_length' => 'Ngày tạo sai, vui lòng nhập {param} ký tự.',
            ],

            'updated_at' => [
                'max_length' => 'Ngày cập nhật sai, vui lòng nhập {param} ký tự.',
            ],

            'deleted_at' => [
                'max_length' => 'Ngày xóa lỗi, vui lòng nhập {param} ký tự.',
            ],
        ];

        $this->validation->setRules($rule, $message);
        $this->validation->withrequest($requestData)->run();

        return $this->validation;
    }

}