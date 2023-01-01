<?php

require_once '../app/Core/View.php';

class RedirectView extends View
{
    private $path;

    public function __construct($path, $code)
    {
        $this->path = $path;
        $this->code = $code;
    }

    public function renderHead()
    {
        header("Location: {$this->path}");
    }

    public function render()
    {
        http_response_code($this->code);
        header("Location: {$this->path}");
    }
}