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