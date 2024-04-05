<?php
$totalItems = 100; // Giả sử bạn có tổng cộng 100 sản phẩm
// Số sản phẩm trên mỗi trang
$perPage = 12;

// Tính tổng số trang dựa trên số lượng sản phẩm và số sản phẩm trên mỗi trang
$totalPages = ceil(count($products) / $perPage);

// Khai báo biến $currentPage và khởi tạo giá trị mặc định là 1
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
?>

<?php include 'templates/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h2 style="position: relative;" class="title text-center">Danh mục sản phẩm</h2>
                <ul class="list-group">
                    <?php if(isset($categories) && !empty($categories)): ?>
                        <?php foreach ($categories as $category): ?>
                            <li class="list-group-item">
                                <a href="<?= base_url('views/product/' . urlencode($category)) ?>"><?= $category ?></a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="list-group-item">Không có danh mục sản phẩm.</li>
                    <?php endif; ?>
                </ul>

            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Sản phẩm</h2>
                    <div id="dataContainer" class="row">
                        <?php
                        // Tính toán chỉ số bắt đầu của sản phẩm trên trang hiện tại
                        $startIndex = ($currentPage - 1) * $perPage;

                        // Lấy các sản phẩm cho trang hiện tại
                        $currentProducts = array_slice($products, $startIndex, $perPage);

                        if (!empty($currentProducts)): ?>
                            <?php foreach ($currentProducts as $product): ?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <form >
                                                <div class="productinfo text-center">
                                                    <img id="images" src="uploads/<?= $product['images']; ?>" alt="images">
                                                    <h2 id="price"><?= $product['price']; ?> VND</h2>
                                                    <p id="product"><?= $product['name']; ?></p>
                                                    <p>Mã sản phẩm: <?= ($product['id_product']) ?></p>
                                                    <p id="category">Danh mục: <?= $product['category'] ?></p>
                                                    <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                                                </div>
                                            </form>
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
                        <?php else: ?>
                            <p class="text-center">Không có sản phẩm nào trong danh mục này.</p>
                        <?php endif; ?>
                    </div>


                    <!-- Pagination -->
                    <div class="text-center">
                        <ul id="pagination" class="pagination">
                            <?php if ($currentPage > 1): ?>
                                <li class="page-item"><a class="page-link" href="<?= site_url('views/product/' . urlencode($category) . '/' . ($currentPage - 1)) ?>">Previous</a></li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?= $currentPage == $i ? 'active' : '' ?>"><a class="page-link" href="<?= site_url('views/product/' . urlencode($category) . '/' . $i) ?>"><?= $i ?></a></li>
                            <?php endfor; ?>

                            <?php if ($currentPage < $totalPages): ?>
                                <li class="page-item"><a class="page-link" href="<?= site_url('views/product/' . urlencode($category) . '/' . ($currentPage + 1)) ?>">Next</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    // Hàm để chuyển hướng đến trang hiển thị sản phẩm theo danh mục được chọn
    function viewProducts(category) {
        window.location.href = 'views/product/' + category;
    }
</script>

<?php include 'templates/footer.php'; ?>
