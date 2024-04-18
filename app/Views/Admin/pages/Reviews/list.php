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
                            <th scope="col">ID Sản phẩm</th>
                            <th scope="col">Tên người dùng</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mội dung</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($comment) && !empty($comment)) : ?>
                                <?php foreach ($comment as $index => $comment) : ?>
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />   
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= $comment['id_product'] ?></td>
                                    <td><?= $comment['customer_name'] ?></td>
                                    <td><?= $comment['customer_email'] ?></td>
                                    <td><?= $comment['content'] ?></td>
                                    <td><?= $comment['created_at'] ?></td>
                                    <td><?= $comment['rating'] ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-danger btn-sm ___js-delete-comment" data-id="<?= @$comment['id_comment'];?>">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
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
<?= $this->include("Modals/Comment/delete") ?>
<script>
    $('.___js-delete-comment').on('click', function () {
        // Lấy dữ liệu từ nút xóa
        const id = $(this).data('id');
        console.log(id);
        // Đặt dữ liệu vào Form xóa
        $('.comment_id_delete').val(id);
        // Gọi Modal xóa
        $('#confirmDeleteComment').modal('show');
    });
</script>

