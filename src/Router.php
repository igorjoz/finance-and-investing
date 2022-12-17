<?

require_once 'Controllers/HomeController.php';
require_once 'Controllers/UserController.php';
require_once 'Services/Helper.php';

use Controller\HomeController;

class Router
{
    public function route($url)
    {
        $resourcePath = __DIR__ . str_replace("home", "web", $url);

        if (Helper::endsWith($url, '.css')) {
            header('Content-Type: text/css');
            return readfile($resourcePath);
        } elseif (Helper::endsWith($url, '.js')) {
            header('Content-Type: application/javascript');
            return readfile($resourcePath);
        } else {
            header('Content-Type: text/html');
        }

        $controller = 'HomeController';
        $action = 'index';

        if ($url != '/') {
            $parts = explode('/', $url);

            array_shift($parts); // skip first empty element

            $controller = ucfirst(array_shift($parts)) . 'Controller';

            if (count($parts) > 0) {
                $action = array_shift($parts);
            } else {
                $action = 'index';
            }
        }

        // Create an instance of the controller and invoke the action
        $controller = new $controller();
        $controller->$action();
    }
}