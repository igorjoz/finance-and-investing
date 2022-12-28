<?php

class Router
{
    private $get;
    private $post;
    private $errors;

    public function __construct()
    {
        $this->get = [];
        $this->post = [];
    }

    public function get($path, $action)
    {
        $this->get[$path] = $action;
    }

    public function post($path, $action)
    {
        $this->post[$path] = $action;
    }

    public function _404($action)
    {
        $this->errors['404'] = $action;
    }

    public function dispatch()
    {
        $path = explode('?', $_SERVER['REQUEST_URI'])[0];
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        if (isset($this->$method) && isset($this->$method[$path])) {
            $action = explode('::', $this->$method[$path]);
        } else {
            $action = explode('::', $this->errors['404']);
        }

        $controller = $action[0];
        $handler = $action[1];

        require_once "../app/Controllers/{$controller}.php";
        return (new $controller)->$handler();
    }
}