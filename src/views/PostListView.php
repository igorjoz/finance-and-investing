<?php

class PostListView
{
    private $posts;

    public function __construct($posts)
    {
        $this->posts = $posts;
    }

    public function render()
    {
        $posts = $this->posts;
        include 'layouts/postlist.php';
    }
}