<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::login');
$routes->get('/signupform', 'Users::signupform');


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
$routes->post('/scan/updateplan', 'Scan::updateplan');

// Profile
$routes->get('/profile', 'Profile::index');
$routes->post('/profile/update', 'Profile::update');
$routes->post('/profile/changepassword', 'Profile::changepassword');

