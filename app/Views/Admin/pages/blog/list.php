<div class="dash-content">
    <h1 class="dash-title">Trang chủ /Bài viết</h1>
    <script src="public/vendor/toastr/build/toastr.min.js"></script>
    <div class="row">
        <div class="col-lg-12">
            <?= view('messages/message') ?>
            <div class="card easion-card">
                <div class="card-header">
                    <div class="easion-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="easion-card-title">Danh sách bài viết</div>
                </div>
                <div class="card-body">
                    <table id="datatable" class="cell-border">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($blogs) && !empty($blogs)) : ?>
                            <?php foreach ($blogs as $index => $blog) : ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= $blog['title'] ?></td>
                                    <td><?= $blog['content'] ?></td>
                                    <td><?= $blog['created_at'] ?></td>
                                    <td class="text-center">
                                        <a href="admin/blog/edit/<?= $blog['id_blogs'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger btn-sm ___js-delete-blog" data-id="<?= @$blog['id_blogs'];?>">Xóa</a>
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
<?= $this->include("Modal/User/delete") ?>
<script>
    toastr.clear();
    // Notification for actions
    <?php if(isset($_SESSION['msg_success'])){ ?>
    toastr["success"]("Thành công!", "Thành công!")
    <?php unset($_SESSION['msg_success']);?>
    <?php } ?>

    $('.___js-delete-blog').on('click',function(){
        // get data from button delete
        const id = $(this).data('id');
        // Set data to Form delete
        $('.user_id_delete').val(id);
        // Call Modal delete
        $('#confirmDeleteUser').modal('show');
    });
</script>
