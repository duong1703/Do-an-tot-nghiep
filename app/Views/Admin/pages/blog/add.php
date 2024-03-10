<div class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Trang chủ / Bài viết / Thêm</h1>
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
                    <div class="card-body ">
                        <form action="admin/blog/create" method="post">
                            <!-- Place the first <script> tag in your HTML's <head> -->
                            <script
                                src="https://cdn.tiny.cloud/1/hbozepm8v83oquejurp97p1x4p1eymqxvifr4r4izmvfi34i/tinymce/6/tinymce.min.js"
                                referrerpolicy="origin"></script>

                            <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
                            <script>
                            tinymce.init({
                                selector: 'textarea',
                                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
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
                            <textarea>Welcome to TinyMCE!</textarea>
                            <button type="submit" class="btn btn-success mt-4 ">Đăng bài</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>