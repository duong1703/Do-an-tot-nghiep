
<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Trang chủ / Bài viết / Chỉnh sửa</h1>
        <div class="row">
            <div class="col-xl-12">
                <?= view('messages/message') ?>
                <div class="card easion-card rounded-4">
                    <div class="card-header rounded-4" >
                        <div class="easion-card-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="easion-card-title"> Thông tin bài viết </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/blog/edit/'.@$blog['id_blogs']) ?>" method="post">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                            <?php if (session()->has('success')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session('success') ?>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="title">Tiêu đề:</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?= $blog['title'] ?>">
                            </div>
                            <div style="padding-top: 20px" >
                                <label for="images">Ảnh bài viết</label>
                                <input name="images" type="file" accept="image/*" class="form-control-file" id="images"
                                       required>
                                <div class="form-group">
                                    <img id="img-show" src="" class="img-fluid" alt="Hình đại diện." style="display: none; height: 100px; width: 100px;;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content">Nội dung:</label>
                                <textarea class="form-control" id="content" name="content"><?= $blog['content'] ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-success rounded-4">Cập nhật</button>
                            <a style="background-color: red" href="<?= base_url('admin/blog/list') ?>" class="btn btn-secondary rounded-4">Hủy</a>
                            <button id="btn-reset-edit-product" type="reset" class="btn btn-secondary rounded-4"
                                onclick="return confirm('Are you sure you want to reset?')">Reset</button>
                            <a style="background-color: yellow" href="<?= base_url('admin/blog/list') ?>" class="btn btn-warning rounded-4">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/hbozepm8v83oquejurp97p1x4p1eymqxvifr4r4izmvfi34i/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

<!-- Place the following <script> tag in your HTML's <body> -->
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [{
            value: 'First.Name',
            title: 'First Name'
        },
            {
                value: 'Email',
                title: 'Email'
            },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
            "See docs to implement AI Assistant")),
    });
</script>

<!-- JavaScript for file input preview -->
<script>
    document.getElementById('images').addEventListener('change', function (event) {
        var input = event.target;
        var img = document.getElementById('img-show');
        img.style.display = 'block';

        var reader = new FileReader();
        reader.onload = function () {
            img.src = reader.result;
        };

        reader.readAsDataURL(input.files[0]);
    });
</script>
