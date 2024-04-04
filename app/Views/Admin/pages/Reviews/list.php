<div class="dash-content">
    <h1 class="dash-title">Trang chủ / Đánh giá</h1>
    <script src="public/vendor/toastr/build/toastr.min.js"></script>
    <div class="row">
        <div class="col-lg-12">
            <?= view('messages/message') ?>
            <div class="card easion-card rounded-4">
                <div class="card-header rounded-4">
                    <div class="easion-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="easion-card-title">Danh sách đánh giá</div>
                </div>
                <div class="card-body">
                    <table id="datatable" class="cell-border stripe">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên người dùng</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mội dung</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($comments) && !empty($comment)): ?>
                            <?php foreach ($comment as $index => $comment) : ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= $comment['customer_name']; ?></td>
                                    <td><?= $comment['customer_email']; ?></td>
                                    <td><?= $comment['content']; ?></td>
                                    <td><?= $comment['created_at']; ?></td>
                                    <td><?= $comment['Rating']; ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-danger btn-sm ___js-delete-blog" data-id="<?= @$comment['id'];?>"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>>
                            <?php endforeach ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?= $this->include("Modals/Order/delete") ?>
<script>
    $('.___js-delete-blog').on('click', function () {
        // Lấy dữ liệu từ nút xóa
        const id = $(this).data('id');
        console.log(id);
        // Đặt dữ liệu vào Form xóa
        $('.Order_id_delete').val(id);
        // Gọi Modal xóa
        $('#confirmDeleteOrder').modal('show');
    });
</script>

