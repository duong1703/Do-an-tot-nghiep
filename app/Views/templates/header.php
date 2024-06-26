<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
    <base href="http://localhost:8080/">
    <link href="/assets/user/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/user/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/user/css/prettyPhoto.css" rel="stylesheet">
    <link href="/assets/user/css/price-range.css" rel="stylesheet">
    <link href="/assets/user/css/animate.css" rel="stylesheet">
    <link href="/assets/user/css/main.css" rel="stylesheet">
    <link href="/assets/user/css/responsive.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplecartjs/3.0.5/simplecart.min.js">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.6.0/pagination.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.6.0/pagination.js" rel="stylesheet"> -->




    <!--[if lt IE 9]>
    <script src="/assets/user/html5shiv./assets/user"></script>
    <script src="/assets/user/respond.min./assets/user"></script>
    <![endif]-->
    <link rel="shortcut icon" href="/assets/user//assets/user/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="/assets/user/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="/assets/user/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="/assets/user/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/assets/user/images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i>0812453363</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i>dduong1703@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="https://www.facebook.com/DuongDinh1703"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.php?page=Trang-chu"><img src="/assets/images/logo.png" alt="" /></a>
                        </div>

                    </div>
                    <div class="shop-menu pull-right">
                        <?php if (session()->has("customer_name")): ?>
                        <!-- Hiển thị khi người dùng đã đăng nhập -->
                        <ul class="nav navbar-nav: '>'">
                            <li><a href="views/profile"><i
                                        class="fa fa-user"></i><?= session()->get("customer_name") ?></a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
                            <li><a href="cart"><i class="fa fa-shopping-cart"></i> Giỏ
                                    hàng </a></li>
                            <li><a href="/logout"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                            </li>
                        </ul>
                        <?php else: ?>
                        <!-- Hiển thị khi người dùng chưa đăng nhập -->
                        <ul class="nav navbar-nav : '>'">
                            <li><a href="views/profile"><i class="fa fa-user"></i>Tài khoản</a>
                            </li>
                            <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
                            <li><a href="cart"><i class="fa fa-shopping-cart"></i> Giỏ
                                    hàng</a></li>
                            <li><a href="/login"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom" style="padding-bottom: 75px; padding-top: 25px">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="index.php?page=Trang-chu" class="active">Trang chủ</a></li>
                                <li class="dropdown"><a href="#">Cửa hàng<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="views/product/0">Sản phẩm</a></li>
                                    </ul>
                                </li>

                                <li><a href="views/blog">Tin tức công nghệ</a></li>
                                <li><a href="views/intro">Giới thiệu</a></li>
                                <li><a href="views/contact">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="gcse-search">
                            <!-- <form action="" method="get">
                                <input type="search" id="filter" class="form-control rounded" name="keyword"
                                    placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                <button style="display:none;" type="submit" class="btn btn-outline-primary"
                                    data-mdb-ripple-init>search</button>
                            </form> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->
    <?php if (session()->has('cart_message')) : ?>
    <div class="alert alert-success">
        <?= session('cart_message') ?>
    </div>
    <?php endif; ?>