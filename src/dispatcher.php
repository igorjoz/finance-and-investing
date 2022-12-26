<?

require_once 'Controllers/HomeController.php';



class Dispatcher
{
    public const REDIRECT_PREFIX = 'redirect:';
    public function dispatch($routing, $actionUrl)
    {
        $controllerName = $routing[$actionUrl] ?? 'default';
        $model = [];
        $viewName = $controllerName($model);

        build_response($viewName, $model);
    }

    public function build_response($view, $model)
    {
        if (strpos($view, REDIRECT_PREFIX) === 0) {
            $url = substr($view, strlen(REDIRECT_PREFIX));

            header("Location: " . $url);

            exit;
        } else {
            render($view, $model);
        }
    }

    public function render($viewName, $model)
    {
        extract($model);

        include 'views/' . $viewName . '.php';
    }
}