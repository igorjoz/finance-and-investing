<?php
require_once '../app/Core/Database.php';

class Post
{
    public $title;
    public $contents;
    private $_id;

    public function __construct($title, $contents)
    {
        $this->title = $title;
        $this->contents = $contents;
    }

    public function save()
    {
        $response = Database::get()->posts->insertOne([
            'title' => $this->title,
            'contents' => $this->contents
        ]);

        $this->_id = $response->getInsertedId();
    }

    public static function getAll()
    {
        $response = Database::get()->posts->find([]);
        $posts = [];

        foreach ($response as $post) {
            $posts[] = new Post($post['title'], $post['contents']);
        }

        return $posts;
    }
}