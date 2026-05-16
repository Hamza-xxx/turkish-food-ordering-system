<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/admin/create-food', 'Admin::createFood');
$routes->post('/admin/store-food', 'Admin::storeFood');

$routes->get('/menu', 'Menu::index');
$routes->get('/register', 'Auth::register');
$routes->post('/register/store', 'Auth::store');

$routes->get('/login', 'Auth::login');
$routes->post('/login/authenticate', 'Auth::authenticate');

$routes->get('/logout', 'Auth::logout');
$routes->get('/admin/delete-food/(:num)', 'Admin::deleteFood/$1');

$routes->get('/cart', 'Cart::index');
$routes->match(['get', 'post'], '/cart/add/(:num)', 'Cart::add/$1');$routes->get('/cart/remove/(:num)', 'Cart::remove/$1');

$routes->get('/checkout', 'Cart::checkout');
$routes->get('/invoice/(:num)', 'Cart::invoice/$1');

$routes->post('/cart/apply-coupon', 'Cart::applyCoupon');