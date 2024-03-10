<div class="dash-content">
    <h1 class="dash-title">Trang chủ /Bài viết</h1>
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
                <div class="card-body ">
                    <table id="datatable" class="cell-border">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Ngày cập nhật</th>
                                <th scope="col">Ngày chỉnh sửa</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($blogs) && !empty($blog)) : ?>
                                <?php foreach ($blogs as $blog) : ?>
                                    <tr>
                                        <td><?= $blogs['id'] ?></td>
                                        <td><?= $blogs['title'] ?></td>
                                        <td><?= $blogs['content'] ?></td>
                                        <td><?= $blogs['created_at'] ?></td>
                                        <td><?= $blogs['updated_at'] ?></td>
                                        <td><?= $blogs['deleted_at'] ?></td>
                                        <td class="text-center">
                                            <a href="admin/blog/edit/<?= $blogs['id'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <a data-url="<?= base_url() ?>admin/blog/delete/<?= $blogs['id'] ?>" class="btn btn-danger btn-del-confirm">
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