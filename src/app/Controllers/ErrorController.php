<?php
require_once '../views/Error404View.php';

class ErrorController
{
    public function _404()
    {
        return new Error404View();
    }
}