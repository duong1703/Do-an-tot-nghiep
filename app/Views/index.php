<?= view('templates/header');?>
<?= view('templates/slider');?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục sản phẩm</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
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
                                <h4 class="panel-title"><a href="">Máy tính laptop ASUS</a></h4>
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

                    <!-- <div class="price-range"><
							<h2>Price Range</h2>
							<div class="well text-center">
								<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
								<b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div> -->

                    <div class="shipping text-center">
                        <!--shipping-->
                        <img src="/assets/user/images/home/shipping.jpg" alt="" />
                    </div>
                    <!--/shipping-->

                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                   
                
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                        <!-- Assuming $products is an array of products passed from the controller -->


                        <h2 class="title text-center">SẢN PHẨM NỔI BẬT</h2>

                        <div class="row">
                            <?php foreach ($cateObj as $product) : ?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="uploads/<?php echo $product['images'];?>"  alt="images">
                                                <h2><?= ($product['name']) ?></h2>
                                                <p>Giá: <?= ($product['price']) ?></p>
                                                <p>Số lượng: <?= ($product['amount']) ?></p>
                                                <p>Danh mục: <?= ($product['category']) ?></p>
                                                <a href="views/cart" class="btn btn-default add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng
                                                </a>
                                            </div>
                                        </div>
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a href="#"><i class="fa fa-plus-square"></i>Thêm vào sở thích</a></li>
                                                <li><a href="<?= base_url('product/product_detail/' . $product['id']) ?>"><i class="fa fa-plus-square"></i>Chi tiết sản phẩm</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                </div>
</section>
<?= view('templates/footer');?>