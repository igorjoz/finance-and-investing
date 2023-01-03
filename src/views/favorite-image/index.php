<?php

$user = User::getCurrentUser();
$ids = isset($_SESSION['favorites']) ? $_SESSION['favorites'] : [];
$favorites = isset($_SESSION['favorites']) ? $_SESSION['favorites'] : [];
$images = Image::getAll();

$images = array_map(function ($id) {
    return Image::get(['_id' => new MongoDB\BSON\ObjectId($id)]);
}, $ids);

// $images = array_filter($images, function ($image) use ($user) {
// return $image->public or ($user and $image->author === $user->login);
// });

$pageTitle = "Favorite images gallery";
$file = '../views/favorite-image/index-content.php';

include_once LAYOUTS_PATH_PREFIX . "main.php";

require_once VIEWS_PATH_PREFIX . "favorite-image/index-content.php";

?>