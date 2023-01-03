<?php

require_once '../app/Core/Model.php';

class Image extends Model
{
    public $author;
    public $title;
    public $extension;
    public $public;

    public function __construct(string $author, string $title, string $public, string $extension)
    {
        $this->author = $author;
        $this->title = $title;
        $this->public = $public;
        $this->extension = $extension;
    }

    protected function serialize(): array
    {
        $image = [
            'author' => $this->author,
            'title' => $this->title,
            'public' => $this->public,
            'extension' => $this->extension
        ];

        return array_merge(parent::serialize(), $image);
    }

    static public function deserialize($image): Image
    {
        $instance = new static (
            $image['author'],
            $image['title'],
            $image['public'],
            $image['extension']
        );

        $instance->id = (string) $image['_id'];

        return $instance;
    }
}