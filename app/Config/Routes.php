<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Students API Routes 
$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {
    
    
    // $routes->resource('students', [
    //     'controller' => 'Student',
    //     'except' => ['new', 'edit'] // We don't need these for API
    // ]);

    // define manually
    $routes->get('students', 'Student::index');
    $routes->get('students/(:segment)', 'Student::show/$1');
    $routes->post('students', 'Student::create');

    $routes->put('students/(:segment)', 'Student::update/$1');
    
    $routes->delete('students/(:segment)', 'Student::delete/$1');

});