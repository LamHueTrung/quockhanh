<?php

use CodeIgniter\Router\RouteCollection;

/** 
 * @var RouteCollection $routes
 */
// Admin routes
$routes->get('/admin', 'AdminController::index');
$routes->get('/admin/create', 'AdminController::create');
$routes->post('/admin/store', 'AdminController::store');
$routes->get('/admin/edit/(:num)', 'AdminController::edit/$1');
$routes->post('/admin/update/(:num)', 'AdminController::update/$1');
$routes->get('/admin/delete/(:num)', 'AdminController::delete/$1');

// Department routes
$routes->get('/department', 'DepartmentController::index');
$routes->get('/department/create-project', 'DepartmentController::createProject');
$routes->post('/department/store-project', 'DepartmentController::storeProject');
$routes->get('/department/edit-project/(:num)', 'DepartmentController::editProject/$1');
$routes->post('/department/update-project/(:num)', 'DepartmentController::updateProject/$1');
$routes->get('/department/view-project/(:num)', 'DepartmentController::viewProject/$1');
$routes->get('/department/statistics', 'DepartmentController::statistics');
$routes->get('/department/delete-project/(:num)', 'DepartmentController::deleteProject/$1');

$routes->get('/teachers', 'TeacherController::index');
$routes->get('/teachers/create', 'TeacherController::create');
$routes->post('/teachers/store', 'TeacherController::store');
$routes->get('/teachers/edit/(:num)', 'TeacherController::edit/$1');
$routes->post('/teachers/update/(:num)', 'TeacherController::update/$1');
$routes->get('/teachers/delete/(:num)', 'TeacherController::delete/$1');

// Student routes
$routes->get('/students', 'StudentController::index');
$routes->get('/students/view-project/(:num)', 'StudentController::viewProject/$1');
$routes->post('/students/update-profile', 'StudentController::updateProfile');

// Auth routes
$routes->get('/login', 'AuthController::login');
$routes->post('/authenticate', 'AuthController::authenticate');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/register', 'AuthController::register'); 
$routes->post('/register', 'AuthController::store');
