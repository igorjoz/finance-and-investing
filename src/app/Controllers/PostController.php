<?php
require_once '../app/Models/Post.php';
require_once '../views/RedirectView.php';

class PostController
{
    public function index()
    {
        $posts = Post::getAll();

        require_once '../views/post/index.php';
    }

    public function create()
    {
        require_once '../views/post/create.php';
    }

    public function store()
    {
        $title = $_POST['title'];
        $contents = $_POST['contents'];

        $post = new Post($title, $contents);
        $post->save();

        return new RedirectView('/posts', 303);
    }
}