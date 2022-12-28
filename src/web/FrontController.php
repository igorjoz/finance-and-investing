<?php

require_once '../vendor/autoload.php';
require_once '../app/Core/Router.php';

$router = new Router();

require_once '../routes/web.php';

$view = $router->dispatch();
$view->render();