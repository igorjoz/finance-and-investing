<?php

require_once '../app/Core/Router.php';

// * home
$router->get('/', 'HomeController::index');
$router->get('/index', 'HomeController::index');
$router->get('/home', 'HomeController::index');
$router->get('/home/index', 'HomeController::index');
$router->get('/home/investing', 'HomeController::investing');
$router->get('/home/faq', 'HomeController::faq');
$router->get('/home/contact', 'HomeController::contact');

// * user
$router->get('/register', 'UserController::registerForm');
$router->get('/user/register', 'UserController::registerForm');
$router->post('/user/create', 'UserController::store');
$router->get('/login', 'UserController::loginForm');
$router->get('/user/login', 'UserController::loginForm');
$router->post('/user/login', 'UserController::login');
$router->post('/user/logout', 'UserController::logout');

// * image
$router->get('/images', 'ImageController::index');
$router->get('/gallery', 'ImageController::index');
$router->get('/image/create', 'ImageController::create');
$router->post('/image/create', 'ImageController::store');

// * error handling
$router->_404('ErrorController::_404');

// * testing
$router->get('/post/new', 'PostController::new');
$router->get('/posts', 'PostController::index');

$router->post('/post', 'PostController::add');

// Router::get('/home/index', 'HomeController::index');
// Router::get('/home/investing', 'HomeController::investing');
// Router::get('/home/faq', 'HomeController::faq');
// Router::get('/home/contact', 'HomeController::contact');

// Router::get('/login', 'UserController::login');
// Router::get('/user/login', 'UserController::login');