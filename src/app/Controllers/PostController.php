<?php
require_once '../app/Models/Post.php';
require_once '../views/PostAddView.php';
require_once '../views/PostListView.php';
require_once '../views/RedirectView.php';

class PostController
{
    public function new ()
    {
        return new PostAddView();
    }

    public function add()
    {
        $title = $_POST['title'];
        $contents = $_POST['contents'];

        $post = new Post($title, $contents);
        $post->save();

        return new RedirectView('/post/new', 303);
    }

    public function index()
    {
        $posts = Post::getAll();

        return new PostListView($posts);
    }
}