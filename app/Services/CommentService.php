<?php

namespace App\Services;

use App\Common\ResultUtils;
use App\Models\CommentModel;
use Exception;

class CommentService extends BaseService{
    private $comment;
    /**
     * Tạo hàm constructor
     */
    function __construct()
    {
        parent::__construct();
        $this->comment = new CommentModel();
        $this->comment->protect(false);
    }

    public function getAllComment()
    {
        return $this->comment->findAll();
    }

    
    public function getCommentByID($id_comment)
    {

        //return $this->product->where('id_product', $id_Product)->first();

        return $this->comment->where('id_comment', $id_comment)->first();

    }

    public function deleteById($id_comment)
    {
        try {
            $this->comment->delete($id_comment);
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

}