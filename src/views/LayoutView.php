<?php
require_once '../app/Core/View.php';

class LayoutView extends View
{
    protected $template;
    protected $data;
    protected $layout = 'main';

    public function __construct($template, $data = [])
    {
        $this->template = $template;
        $this->data = $data;
    }

    public function renderBody()
    {
        $template = "{$this->template}.php";
        extract($this->data);

        include "../views/layouts/{$this->layout}.php";
    }
}