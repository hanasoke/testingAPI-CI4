<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'SignController::login');
$routes->post('/login', 'SignController::login');
$routes->get('/register', 'SignController::register');
$routes->post('/register', 'SignController::register');
$routes->get('/logout', 'SignController::logout');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
