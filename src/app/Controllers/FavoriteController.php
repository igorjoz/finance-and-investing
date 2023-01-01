<?php

require_once '../models/Image.php';
require_once '../views/LayoutView.php';
require_once '../views/RedirectView.php';

class FavoriteController
{
    public function index()
    {
        $ids = isset($_SESSION['favorites']) ? $_SESSION['favorites'] : [];
        $imgs = array_map(function ($id) {
            return Img::get(['_id' => new MongoDB\BSON\ObjectId($id)]);
        }, $ids);
        return new LayoutView('favlist', ['imgs' => $imgs]);
    }

    public function set()
    {
        $selected = post('selected', []);
        $_SESSION['favorites'] = $selected;
        return new RedirectView('/imgs/favorite', 303);
    }

    public function remove()
    {
        $selected = post('selected', []);
        if (isset($_SESSION['favorites'])) {
            $_SESSION['favorites'] = array_values(
                array_filter($_SESSION['favorites'], function ($id) use ($selected) {
                    return !in_array($id, $selected);
                })
            );
        } else {
            $_SESSION['favorites'] = [];
        }
        return new RedirectView('/imgs/favorite', 303);
    }
}