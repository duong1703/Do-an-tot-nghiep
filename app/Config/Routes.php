<?php

use App\Controllers\HomeControllers;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//WEB
$routes->get('/', 'Users\HomeControllers::index');
$routes->get('views/login', 'Users\HomeControllers::login');
$routes->get('views/login', 'Users\HomeControllers::profile');
$routes->post('views/login', 'Users\HomeControllers::login');
$routes->get('views/contact', 'Users\HomeControllers::contact');
$routes->get('views/product', 'Users\HomeControllers::product');
$routes->get('views/cart', 'Users\HomeControllers::cart');
$routes->get('views/product_detail', 'Users\HomeControllers::product_detail');
$routes->get('views/product_detail/(:num)', 'Users\HomeControllers::product_detail/$1');
$routes->get('views/profile', 'Users\HomeControllers::profile');

//Mail
$routes->get('/', 'Users\EmailController::index');
$routes->match(['get', 'post'], 'contact/mail', 'Users\EmailController::sendMail');


//testup
$routes->get('admin/pages/product/add', 'UploadControllers::add');          // Add this line.
$routes->post('public/upload', 'UploadControllers::upload'); // Add this line.


//Checkout
$routes->get('views/checkout','Users\HomeControllers::checkout');
$routes->get('vnpay/vnpay_pay','Users\HomeControllers::vnpay_pay');

$routes->get('error/404', function(){
    return view('errors/html/error_404');
});


$routes->get('showfile/(:any)','Admin\FileControllers::index/$1');

//Admin-web
$routes->get('login','Admin\LoginControllers::index');
$routes->post('login','Admin\LoginControllers::login');

$routes->group('admin',['filters'=> 'adminFilters'], function ($routes) {
    $routes->get('pages/home', 'Admin\HomeControllers::index');
    $routes->get('home', 'Admin\HomeControllers::index');
    $routes->get('logout','Admin\LoginControllers::logout');
    
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
        //$routes->get('list', 'Admin\ProductControllers::index');
        $routes->get('add', 'Admin\ProductControllers::add');
        $routes->post('create', 'Admin\ProductControllers::create');
        $routes->get('edit/(:num)', 'Admin\ProductControllers::edit/$1');
        $routes->post('update', 'Admin\ProductControllers::update');
        $routes->get('delete/(:num)', 'Admin\ProductControllers::delete/$1');
    });

});

