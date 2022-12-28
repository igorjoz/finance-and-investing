<?php

class Error404View
{
    public function render()
    {
        http_response_code(404);
        include 'layouts/404.php';
    }
}