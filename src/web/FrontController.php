<?php

require_once '../app/Core/Router.php';

if (isset($_SERVER['HTTP_X_SERVER_REQUEST']) && $_SERVER['HTTP_X_SERVER_REQUEST'] === '1') {
    // handle server-side request
} else {
    $router = new Router();

    $actionUrl = isset($_GET['action']) ? $_GET['action'] : '/';

    $router->route($actionUrl);
}