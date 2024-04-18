
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
                        <a href="<?= base_url('views/product/' . urlencode($category)) ?>"><?= $category ?>  </a>
                    </li>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <li class="list-group-item">Không có danh mục sản phẩm.</li>
                    <?php endif; ?>
                </ul>
                <div class="row ">
                    <div class="col-md-12">
                        <label for="minPrice">Giá từ:</label>
                        <input type="number" id="minPrice" class="form-control" min="0" step="10000"><br>
                        
                    </div>
                    <div class="col-md-12">
                        <label for="maxPrice">đến:</label>
                        <input type="number" id="maxPrice" class="form-control" min="0" step="10000">
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary btn-block" onclick="filterProducts()">Lọc</button><br>
                    </div>
                </div>

            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Sản phẩm</h2>
                    <div id="dataContainer" class="row">
                        <?php if (!empty($products)): ?>
                        <?php foreach ($products as $product): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper" id="productList">
                                <a href="product/product_detail/<?= ($product['id_product']) ?>">
                                    <div class="single-products">
                                        <form>
                                            <div class="productinfo text-center">
                                                <img id="images" src="uploads/<?= $product['images']; ?>" alt="images">
                                                <h2 id="price"><?= $product['price']; ?> VND</h2>
                                                <p id="product"><?= $product['name']; ?></p>
                                                <p>Mã sản phẩm: <?= ($product['id_product']) ?></p>
                                                <p id="category">Danh mục: <?= $product['category'] ?></p>
                                                <button type="submit" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                                            </div>
                                        </form>
                                    </div>
                            </div>
                            </a>
                        </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <p class="text-center">Không có sản phẩm nào trong danh mục này.</p>
                        <?php endif; ?>
                    </div>

                    <!-- Hiển thị phân trang -->
                    <div class="col-sm-12">
                        <?php echo $pager->links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- CSS Bootstrap -->
<!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">-->

<!-- JavaScript jQuery -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->

<!-- JavaScript Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
// Hàm để chuyển hướng đến trang hiển thị sản phẩm theo danh mục được chọn
function viewProducts(category) {
    window.location.href = 'views/product/' + category;
}

</script>

<?php include 'templates/footer.php'; ?>