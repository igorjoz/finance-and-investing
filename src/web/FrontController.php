<?

// require_once '../dispatcher.php';
// require_once '../routing.php';
require_once '../Router.php';

$router = new Router();

// $action_url = $_GET['action'];
$actionUrl = isset($_GET['action']) ? $_GET['action'] : '/';

// var_dump($actionUrl);

// dispatch($routing, $actionUrl);
$router->route($actionUrl);