<?= view('templates/header'); ?>
<?= view('templates/slider'); ?>

<hr>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục sản phẩm</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
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

                        <!-- <div class="price-range"><
                                <h2>Price Range</h2>
                                <div class="well text-center">
                                    <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
                                    <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                                </div>
                            </div> -->

                        <div class="shipping text-center">
                            <!--shipping-->
                            <img src="/assets/user/images/home/shipping.jpg" alt=""/>
                        </div>
                        <!--/shipping-->

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <!-- Assuming $products is an array of products passed from the controller -->


                        <h2 class="title text-center">SẢN PHẨM NỔI BẬT</h2>

                        <div class="row">
                            <?php foreach ($cateObj as $product) : ?>
                                <!-- Chỉ hiển thị sản phẩm có điều kiện == 1 -->
                                <?php if ($product['status_product'] == 1) : ?>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="uploads/<?php echo $product['images']; ?>" alt="images">
                                                    <h2><?= ($product['name']) ?></h2>
                                                    <p>Giá: <?= ($product['price']) . ' ' . 'VND' ?></p>
                                                    <p>Số lượng: <?= ($product['amount']) ?></p>
                                                    <p>Danh mục: <?= ($product['category']) ?></p>
                                                    <form class="btn btn-default add-to-cart" action="" method="post">
                                                        <i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="choose">
                                                <ul class="nav nav-pills nav-justified">
                                                    <li><a href="#"><i class="fa fa-plus-square"></i>Thêm vào sở
                                                            thích</a></li>
                                                    <li>
                                                        <a href="<?= base_url('product/product_detail/' . $product['id_product']) ?>"><i
                                                                    class="fa fa-plus-square"></i>Chi tiết sản phẩm</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

    </section>

<?= view('templates/footer'); ?>