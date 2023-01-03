<?php

require_once '../app/Models/User.php';

session_start();

require_once '../vendor/autoload.php';
require_once '../app/Core/Router.php';
require_once '../app/Core/Database.php';

$router = new Router();

// * load routes from routes/web.php
require_once '../routes/web.php';

$view = $router->dispatch();

if ($view instanceof View) {
    $view->render();
}

// delete users collection
// Database::get()->users->drop();

// delete images collection
// Database::get()->images->drop();