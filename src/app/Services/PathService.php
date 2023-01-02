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

    public static function layout(string $path): string
    {
        return LAYOUTS_PATH_PREFIX . $path . '.php';
    }

    public static function layoutComponent(string $path): string
    {
        return LAYOUTS_COMPONENTS_PATH_PREFIX . $path . '.php';
    }

    public static function isCurrentPath(string $path): bool
    {
        return $_SERVER['REQUEST_URI'] === $path;
    }

    public static function activeElementIfIsCurrentPath(string $path): string
    {
        if (!self::isCurrentPath($path)) {
            return "";
        }

        return 'navigation__list-item--active';
    }
}