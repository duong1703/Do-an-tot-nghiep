<?php include 'templates/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
<<<<<<< HEAD
                <div class="left-sidebar">
                    <h2>Danh mục sản phẩm</h2>
                    <?= view('category') ?>
                    <!--/price-range-->

                </div>
=======
                <!-- Danh sách các danh mục sản phẩm -->
                <h2>Danh mục sản phẩm</h2>
                <ul class="list-group">
                    <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $category): ?>
                            <li class="list-group-item"><a href="<?= base_url('product/' . $category) ?>"><?= $category ?></a></li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="list-group-item">Không có danh mục sản phẩm.</li>
                    <?php endif; ?>
                </ul>
>>>>>>> 791d07eabf8f1c010d75ff3ce06bb55c9d9fabe4
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Sản phẩm</h2>
                    <div id="dataContainer" class="row">
<<<<<<< HEAD
                        <?php foreach ($products as $product): ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img id="images" src="uploads/<?php echo $product['images']; ?>" alt="images">
                                            <h2 id="price"><?php echo $product['price']; ?> VND</h2>
                                            <p id="product"><?php echo $product['name']; ?></p>
                                            <p id="category">Danh mục: <?= $product['category'] ?></p>
                                            <a href="javascript:void(0)" onclick="addtocart()" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
=======
                        <?php if (!empty($products)): ?>
                            <?php foreach ($products as $product): ?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img id="images" src="uploads/<?= $product['images']; ?>" alt="images">
                                                <h2 id="price"><?= $product['price']; ?> VND</h2>
                                                <p id="product"><?= $product['name']; ?></p>
                                                <p id="category">Danh mục: <?= $product['category'] ?></p>
                                                <a href="<?= site_url('views/cart/'. $product['id_product']) ?>" onclick="addToCart()" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                            </div>
                                        </div>
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a href="#"><i class="fa fa-plus-square"></i>Thêm vào sở thích</a></li>
                                                <li><a href="<?= base_url('product/product_detail/' . $product['id_product']) ?>"><i class="fa fa-plus-square"></i>Chi tiết sản phẩm</a></li>
                                            </ul>
>>>>>>> 791d07eabf8f1c010d75ff3ce06bb55c9d9fabe4
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Không có sản phẩm nào trong danh mục này.</p>
                        <?php endif; ?>
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

<!-- JavaScript jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    // Hàm để chuyển hướng đến trang hiển thị sản phẩm theo danh mục được chọn
    function viewProducts() {
        var selectedCategory = document.getElementById("categorySelect").value;
        if (selectedCategory) {
            window.location.href = '/product/' + selectedCategory; // Điều hướng đến trang hiển thị sản phẩm theo danh mục
        }
    }
</script>

<?php include 'templates/footer.php'; ?>
