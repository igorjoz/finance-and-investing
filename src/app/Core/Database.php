<?php

require '../vendor/autoload.php';

class Database
{
    private static $database = null;

    public static function get()
    {
        if (!isset(static::$database)) {
            static::$database = new MongoDB\Client(
                "mongodb://127.0.0.1:27017/wai",
                [
                    'username' => 'wai_web',
                    'password' => 'w@i_w3b'
                ]
            );
        }

        // delete users collection



        return static::$database->wai;
    }
}