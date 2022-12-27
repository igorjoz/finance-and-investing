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

        $extension = pathinfo($resourcePath, PATHINFO_EXTENSION);

        // if ($extension !== 'php') {
        //     return readfile($resourcePath);
        // }

        if (Helper::endsWith($url, '.css')) {
            header('Content-Type: text/css');
            return readfile($resourcePath);
        } elseif (Helper::endsWith($url, '.js')) {
            header('Content-Type: application/javascript');
            return readfile($resourcePath);
        } elseif (Helper::endsWith($url, '.png')) {
            header('Content-Type: image/png');
            return readfile($resourcePath);
        } elseif (Helper::endsWith($url, '.jpg')) {
            header('Content-Type: image/jpg');
            return readfile($resourcePath);
        } elseif (Helper::endsWith($url, '.jpeg')) {
            header('Content-Type: image/jpeg');
            return readfile($resourcePath);
        } elseif (Helper::endsWith($url, '.webp')) {
            header('Content-Type: image/webp');
            return readfile($resourcePath);
        } elseif (Helper::endsWith($url, '.avif')) {
            header('Content-Type: image/avif');
            return readfile($resourcePath);
        } elseif (Helper::endsWith($url, '.gif')) {
            header('Content-Type: image/gif');
            return readfile($resourcePath);
        } elseif (Helper::endsWith($url, '.svg')) {
            header('Content-Type: image/svg+xml');
            return readfile($resourcePath);
        } elseif (Helper::endsWith($url, '.ico')) {
            header('Content-Type: image/x-icon');
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