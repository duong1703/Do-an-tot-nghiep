<?= view('templates/header'); ?>
    <div id="contact-page" class="container">
        <div class="bg">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="title text-center">Tin công nghệ mới nhất</h2>
                </div>
            </div>

            <?php foreach ($blogs as $blog): ?>
                <!-- Hiển thị thông tin của từng bài viết -->
                <h2><?php echo $blog['title']; ?></h2>
                <p><?php echo $blog['content']; ?></p>
            <?php endforeach; ?>
        </div>
    </div>
<?= view('templates/footer'); ?>