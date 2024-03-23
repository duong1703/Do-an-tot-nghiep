<?php

use App\Controllers\Users\HomeControllers;
use App\Controllers\Users\ProductsController;
use App\Controllers\Admin\ProductController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//WEB
$routes->get('/', 'Users\HomeControllers::index');
$routes->get('views/login', 'Users\HomeControllers::login');
$routes->get('views/register', 'Users\HomeControllers::register');
$routes->get('views/login', 'Users\HomeControllers::profile');
$routes->post('views/login', 'Users\HomeControllers::login');
$routes->get('views/blog', 'Users\HomeControllers::blog');
$routes->get('views/blog', 'Users\BlogControllers::index');
$routes->get('views/contact', 'Users\HomeControllers::contact');
$routes->get('views/product', 'Users\HomeControllers::product');
$routes->get('product_detail/(:num)', 'Users\HomeControllers::product_detail/$1');
$routes->get('views/cart', 'Users\HomeControllers::cart');
$routes->get('views/profile', 'Users\HomeControllers::profile');

// Product - User
$routes->group('product', function ($routes) {
    $routes->get('product_detail/(:num)', 'Users\ProductsController::productDetail/$1');
});


//Mail
$routes->get('/', 'Users\EmailController::index');
$routes->match(['get', 'post'], 'contact/mail', 'Users\EmailController::sendMail');


//testup
$routes->get('admin/pages/product/add', 'UploadControllers::add');          // Add this line.
$routes->post('public/upload', 'UploadControllers::upload'); // Add this line.


//Checkout
$routes->get('views/checkout', 'Users\HomeControllers::checkout');
$routes->get('vnpay/vnpay_pay', 'Users\HomeControllers::vnpay_pay');


$routes->get('error/404', function () {
    return view('errors/html/error_404');
});


$routes->get('showfile/(:any)', 'Admin\FileControllers::index/$1');

//User-web
$routes->post('views/login', 'Users\AuthController::login');


//Admin-web
$routes->get('login', 'Admin\LoginControllers::index');
$routes->post('login', 'Admin\LoginControllers::login');

$routes->group('admin', ['filters' => 'adminFilters'], function ($routes) {
    $routes->get('pages/home', 'Admin\HomeControllers::index');
    $routes->get('home', 'Admin\HomeControllers::index');
    $routes->get('logout', 'Admin\LoginControllers::logout');

    $routes->group('user', function ($routes) {
        $routes->get('list', 'Admin\UserControllers::list');
        $routes->get('add', 'Admin\UserControllers::add');
        $routes->post('create', 'Admin\UserControllers::create');
        $routes->get('edit/(:num)', 'Admin\UserControllers::edit/$1');
        $routes->post('update', 'Admin\UserControllers::update');
        $routes->get('delete/(:num)', 'Admin\UserControllers::delete/$1');
    });

    $routes->group('product', function ($routes) {
        $routes->get('list', 'Admin\ProductControllers::list');
        $routes->get('add', 'Admin\ProductControllers::add');
        $routes->post('create', 'Admin\ProductControllers::create');
        $routes->match(['get', 'post'], 'edit/(:num)', 'Admin\ProductControllers::editOrUpdate/$1'); // Use match for both GET and POST
        $routes->get('delete/(:num)', 'Admin\ProductControllers::delete/$1');
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
        $routes->get('list', 'Admin\ReviewsControllers::list');
    });
});

