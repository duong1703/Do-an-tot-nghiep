<?= view('templates/header'); ?>
<style>
.centered-image {
    display: block;
    /* Đảm bảo hình ảnh được hiển thị như một khối */
    margin: 0 auto;
    /* Đặt margin top và bottom là 0, margin left và right là auto */
}

swiper-container {
    width: 100%;
    height: 100%;
}

swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
}

swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

swiper-container {
    width: 100%;
    height: 300px;
    margin: 20px auto;
}

.append-buttons {
    text-align: center;
    margin-top: 20px;
}

.append-buttons button {
    display: inline-block;
    cursor: pointer;
    border: 1px solid #007aff;
    color: #007aff;
    text-decoration: none;
    padding: 4px 10px;
    border-radius: 4px;
    margin: 0 10px;
    font-size: 13px;
}
</style>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <a href="views/product" style="font-size: 17px">Quay lại</a>
                <div class="product-details">
                    <!--product-details-->
                    <div class="col-sm-5">
                        <div style="border: 1px solid #F7F7F0">
                            <img src="uploads/<?php echo $productObj['images']; ?>" alt="images" height="300.6px"
                                width="279.29px" class="centered-image">

                        </div>
                    </div>
                    <div class="col-sm-7">
                    <form method="POST" action="<?= base_url('addToCart') ?>" id="addToCartForm">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <div class="product-information">
                            <h2><?= $productObj['name'] ?></h2>
                            <p>Số lượng: <?= $productObj['amount'] ?></p>
                            <p>Mã sản phẩm: <?= $productObj['id_product'] ?></p>
                            <input type="hidden" name="id_product" value="<?= $productObj['id_product'] ?>">
                            <span>
                                <p>Giá: <?= $productObj['price'] . ' ' . 'VND' ?></p>
                                <input type="hidden" name="price" value="<?= $productObj['price'] ?>">
                                <label>Quantity:</label>
                                <input type="number" name="quantity" id="quantity" min="1" value="1" />
                                <button type="submit" class="add-to-cart-btn btn btn-default add-to-cart" onclick="addToCart(<?= $productObj['id_product'] ?>)">Thêm vào giỏ hàng</button>
                            </span>
                            <p>Danh mục: <?= $productObj['category'] ?></p>
                            <a style="margin-top: 30px" href="#"><i class="fa fa-heart"></i> Thêm vào sở thích</a>
                        </div>
                    </form>
                                            

                        <!--/product-information-->
                    </div>
                </div>
                <!--/product-details-->

                <div class="category-tab shop-details-tab">
                    <!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab" class="active">Chi tiết sản phẩm</a></li>
                            <li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
                            <li><a href="#hisreviews" data-toggle="tab">Lịch sử đánh giá sản phẩm</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details" class="active">
                            <?php if (!empty ($productObj) && is_array($productObj)): ?>
                            <?php foreach ($productObj as $key => $value): ?>
                            <?php if ($key === 'description'): ?>
                            <!-- Hiển thị mô tả sản phẩm -->
                            <p><?= $value ?></p>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <div class="tab-pane fade active in" id="reviews">
                            <div class="col-sm-12">
                                <ul>
                                    <li><a><i class="fa fa-user"> <?= session()->get("customer_name") ?></i></a>
                                    </li>
                                    <li><a id="realtime-time"><i class="fa fa-clock-o"></i></a></li>
                                    <li><a id="realtime-date"><i class="fa fa-calendar-o"></i></a></li>
                                </ul>

                                <form action="comment_product" method="post">
                                    <?php if(session()->has("error")): {?>
                                    <div id="error" class="alert alert-danger p-1 text-center" role="alert">
                                        <?= session()->get("error") ?>
                                    </div>
                                    <?php } endif;?>
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                    <span>
                                        <input value="<?php old('customer_name'); ?>" id="customer_name"
                                            name="customer_name" type="text" placeholder="Your Name" required />
                                        <input value="<?php old('customer_email'); ?>" id="customer_email"
                                            name="customer_email" type="email" placeholder="Email Address" required />
                                    </span>
                                    <textarea name="content" id="content"></textarea>

                                    <div class="form-group col-md-6">
                                        <label for="rating">Đánh giá</label>
                                        <select name="rating" class="form-control" required>
                                            <option>Lựa chọn đánh giá</option>
                                            <option>5 sao</option>
                                            <option>4 sao</option>
                                            <option>3 sao</option>
                                            <option>2 sao</option>
                                            <option>1 sao</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-default pull-right">Gửi đánh giá</button>

                                </form>


                            </div>
                        </div>

                        <div class="tab-pane fade" id="hisreviews">
                            <?php echo "OK" ?>
                        </div>

                    </div>
                </div>
                <!--/category-tab-->

                <div class="recommended_items">
                    <!--recommended_items-->
                    <!-- <h2 class="title text-center">Một số sản phẩm khác</h2> -->
                    <!-- 
                    <body>

                        <swiper-container class="mySwiper" slides-per-view="3" centered-slides="true" space-between="30"
                            pagination="true" pagination-type="fraction" navigation="true">
                            <swiper-slide>Slide 1</swiper-slide>
                            <swiper-slide>Slide 2</swiper-slide>
                            <swiper-slide>Slide 3</swiper-slide>
                            <swiper-slide>Slide 4</swiper-slide>
                            <swiper-slide>Slide 5</swiper-slide>
                            <swiper-slide>Slide 6</swiper-slide>
                            <swiper-slide>Slide 7</swiper-slide>
                        </swiper-container>

                        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

                        <script>
                        const swiperEl = document.querySelector('swiper-container');
                        const swiper = swiperEl.swiper;

                        var appendNumber = 4;
                        var prependNumber = 1;
                        document
                            .querySelector(".prepend-2-slides")
                            .addEventListener("click", function(e) {
                                e.preventDefault();
                                swiper.prependSlide([
                                    '<swiper-slide>Slide ' + --prependNumber + "</swiper-slide>",
                                    '<swiper-slide>Slide ' + --prependNumber + "</swiper-slide>",
                                ]);
                            });
                        document
                            .querySelector(".prepend-slide")
                            .addEventListener("click", function(e) {
                                e.preventDefault();
                                swiper.prependSlide(
                                    '<swiper-slide>Slide ' + --prependNumber + "</swiper-slide>"
                                );
                            });
                        document
                            .querySelector(".append-slide")
                            .addEventListener("click", function(e) {
                                e.preventDefault();
                                swiper.appendSlide(
                                    '<swiper-slide>Slide ' + ++appendNumber + "</swiper-slide>"
                                );
                            });
                        document
                            .querySelector(".append-2-slides")
                            .addEventListener("click", function(e) {
                                e.preventDefault();
                                swiper.appendSlide([
                                    '<swiper-slide>Slide ' + ++appendNumber + "</swiper-slide>",
                                    '<swiper-slide>Slide ' + ++appendNumber + "</swiper-slide>",
                                ]);
                            });
                        </script>
                    </body> -->
</section>

<script>
/* date */
function updateDate() {
    var now = new Date();
    var options = {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };
    var formattedDate = now.toLocaleDateString('en-US', options);

    document.getElementById('realtime-date').innerHTML = formattedDate;
}

// Gọi hàm updateDate() mỗi giây để cập nhật ngày
setInterval(updateDate, 1000);

/* date */
function updateTime() {
    var now = new Date();
    var time = now.toLocaleTimeString();

    document.getElementById('realtime-time').innerHTML = time;
}

// Gọi hàm updateTime() mỗi giây để cập nhật thời gian
setInterval(updateTime, 1000);
// cart
$(document).ready(function() {
        $('#addToCartForm').submit(function(e) {
            e.preventDefault();
            
            $.ajax({
                url: '<?php echo site_url('add_to_cart'); ?>',
                type: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        alert('Item added to cart successfully');
                    } else {
                        alert('Failed to add item to cart');
                    }
                }
            });
        });
    });


// Thêm sản phẩm vào giỏ hàng


</script>

<?= view('templates/footer'); ?>