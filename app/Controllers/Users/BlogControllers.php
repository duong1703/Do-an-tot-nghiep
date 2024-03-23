<?php


namespace App\Controllers;


use App\Models\BlogModel;

class BlogControllers extends BaseController
{
    public function index($id_blogs)
    {

        // Load model
        $BlogModel = new BlogModel();

        // Lấy danh sách bài viết từ cơ sở dữ liệu
        $data['blogs'] = $BlogModel->findAll($id_blogs);

        // Hiển thị view và truyền dữ liệu bài viết vào view
        return view('blog', $data);
//        $data = [];
//        $BlogModel = new BlogModel();
//        $blogs = $BlogModel->find($id);
//        $blogs = $BlogModel->where('id_blogs', 'title', 'content')->findAll();
//        $data['blogs'] = $blogs->findAll();
//        return view(blog, $data);
    }
}