<?php

require_once '../app/Models/Image.php';
require_once '../app/Services/Helper.php';
require_once '../app/Services/PathService.php';
require_once '../views/LayoutView.php';
require_once '../views/RedirectView.php';

class FavoriteImageController
{
    public function index()
    {
        require_once '../views/favorite-image/index.php';
    }

    public function save()
    {
        $selected = Helper::post('selected', []);
        $_SESSION['favorites'] = $selected;

        return new RedirectView('/favorite-images', 303);
    }

    public function remove()
    {
        $selected = Helper::post('selected', []);

        if (isset($_SESSION['favorites'])) {
            $_SESSION['favorites'] = array_values(
                array_filter($_SESSION['favorites'], function ($id) use ($selected) {
                    return !in_array($id, $selected);
                })
            );
        } else {
            $_SESSION['favorites'] = [];
        }
        return new RedirectView('/favorite-images', 303);
    }
}