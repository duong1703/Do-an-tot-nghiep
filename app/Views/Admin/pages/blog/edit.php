<form action="<?= base_url('admin/blog/edit/'.@$blog['id_blogs']) ?>" method="post">
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session('success') ?>
        </div>
    <?php endif; ?>
    <div class="form-group">
        <label for="title">Tiêu đề:</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $blog['title'] ?>">
    </div>
    <div class="form-group">
        <label for="content">Nội dung:</label>
        <textarea class="form-control" id="content" name="content"><?= $blog['content'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a style="background-color: red" href="<?= base_url('admin/blog/list') ?>" class="btn btn-secondary">Hủy</a>
</form>
