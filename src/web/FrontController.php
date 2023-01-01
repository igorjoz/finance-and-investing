<?php

require_once '../vendor/autoload.php';
require_once '../app/Core/Router.php';

$router = new Router();

// * load routes from routes/web.php
require_once '../routes/web.php';

$view = $router->dispatch();

if ($view instanceof View) {
    $view->render();
}