<?php

class FlashMessageService
{
    static public function init()
    {
        if (!isset($_SESSION['flash'])) {
            $_SESSION['flash'] = [];
        }
    }

    static public function set($key, $value)
    {
        if (!isset($_SESSION['flash'][$key])) {
            $_SESSION['flash'][$key] = [];
        }
        array_push($_SESSION['flash'][$key], $value);
    }

    static public function getFlashMessages($key = null)
    {
        if ($key) {
            $messages = $_SESSION['flash'][$key];
            $_SESSION['flash'][$key] = [];
        } else {
            $messages = $_SESSION['flash'];
            $_SESSION['flash'] = [];
        }

        return $messages;
    }

    static public function error($message)
    {
        static::set('error', $message);
    }

    static public function info($message)
    {
        static::set('info', $message);
    }
}