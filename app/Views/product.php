<?php include 'templates/header.php'; ?>
<?php
// Tính toán $totalItems (tổng số sản phẩm) và $itemsPerPage (số sản phẩm trên mỗi trang)
$totalItems = 100; // Giả sử bạn có tổng cộng 100 sản phẩm
$itemsPerPage = 12; // Số lượng sản phẩm bạn muốn hiển thị trên mỗi trang

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
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="">MÀN HÌNH</a></h4>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="">THÙNG MÁY</a></h4>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="">CHIP</a></h4>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="">RAM</a></h4>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="">SSD</a></h4>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="">HDD</a></h4>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="">CARD ĐỒ HỌA</a></h4>
                            </div>
                        </div>


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="">CHUỘT</a></h4>
                            </div>
                        </div>


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="">BÀN, GHẾ GAMING</a></h4>
                            </div>
                        </div>


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="">QUẠT TẢN NHIỆT</a></h4>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">TAI NGHE</a></h4>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">TABLET</a></h4>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">BÀN PHÍM</a></h4>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">LAPTOP</a></h4>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">IPAD</a></h4>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">LOA</a></h4>
                            </div>
                        </div>
                    </div>
                    <!--/category-products-->

                    <p>
                        <label for="amount">Lọc giá:</label><input type="text" id="amount" readonly="" style="border:0; color:#f6931f; font-weight:bold;">
                    </p>
                    <div id="slider-range-min"></div>
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
                                            <img id="images" src="uploads/<?php echo $product['images']; ?>" alt="images">
                                            <h2 id="price"><?php echo $product['price']; ?> VND</h2>
                                            <p id="product"><?php echo $product['name']; ?></p>
                                            <p id="category">Danh mục: <?= $product['category'] ?></p>
                                            <a href="<?= site_url('views/cart/'. $product['id_product']) ?>" onclick="addToCart()" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Thêm vào sở thích</a></li>
                                            <li><a href="<?= base_url('product/product_detail/' . $product['id_product']) ?>"><i class="fa fa-plus-square"></i>Chi tiết sản phẩm</a></li>
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

<script>
    function showProducts(minPrice, maxPrice) {
        $("#products li").hide().filter(function() {
            var price = parseInt($(this).data("price"), 10);
            return price >= minPrice && price <= maxPrice;
        }).show();
    }
    $( function() {
        $( "#slider-range-min" ).slider({
            range: "min",
            value: 100,
            min: 1,
            max: 80,
            slide: function( event, ui ) {
                $( "#amount" ).val( "VND" + ui.value );
            }
        });
        $( "#amount" ).val( "VND" + $( "#slider-range-min" ).slider( "value" ) );
    } );
</script>



<?php include 'templates/footer.php'; ?>



