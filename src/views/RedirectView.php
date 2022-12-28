<?php

class RedirectView
{
    private $path;
    private $code;

    public function __construct($path, $code)
    {
        $this->path = $path;
        $this->code = $code;
    }

    public function render()
    {
        http_response_code($this->code);
        header("Location: {$this->path}");
    }
}