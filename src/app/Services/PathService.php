<?php

define('VIEWS_PATH_PREFIX', '../views/');
define('LAYOUTS_PATH_PREFIX', '../views/layouts/');
define('LAYOUTS_COMPONENTS_PATH_PREFIX', '../views/layouts/components/');

class PathService
{
    public static function view(string $path): string
    {
        return VIEWS_PATH_PREFIX . $path . '.php';
    }

    public static function layout(string $file): string
    {
        return LAYOUTS_PATH_PREFIX . $file . '.php';
    }

    public static function layoutComponent(string $file): string
    {
        return LAYOUTS_COMPONENTS_PATH_PREFIX . $file . '.php';
    }

    public static function isCurrentUri(string $uri): bool
    {
        return $_SERVER['REQUEST_URI'] === $uri;
    }

    public static function activeElementIfIsCurrentUri(string $uri): string
    {
        if (!self::isCurrentUri($uri)) {
            return "";
        }

        return 'navigation__list-item--active';
    }
}