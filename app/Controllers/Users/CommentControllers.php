<?php


namespace App\Controllers;


use App\Models\CommentModel;;


class CommentControllers extends BaseController
{

    public function hiscomment()
    {
        // Load model ProductModel
        $CommentModel = new CommentModel();
        // Lấy danh sách sản phẩm từ model
        $data['historycomment'] = $CommentModel->findAll();
        // Load view và truyền dữ liệu sản phẩm vào view
        return view('historycomment', $data);

    } 
}