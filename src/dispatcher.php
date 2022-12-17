<?

// require_once 'Controllers/HomeController.php';
// require 'Controllers/HomeController.php';
// include 'Controllers/HomeController.php';
require_once 'Controllers/HomeController.php';

// use HomeController;



const REDIRECT_PREFIX = 'redirect:';

function dispatch($routing, $actionUrl)
{
    $controllerName = $routing[$actionUrl] ?? 'default';
    $model = [];
    $viewName = $controllerName($model);

    //$homeController = new HomeController();

    // if ($controllerName === 'home_index') {
    //     $viewName = HomeController::index();
    // } elseif ($controllerName === 'home_investing') {
    //     $viewName = HomeController::investing();
    // } elseif ($controllerName === 'home_faq') {
    //     $viewName = HomeController::faq();
    // } elseif ($controllerName === 'home_contact') {

    //     $viewName = HomeController::contact();
    // } else {
    //     $viewName = '404';
    // }

    build_response($viewName, $model);
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





// function home_index(&$model)
// {
//     return 'home_index';
// }

// function home_investing(&$model)
// {
//     return 'home_investing';
// }

// function home_faq(&$model)
// {
//     return 'home_faq';
// }

// function home_contact(&$model)
// {
//     return 'home_contact';
// }