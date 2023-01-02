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


        // $dotenv = new Dotenv\Dotenv(__DIR__);
        // $dotenv->load();

        // if (!isset(static::$database)) {
        //     static::$database = new MongoDB\Client(
        //         getenv('DB_HOST'),
        //         [
        //             'username' => getenv('DB_USERNAME'),
        //             'password' => getenv('DB_PASSWORD')
        //         ]
        //     );
        // }

        return static::$database->wai;
    }
}