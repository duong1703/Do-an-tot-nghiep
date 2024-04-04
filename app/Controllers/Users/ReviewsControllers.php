<?php


namespace App\Controllers;
use  App\Models\ReviewsModel;


class ReviewsControllers extends BaseController
{
    public function create()
    {
        // Check if the form is submitted
        if ($this->request->getMethod() === 'post') {
            // Get the form input
            $name = $this->request->getPost('customer_name');
            $email = $this->request->getPost('email');
            $content = $this->request->getPost('content');
            $data = [
                'customer_name' => $name,
                'email' => $email,
                'content' => $content,
                // Add other fields here if needed
            ];
            $ReviewsModel = new ReviewsModel();
            $newCommentID = $ReviewsModel->save($data);
            session()->setFlashdata('msg_success', 'Thành công');
            return redirect()->to('views/product_detail');
        }
        return view('index');
    }

}