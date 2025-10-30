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
$routes->get('/users/upgrade_plans', 'Users::plans');


//Dashboard
$routes->get('/dashboard', 'Dashboard::index');
$routes->post('/scanresult', 'Dashboard::getscanresult');

//Scan
$routes->get('/scan', 'Scan::index');
$routes->post('/scan/checkplan', 'Scan::checkplan');
$routes->post('/scan/updateplan', 'Scan::updateplan');
$routes->get('/risk_exposure', 'Scan::Myriskexploser');
$routes->get('/scan/scan_schedule', 'Scan::scan_schedule');
$routes->post('/scan/scan_schedulesave', 'Scan::save_schedule_time');



// Profile
$routes->get('/profile', 'Profile::index');
$routes->post('/profile/update', 'Profile::update');
$routes->post('/profile/changepassword', 'Profile::changepassword');


$routes->get('/plans/plan_expair', 'Plans::plan_expair');


