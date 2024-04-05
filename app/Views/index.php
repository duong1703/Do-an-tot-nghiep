<?= view('templates/header'); ?>
<?= view('templates/slider'); ?>

    <style>

        swiper-container {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        swiper-slide {
            background-position: center;
            background-size: cover;
            width: 300px;
            height: 300px;
        }

        swiper-slide img {
            display: block;
            width: 100%;
        }
    </style>

    <section class="shipping-info" style="text-align: center">
        <div class="container" style="font-size:medium">
            <div class="row" style="padding-top: 30px">
                <!-- Free Shipping -->
                <div class="col-md-3 ">
                    <div class="media-icon">
                        <i class="fa fa-truck" style="color:orange; font-size: 40px"></i>
                    </div>
                    <div class="media-body">
                        <h5>Miễn phí vận chuyển</h5>
                        <span>Cho đơn hàng trên 500k.</span>
                    </div>
                </div>
                <!-- Money Return -->
                <li>
                    <div class="col-md-3">
                        <div class="media-icon">
                            <i class="fa fa-comments-o" style="color:orange; font-size: 40px"></i>
                        </div>
                        <div class="media-body">
                            <h5>Hỗ trợ 24/7</h5>
                            <span>Chat hoặc gọi trực tiếp.</span>
                        </div>
                    </div>
                </li>

                <!-- Support 24/7 -->
                <li>
                    <div class="col-md-3">
                        <div class="media-icon">
                            <i class="fa fa-credit-card" style="color:orange; font-size: 40px"></i>
                        </div>
                        <div class="media-body">
                            <h5>Thanh toán online</h5>
                            <span>Bảo mật an toàn.</span>
                        </div>
                    </div>
                </li>

                <!-- Safe Payment -->
                <div class="col-md-3">
                    <li>
                        <div class="media-icon">
                            <i class="fa fa-refresh" style="color:orange; font-size: 40px"></i>
                        </div>
                        <div class="media-body">
                            <h5>Đổi trả dễ dàng</h5>
                            <span>Thoải mái mua sắm.</span>
                        </div>
                    </li>

                </div>
            </div>
        </div>
    </section>


    <hr>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                   
                </div>

                <div class="col-sm-12">
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
                                                <form action="" method="post">
                                                    <div class="productinfo text-center">
                                                        <img src="uploads/<?php echo $product['images']; ?>"
                                                             alt="images">
                                                        <h2><?= ($product['name']) ?></h2>
                                                        <p>Mã sản phẩm: <?= ($product['id_product']) ?></p>
                                                        <p>Giá: <?= ($product['price']) . ' ' . 'VND' ?></p>
                                                        <p>Số lượng: <?= ($product['amount']) ?></p>
                                                        <p>Danh mục: <?= ($product['category']) ?></p>
                                                        <button type="submit" class="btn btn-default add-to-cart"><i
                                                                    class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng
                                                        </button>
                                                    </div>
                                                </form>
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

    <div id="contact-page" class="container">
        <div class="bg">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="title text-center">Đối tác của chúng tôi</h2>
                </div>
                <swiper-container class="mySwiper" pagination="true" effect="coverflow" grab-cursor="true"
                                  centered-slides="true"
                                  slides-per-view="auto" coverflow-effect-rotate="50" coverflow-effect-stretch="0"
                                  coverflow-effect-depth="100"
                                  coverflow-effect-modifier="1" coverflow-effect-slide-shadows="true">
                    <swiper-slide>
                        <img src="/assets/images/applelogo.png "/>
                    </swiper-slide>
                    <swiper-slide>
                        <img src="/assets/images/asuslogo.png"/>
                    </swiper-slide>
                    <swiper-slide>
                        <img src="/assets/images/NVIDIAlogo.png"/>
                    </swiper-slide>
                    <swiper-slide>
                        <img src="/assets/images/corsairlogo.png"/>
                    </swiper-slide>
                    <swiper-slide>
                        <img src="/assets/images/delllogo.png"/>
                    </swiper-slide>
                    <swiper-slide>
                        <img src="/assets/images/hplogo.png"/>
                    </swiper-slide>
                    <swiper-slide>
                        <img src="/assets/images/intellogo.png"/>
                    </swiper-slide>
                    <swiper-slide>
                        <img src="/assets/images/VIEWSONIClogo.png"/>
                    </swiper-slide>
                    <swiper-slide>
                        <img src="/assets/images/razerlogo.png"/>
                    </swiper-slide>
            </div>

        </div>

    </div>

    <script>
        function addToCart(id_product) {
            $.ajax({
                url: '<?php echo base_url('/cart'); ?>',
                type: 'POST',
                data: {id_product: id_product},
                success: function (response) {
                    // Xử lý phản hồi từ server (nếu cần)
                    alert('Sản phẩm đã được thêm vào giỏ hàng.');
                },
                error: function (xhr, status, error) {
                    // Xử lý lỗi (nếu có)
                    console.error(xhr.responseText);
                }
            });
        }
    </script>

<?= view('templates/footer'); ?>