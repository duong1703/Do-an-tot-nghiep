<?php


namespace App\Controllers;
use  App\Models\ReviewsModel;


class ReviewsControllers extends BaseController
{
    public function sendReviews()
    {
        // Kiểm tra CSRF token và xác thực dữ liệu đầu vào
        $this->validate([
            'name' => 'required',
            'email' => 'required|valid_email',
            'content' => 'required',
            //Thêm quy định cho rating nếu cần
        ]);

        // Lấy dữ liệu từ biểu mẫu
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $content = $this->request->getPost('content');
        // Lưu đánh giá vào cơ sở dữ liệu
        $reviewModel = new ReviewModel();
        $reviewModel->save([
            'name' => $name,
            'email' => $email,
            'content' => $content,
            //Thêm trường rating nếu có
        ]);

        // Gửi phản hồi thành công hoặc redirect đến trang cảm ơn
        //return redirect()->to('/thankyou');
        //hoặc gửi phản hồi thông qua JSON hoặc view
        echo json_encode(['success' => true, 'message' => 'Đánh giá của bạn đã được gửi thành công!']);
    }

}