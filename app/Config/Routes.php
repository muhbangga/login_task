<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->post('/login/process', 'Auth::processLogin');

$routes->get('/register', 'Auth::register');
$routes->post('/register/process', 'Auth::processRegister');


$routes->get('/logout', 'Auth::logout');

$routes->get('/barang', 'Barang::index', ['filter' => 'auth']);
$routes->get('/barang/create', 'Barang::create');
$routes->post('/barang/store', 'Barang::store');
$routes->get('/barang/edit/(:num)', 'Barang::edit/$1');
$routes->post('/barang/update/(:num)', 'Barang::update/$1');
$routes->get('/barang/delete/(:num)', 'Barang::delete/$1');
