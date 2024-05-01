<?php

use App\Controllers\Users\HomeControllers;
use App\Controllers\Users\ProductsController;
use App\Controllers\Admin\ProductControllers;
use App\Controllers\Users\PaymentControllers;
use App\Controllers\CartControllers;
use CodeIgniter\Router\RouteCollection;
use CodeIgniter\RESTful\ResourceController;
use App\Filters\AuthFilter;

/**
 * @var RouteCollection $routes
 */
//WEB-GUI
$routes->get('/', 'Users\HomeControllers::index');
$routes->get('views/index', 'HomeControllers::index');

//Đăng nhập web
$routes->get('login', 'Users\HomeControllers::login');
$routes->post('/login', 'Users\HomeControllers::login');

//Đăng ký web
$routes->get('views/register', 'Users\HomeControllers::register');
$routes->post('views/register', 'Users\HomeControllers::register');

//Đăng xuất
$routes->get('logout', 'Users\HomeControllers::logout');

//User_profile
//$routes->get('views/login', 'Users\HomeControllers::profile');
$routes->get('views/profile', 'Users\HomeControllers::profile');

//Blogs
$routes->get('views/blog', 'Users\HomeControllers::blog');
$routes->get('views/blog/(:segment)', 'Users\HomeControllers::blog/$1');
$routes->get('views/blog_single/(:num)', 'Users\HomeControllers::blog_single/$1');

//intro
$routes->get('views/intro', 'Users\HomeControllers::intro');

//contact
$routes->get('views/contact', 'Users\HomeControllers::contact');

//Sản phẩm
$routes->get('views/product', 'Users\HomeControllers::product');
$routes->get('views/product/(:segment)', 'Users\HomeControllers::product/$1');
$routes->get('product_detail/(:num)', 'Users\HomeControllers::product_detail/$1');


//Comment
$routes->get('product_detail/(:num)', 'Users\CommentControllers::hiscomment');
$routes->post('/comment_product', 'Users\HomeControllers::comment_product');


//Checkout
$routes->get('views/checkout', 'Users\HomeControllers::checkout');
$routes->post('checkout', 'Users\PaymentControllers::checkout');


//giỏ hàng

$routes->get('cart', 'Users\HomeControllers::cart');
// $routes->get('addToCart', 'Users\HomeControllers::addToCart');
// $routes->get('addToCart/(:any)', 'Users\HomeControllers::addToCart/$1', ['as' => 'addToCart']);
$routes->post('addToCart', 'Users\HomeControllers::addToCart');

//Cart_add
// $routes->post('cart/add', 'Users\CartControllers::addToCart');

//Cart_delete
$routes->post('remove-from-cart', 'Users\HomeControllers::removeFromCart');





//cart_update
$routes->post('update-cart', 'Users\HomeControllers::updateCart');

//cart_destroy
$routes->get('delete', 'Users\HomeControllers::delete');
$routes->post('delete', 'Users\HomeControllers::delete');

//Cart_total
$routes->get('cart/total-price', 'Users\CartControllers::totalPrice');



// Product - User
$routes->group('product', function ($routes) {
    $routes->get('product_detail/(:num)', 'Users\ProductsController::productDetail/$1');
});


//Pay
$routes->post('online_checkout', 'Users\PaymentControlers::online_checkout');


//Thankspage
$routes->get('views/thankspage', 'Users\HomeControllers::thanks');



//Mail
$routes->get('/', 'Users\EmailController::index');
$routes->match(['get', 'post'], 'contact/mail', 'Users\EmailController::sendMail');


//testup
$routes->get('admin/pages/product/add', 'UploadControllers::add');          // Add this line.
$routes->post('public/upload', 'UploadControllers::upload'); // Add this line.

$routes->get('error/404', function () {
    return view('errors/html/error_404');
});


$routes->get('showfile/(:any)', 'Admin\FileControllers::index/$1');


//Admin-web (Có bảo vệ routes)
$routes->get('admin/login', 'Admin\LoginControllers::index');
$routes->post('admin/login', 'Admin\LoginControllers::login');


$routes->group('admin', ['filter' => 'AuthFilter'], function ($routes) {
    $routes->get('pages/home', 'Admin\HomeControllers::index');
//    $routes->get('home', 'Admin\HomeControllers::index'); 
    $routes->get('logout', 'Admin\LoginControllers::logout');   

    $routes->group('user', function ($routes) {
        $routes->get('list', 'Admin\UserControllers::list');
        $routes->get('add', 'Admin\UserControllers::add');
        $routes->post('create', 'Admin\UserControllers::create');
        $routes->get('edit/(:num)', 'Admin\UserControllers::edit/$1');
        $routes->post('update', 'Admin\UserControllers::update');
        $routes->post('delete/', 'Admin\UserControllers::delete');
    });

    $routes->group('product', function ($routes) {
        $routes->get('list', 'Admin\ProductControllers::list');
        $routes->get('add', 'Admin\ProductControllers::add');
        $routes->post('create', 'Admin\ProductControllers::create');
        $routes->match(['get', 'post'], 'edit/(:num)', 'Admin\ProductControllers::editOrUpdate/$1'); // Use match for both GET and POST
        $routes->post('delete', 'Admin\ProductControllers::delete');
    });

    $routes->group('blog', function ($routes) {
        $routes->get('list', 'Admin\BlogControllers::list');
        $routes->get('add', 'Admin\BlogControllers::add');
        $routes->post('create', 'Admin\BlogControllers::create');
        $routes->match(['get', 'post'], 'edit/(:num)', 'Admin\BlogControllers::editOrUpdate/$1'); // Use match for both GET and POST
        $routes->post('delete', 'Admin\BlogControllers::delete');
    });

    $routes->group('order', function ($routes) {
        $routes->get('list', 'Admin\OrderControllers::list');
    });

    $routes->group('reviews', function ($routes) {
        $routes->get('list', 'Admin\CommentControllers::list');
        $routes->post('delete', 'Admin\CommentControllers::delete');
    });
});