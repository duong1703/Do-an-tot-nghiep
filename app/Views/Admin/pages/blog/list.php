<div class="dash-content">
    <h1 class="dash-title">Trang chủ /Bài viết</h1>
    <script src="public/vendor/toastr/build/toastr.min.js"></script>
    <div class="row">
        <div class="col-lg-12">

            <div class="card easion-card rounded-4">
                <div class="card-header rounded-4">
                    <div class="easion-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="easion-card-title">Danh sách bài viết</div>
                </div>
                <div class="card-body">
                    <table id="datatable" class="cell-border stripe">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ảnh bài viết</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($blogs) && !empty($blogs)) : ?>
                            <?php foreach ($blogs as $index => $blog) : ?>
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                <?php if (session()->has('success')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session('success') ?>
                                    </div>
                                <?php endif; ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td>
                                        <img src="uploads/<?php echo $blog['images']; ?>" alt="" height="60px" width="60px">
                                    </td>
                                    <td><?= $blog['title'] ?></td>
                                    <?php
                                    $maxCharacters = 200; // Số ký tự tối đa muốn hiển thị trước khi cắt
                                    $truncatedContent = substr($blog['content'], 0, $maxCharacters); // Cắt nội dung
                                    $remainingContent = substr($blog['content'], $maxCharacters); // Phần còn lại của nội dung

                                    $isTruncated = strlen($blog['content']) > $maxCharacters; // Kiểm tra xem nội dung đã bị cắt hay không
                                    ?>
                                    <td><?php echo $isTruncated ? $truncatedContent . '...' : $blog['content']; ?>
                                        <?php if ($isTruncated): ?>
                                            <div class="hidden-content" style="display: none;"><?php echo $remainingContent; ?></div>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $blog['created_at'] ?></td>
                                    <td class="text-center">
                                        <a href="admin/blog/edit/<?= $blog['id_blogs'] ?>" class="btn btn-primary btn-sm ___js-edit-blog"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger btn-sm ___js-delete-blog" data-id="<?= @$blog['id_blogs'];?>"><i class="far fa-trash-alt"></i></a>
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
<?= $this->include("Modals/Blog/delete") ?>
<script>
    $('.___js-delete-blog').on('click',function(){
        // Lấy dữ liệu từ nút xóa
        const id = $(this).data('id');
        console.log(id);
        // Đặt dữ liệu vào Form xóa
        $('.blogs_id_delete').val(id);
        // Gọi Modal xóa
        $('#confirmDeleteBlogs').modal('show');
    });

    $('#datatable').DataTable({
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    var column = this;
                    var title = column.footer().textContent;

                    // Create input element and add event listener
                    $('<input type="text" placeholder="Search ' + title + '" />')
                        .appendTo($(column.footer()).empty())
                        .on('keyup change clear', function () {
                            if (column.search() !== this.value) {
                                column.search(this.value).draw();
                            }
                        });
                });
        }
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".read-more").click(function(e){
            e.preventDefault();
            $(this).hide();
            $(this).siblings('.hidden-content').show();
        });
    });
</script>