<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/login', 'Home::login');
$routes->get('/salir', 'Home::salir');

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/inicio', 'Empleados::index');
    $routes->post('/agregar', 'Empleados::agregar');
    $routes->post('/actualizar/(:num)', 'Empleados::actualizar/$1');
    $routes->get('/eliminar/(:num)', 'Empleados::eliminar/$1');
});
