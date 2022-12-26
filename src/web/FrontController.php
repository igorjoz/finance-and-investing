<?

// require_once '../dispatcher.php';
// require_once '../routing.php';
require_once '../Router.php';

$router = new Router();

$actionUrl = isset($_GET['action']) ? $_GET['action'] : '/';

$router->route($actionUrl);