<?php
// Tính toán $totalItems (tổng số bài viết) và $itemsPerPage (số bài viết trên mỗi trang)
$totalItems = 27;
$itemsPerPage = 3;

// Tính toán $totalPages (tổng số trang)
$totalPages = ceil($totalItems / $itemsPerPage);

// Xác định $currentPage (trang hiện tại)
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Mặc định là trang 1 nếu không có tham số truy vấn

// Trong trường hợp $currentPage vượt quá $totalPages, đặt lại $currentPage là trang cuối cùng
if ($currentPage > $totalPages) {
    $currentPage = $totalPages;
}

// Tính toán vị trí bắt đầu của sản phẩm trong truy vấn SQL hoặc từ bất kỳ nguồn dữ liệu nào bạn sử dụng
$start = ($currentPage - 1) * $itemsPerPage;

?>


<?= view('templates/header'); ?>
    <div id="contact-page" class="container">
        <div class="bg">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="title text-center">Tin công nghệ mới nhất</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="blog-post-area" style="padding-bottom: 20px">
                        <div class="single-blog-post">
                            <?php foreach ($blogs as $blog): ?>
                                <h3 style="color: orange"><?= $blog['title'] ?></h3>
                                <div class="post-meta">
                                    <ul>
                                        <li><i class="fa fa-user"></i><?= session()->get('name') ?></li>
                                        <li><i class="fa fa-clock-o"></i> <?= $blog['created_at'] ?></li>
                                    </ul>
                                </div>

                                <?php
                                $maxCharacters = 800; // Số ký tự tối đa muốn hiển thị trước khi cắt
                                $truncatedContent = substr($blog['content'], 0, $maxCharacters); // Cắt nội dung
                                $remainingContent = substr($blog['content'], $maxCharacters); // Phần còn lại của nội dung

                                $isTruncated = strlen($blog['content']) > $maxCharacters; // Kiểm tra xem nội dung đã bị cắt hay không
                                ?>
                                <img src="uploads/<?php echo $blog['images']; ?>" alt="" height="60px" width="60px"
                                     style="margin-top: 20px">
                                <p>
                                <?php echo $isTruncated ? $truncatedContent . '...' : $blog['content']; ?>
                                <?php if ($isTruncated): ?>
                                    <div class="hidden-content"
                                         style="display: none;"><?php echo $remainingContent; ?></div>
                                <?php endif; ?>
                                </p>
                                <a class="btn btn-primary" href="views/blog_single/<?= $blog['id_blogs'] ?>">Xem
                                    thêm</a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <div class="text-center">
                <ul id="pagination" class="pagination">

                </ul>
            </div>
        </div>
    </div>
<!-- CSS Bootstrap -->
<!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">-->

<!-- JavaScript jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- JavaScript Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    // Định nghĩa biến để lấy tổng số trang và số trang hiện tại
    var totalPages = <?php echo $totalPages; ?>;
    var currentPage = <?php echo $currentPage; ?>;

    // Hàm để tạo phân trang sử dụng Bootstrap Pagination
    function createPagination() {
        var pagination = $('#pagination');
        pagination.empty();
        // Tạo nút 'Previous'
        if (currentPage > 1) {
            pagination.append('<li><a href="javascript::void(0)" onclick="changePage(' + (currentPage - 1) + ');">&laquo;</a></li>');
        }
        // Tạo các nút trang
        for (var i = 1; i <= totalPages; i++) {
            pagination.append('<li ' + (i === currentPage ? 'class="active"' : '') + '><a href="javascript::void(0)" onclick="changePage(' + i + ');">' + i + '</a></li>');
        }
        // Tạo nút 'Next'
        if (currentPage < totalPages) {
            pagination.append('<li><a href="javascript::void(0)" onclick="changePage(' + (currentPage + 1) + ');">&raquo;</a></li>');
        }
    }

    // Hàm để thay đổi trang
    function changePage(page) {
        currentPage = page;
        // Thực hiện ajax hoặc chuyển hướng trang web đến trang mới
        window.location.href = 'views/blog/?page=' + page;
        // Hoặc: $.ajax({url: 'your_script.php?page=' + page, success: function(result){ $('#dataContainer').html(result);}});
        // Sau khi thực hiện xong, cập nhật lại phân trang
        createPagination();
    }

    // Khởi tạo phân trang khi trang web được tải
    $(document).ready(function() {
        createPagination();
    });

</script>


<?= view('templates/footer'); ?>



