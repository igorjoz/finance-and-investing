<?php

require_once '../app/Core/Router.php';

// * home
$router->get('/', 'HomeController::index');
$router->get('/home/investing', 'HomeController::investing');
$router->get('/home/faq', 'HomeController::faq');
$router->get('/home/contact', 'HomeController::contact');

// * user
$router->get('/user/create', 'UserController::create');
$router->post('/user', 'UserController::store');
$router->get('/user/login', 'UserController::loginForm');
$router->post('/user/login', 'UserController::login');
$router->get('/user/logout', 'UserController::logout');

// * image
$router->get('/images', 'ImageController::index');
$router->get('/image/create', 'ImageController::create');
$router->post('/image/create', 'ImageController::store');

// * error handling
$router->_404('ErrorController::_404');


// * synonyms
$router->get('/index', 'HomeController::index');
$router->get('/home', 'HomeController::index');
$router->get('/home/index', 'HomeController::index');

$router->get('/register', 'UserController::create');
$router->get('/user/register', 'UserController::create');
$router->get('/login', 'UserController::loginForm');

$router->get('/gallery', 'ImageController::index');


// * testing
$router->get('/post/create', 'PostController::create');
$router->get('/posts', 'PostController::index');
$router->post('/post/create', 'PostController::store');

// * admin panel
$router->get('/users', 'UserController::index');