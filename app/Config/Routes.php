<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::login');

//User
$routes->get('/users/login', 'Users::login');
$routes->post('/users/loginprocess', 'Users::loginprocess');
$routes->post('/users/signup', 'Users::signup');
$routes->get('/users/phpinfo', 'Users::phpinfo');
$routes->get('/users/logout', 'Users::logout');

//Dashboard
$routes->get('/dashboard', 'Dashboard::index');

//Scan
$routes->get('/scan', 'Scan::index');
$routes->post('/scan/checkplan', 'Scan::checkplan');
