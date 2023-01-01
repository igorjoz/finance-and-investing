<?php

abstract class View
{
    protected $code;

    public function render()
    {
        if (isset($this->code)) {
            http_response_code($this->code);
        }

        $this->renderHead();
        $this->renderBody();
    }

    public function renderHead()
    {
    }

    public function renderBody()
    {
    }
}