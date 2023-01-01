<?php

class Helper
{
    public static function endsWith($string, $suffix): bool
    {
        $strLen = strlen($string);
        $suffixLen = strlen($suffix);

        if ($suffixLen > $strLen) {
            return false;
        }

        return substr_compare($string, $suffix, $strLen - $suffixLen, $suffixLen) === 0;
    }

    public static function post($name, $default = '')
    {
        return isset($_POST[$name]) ? $_POST[$name] : $default;
    }
}