<?php


namespace App\Controllers;


use App\Models\BlogModel;
use App\Services\BlogsService;


class BlogControllers extends BaseController
{

    public function blog()
    {
        // Load model ProductModel
        $BlogModel = new BlogModel();
        // Lấy danh sách sản phẩm từ model
        $data['blogs'] = $BlogModel->paginate(5);
        // Load view và truyền dữ liệu sản phẩm vào view
        return view('blog', $data);

    }

    public function blog_single($id_blogs)
    {
        $BlogModel = new BlogModel();
        $blogs = $BlogModel->find($id_blogs);
        if (!$blogs) {
            return false;
        }
        $condition = [
            'deleted_at' => null,
            'id_blogs' => $id_blogs
        ];
        $withSelect = 'title, content';
        $blogs = $BlogModel->getFirstByConditions($condition, '', $withSelect);
        if (!$blogs) {
            return false;
        }
        $data['blogs'] = $blogs;
        $data['id_blogs'] = $id_blogs;
        return view('blog_single', $data);
    }

}