<?= view('templates/header'); ?>

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


                </div>
            </div>

            <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="images/product-details/1.jpg" alt="" />
                                <h3>ZOOM</h3>
                            </div>
                            <div id="similar-product" class="carousel slide" data-ride="carousel">
                                
                                  <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active">
                                          <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                                          <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                          <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                        </div>
                                        <div class="item">
                                          <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                                          <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                          <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                        </div>
                                        <div class="item">
                                          <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                                          <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                          <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                        </div>
                                        
                                    </div>

                                  <!-- Controls -->
                                  <a class="left item-control" href="#similar-product" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                  </a>
                                  <a class="right item-control" href="#similar-product" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                  </a>
                            </div>

                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                <h2>Anne Klein Sleeveless Colorblock Scuba</h2>
                                <p>Web ID: 1089772</p>
                                <img src="images/product-details/rating.png" alt="" />
                                <span>
                                    <span>US $59</span>
                                    <label>Quantity:</label>
                                    <input type="text" value="3" />
                                    <button type="button" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                </span>
                                <p><b>Availability:</b> In Stock</p>
                                <p><b>Condition:</b> New</p>
                                <p><b>Brand:</b> E-SHOPPER</p>
                                <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->
                    
                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li><a href="#details" data-toggle="tab">Chi tiết sản phẩm</a></li>
                                <li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="details" >
                            <?php if (!empty($productObj) && is_array($productObj)) : ?>
                                <?php foreach ($productObj as $key => $value) : ?>
                                <?php if ($key === 'description') : ?>
                                <!-- Hiển thị mô tả sản phẩm -->
                                <p><?= $value ?></p>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            
                            <div class="tab-pane fade" id="companyprofile" >
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery4.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="tag" >
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery4.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade active in" id="reviews" >
                                <div class="col-sm-12">
                                    <ul>
                                        <li><a href=""><i class="fa fa-user"></i></a></li>
                                        <li><a id="realtime-time" href=""><i class="fa fa-clock-o"></i></a></li>
                                        <li><a id="realtime-date" href=""><i class="fa fa-calendar-o"></i></a></li>
                                    </ul>
                                    
                                    <form action="#">
                                        <span>
                                            <input type="text" placeholder="Your Name"/>
                                            <input type="email" placeholder="Email Address"/>
                                        </span>
                                        <textarea name="" ></textarea>
                                        <b>Đánh giá: </b> <img src="images/product-details/rating.png" alt="" />
                                        <button type="button" class="btn btn-default pull-right">
                                            Gửi
                                        </button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div><!--/category-tab-->
                    
                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>
                        
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">	
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend1.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a>			
                        </div>
                    </div><!--/recommended_items-->
                    
                </div>
            </div>
        </div>
    </section>
<?= view('templates/footer'); ?>