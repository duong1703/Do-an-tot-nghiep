<?= view('templates/header');?>
<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Tin công nghệ mới nhất</h2>
            </div>
        </div>
        <?php if (!empty($blogsObj) && is_array($blogsObj)) : ?>
        <?php foreach ($blogsObj as $key => $value) : ?>
        <div class="view-blogs">
            <?php if ($key === 'content') : ?>
                <td><?= $blogs['content'] ?></td>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<?= view('templates/footer');?>