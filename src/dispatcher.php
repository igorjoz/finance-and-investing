<?php


// require_once '/controllerscontrollers/controller.php';
// require_once '/controllers/controller.php';
require_once 'controllers/controller.php';
// require_once 'routing.php';
require_once 'controllers/HomeController.php';


const REDIRECT_PREFIX = 'redirect:';


function dispatch($routing, $actionUrl)
{
    $controllerName = $routing[$actionUrl] ?? 'default';
    $model = [];
    $viewName = $controllerName($model);
    // $viewName = 'home/index';

    build_response($viewName, $model);
}

function home_index(&$model)
{
    return 'home_index';
}

function home_investing(&$model)
{
    return 'home_investing';
}

function home_faq(&$model)
{
    return 'home_faq';
}

function home_contact(&$model)
{
    return 'home_contact';
}

function build_response($view, $model)
{
    if (strpos($view, REDIRECT_PREFIX) === 0) {
        $url = substr($view, strlen(REDIRECT_PREFIX));

        header("Location: " . $url);

        exit;
    } else {
        render($view, $model);
    }
}
function render($viewName, $model)
{
    extract($model);

    include 'views/' . $viewName . '.php';
}