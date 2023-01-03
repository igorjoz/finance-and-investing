<?php

$images = Image::getAll();
$images = array_filter($images, function ($image) use ($user) {
    return $image->public or ($user and $image->author === $user->login);
});

$user = User::getCurrentUser();
$favorites = isset($_SESSION['favorites']) ? $_SESSION['favorites'] : [];

$pageTitle = "Images gallery";
$file = '../views/image/index-content.php';

include_once LAYOUTS_PATH_PREFIX . "main.php";

require_once VIEWS_PATH_PREFIX . "image/index-content.php";

?>