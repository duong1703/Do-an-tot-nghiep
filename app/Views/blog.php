<?= view('templates/header');?>
<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Tin công nghệ mới nhất</h2>
            </div>
        </div>
        <?php if (!empty($blogs)) : ?>
            <ul>
                <?php foreach ($blogs as $blog) : ?>
                    <li>
                        <h2><?= $blog['title']; ?></h2>
                        <p><?= $blog['content']; ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>Không có bài viết nào.</p>
        <?php endif; ?>
    </div>
</div>
<?= view('templates/footer');?>