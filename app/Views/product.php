<?php include 'templates/header.php'; ?>
<?php
// Tính toán $totalItems (tổng số sản phẩm) và $itemsPerPage (số sản phẩm trên mỗi trang)
$totalItems = 100; // Giả sử bạn có tổng cộng 100 sản phẩm
$itemsPerPage = 10; // Số lượng sản phẩm bạn muốn hiển thị trên mỗi trang

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
<!--<section id="advertisement">-->
<!--    <div class="container">-->
<!--        <img src="images/shop/advertisement.jpg" alt="" />-->
<!--    </div>-->
<!--</section>-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh mục sản phẩm</h2>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#PC">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Máy tính để bàn
                                    </a>
                                </h4>
                            </div>
                            <div id="PC" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="#">Màn hình </a></li>
                                        <li><a href="#">Thùng máy </a></li>
                                        <li><a href="#">Chip</a></li>
                                        <li><a href="#">Ram, SSD </a></li>
                                        <li><a href="#">Card đồ họa </a></li>
                                        <li><a href="#">Chuột, Bàn phím</a></li>
                                        <li><a href="#">Bàn, ghế Gaming </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#Laptop">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Máy tính xách tay
                                    </a>
                                </h4>
                            </div>
                            <div id="Laptop" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="#">Quạt tản nhiệt </a></li>
                                        <li><a href="#">Ram, SSD Laptop </a></li>
                                        <li><a href="#">Chuột, Bàn phím Laptop</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#Audio">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Tai nghe
                                    </a>
                                </h4>
                            </div>
                            <div id="Audio" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="#">Tai nghe ASUS</a></li>
                                        <li><a href="#">Tai nghe Razer</a></li>
                                        <li><a href="#">Tai nghe Apple</a></li>
                                        <li><a href="#">Tai nghe Harmar Kadon</a></li>
                                        <li><a href="#">Tai nghe Havit</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Máy tính laptop ASUS</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Máy tính laptop ACER</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Máy tính laptop RAZER</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Máy tính laptop MSI</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Máy tính MACBOOK</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Máy tính laptop DELL</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Máy tính đồng bộ</a></h4>
                            </div>
                        </div>
                    </div>
                    <!--/category-products-->

                    <div class="price-range">
                        <!--price-range-->
                        <h2>Lọc giá</h2>
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="80"
                                data-slider-step="5" data-slider-value="[0,80]" id="sl2"><br />
                            <b>0 VND</b> <b class="pull-right">80.000.000 VND</b>
                        </div>
                    </div>
                    <!--/price-range-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Sản phẩm</h2>
                    <div id="dataContainer" class="row">
                        <?php foreach ($products as $product): ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <p><?php echo $product['name']; ?></p>
                                            <img src="uploads/<?php echo $product['images']; ?>" alt="images">
                                            <h2><?php echo $product['price']; ?> VND</h2>
                                            <p><?php echo $product['name']; ?></p>
                                            <p>Danh mục: <?= $product['category'] ?></p>
<!--                                            <a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>-->
                                            <button class="btn btn-default add-to-cart" onclick="addToCart(<?php echo $product['name']; ?>)">Thêm vào giỏ hàng</button>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Thêm vào sở thích</a></li>
                                            <li><a href="<?= base_url('product_detail/' . $product['id_product']) ?>"><i class="fa fa-plus-square"></i>Chi tiết sản phẩm</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Pagination -->
                    <div class="text-center">
                        <ul id="pagination" class="pagination"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
        window.location.href = 'views/product/?page=' + page;
        // Hoặc: $.ajax({url: 'your_script.php?page=' + page, success: function(result){ $('#dataContainer').html(result);}});
        // Sau khi thực hiện xong, cập nhật lại phân trang
        createPagination();
    }

    // Khởi tạo phân trang khi trang web được tải
    $(document).ready(function() {
        createPagination();
    });
</script>


<?php include 'templates/footer.php'; ?>



