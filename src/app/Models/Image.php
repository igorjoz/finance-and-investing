<?php

require_once '../app/Core/Model.php';

class Image extends Model
{
    public $author;
    public $title;
    public $format;
    public $public;

    public function __construct(string $author, string $title, string $public, string $format)
    {
        $this->author = $author;
        $this->title = $title;
        $this->public = $public;
        $this->format = $format;
    }

    protected function serialize(): array
    {
        $image = [
            'author' => $this->author,
            'title' => $this->title,
            'public' => $this->public,
            'format' => $this->format
        ];

        return array_merge(parent::serialize(), $image);
    }

    static protected function deserialize($image): Image
    {
        $instance = new static (
            $image['author'],
            $image['title'],
            $image['public'],
            $image['format']
        );

        $instance->id = (string) $image['_id'];

        return $instance;
    }
}