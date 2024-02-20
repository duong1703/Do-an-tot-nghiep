<?php

use App\Controllers\HomeControllers;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users\HomeControllers::index');
$routes->get('error/404', function(){
    return view('errors/html/error_404');
});

$routes->group('admin', function ($routes) {
    $routes->get('home', 'Admin\HomeControllers::index');
    $routes->get('login','Admin\LoginControllers::index');
    $routes->post('login','Admin\LoginControllers::login');
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
        $routes->get('add', 'Admin\ProductControllers::add');
        $routes->post('create', 'Admin\ProductControllers::create');
    });

});

