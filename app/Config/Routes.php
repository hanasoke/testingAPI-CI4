<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Students API Routes 
$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {

    $routes->get('students', 'Student::index');
    $routes->get('students/(:num)', 'Student::show/$1');
    $routes->post('students', 'Student::create');
    $routes->put('students/(:num)', 'Student::update/$1');
    $routes->delete('students/(:num)', 'Student::delete/$1');

    // CORS preflight
    $routes->options('students', 'Student::options');
    $routes->options('students/(:num)', 'Student::options');
});