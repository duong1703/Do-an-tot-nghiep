<?= view('templates/header'); ?>

<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Tin công nghệ mới nhất</h2>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="blog-post-area" style="padding-bottom: 20px">
                <div class="single-blog-post">
                    <h3 style="color: orange; font-size: 20px"><?= $blogs['title'] ?></h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-user"></i><?= session()->get('name') ?></li>
                                <li><i class="fa fa-clock-o"></i> <?= $blogs['created_at'] ?></li>
                            </ul>
                        </div>
                        <p class="text-center" ><?= $blogs['content'] ?></p>
                        <a  class="btn btn-primary" href="views/blog">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('templates/footer'); ?>
