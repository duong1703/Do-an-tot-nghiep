<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Trang chủ / Bài viết / Chỉnh sửa</h1>
        <div class="row">
            <div class="col-xl-12">
                <?= view('messages/message') ?>
                <div class="card easion-card">
                    <div class="card-header">
                        <div class="easion-card-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="easion-card-title"> Thông tin bài viết </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/blog/edit/'.@$blogs['id_blogs']) ?>" method="post">
                            <?php if (session()->has('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session('success') ?>
                            </div>
                            <?php endif; ?>
                            <div class="form-row">
                                <form action="admin/blog/edit" enctype="multipart/form-data" method="post">
                                    <textarea  id="title" name="content"></textarea>
                                </form>
                                <div class="form-group col-md-6">
                                    <label for="status_blogs">Trạng thái bài viết</label>
                                    <select name="status_blogs" class="form-control" required>
                                        <option value="0"
                                            <?php echo ($blogs['status_blogs'] == 0) ? 'selected' : ''; ?>>Ẩn bài viết
                                        </option>
                                        <option value="1"
                                            <?php echo ($blogs['status_blogs'] == 1) ? 'selected' : ''; ?>>Hiển thị bài
                                            viết</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <button id="btn-reset-edit-product" type="reset" class="btn btn-secondary"
                                onclick="return confirm('Are you sure you want to reset?')">Reset</button>
                            <a style="background-color: red" href="<?= base_url('admin/blog/list') ?>"
                                class="btn btn-secondary">Hủy</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>