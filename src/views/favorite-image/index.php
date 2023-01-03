<?php

$user = User::getCurrentUser();
$favorites = isset($_SESSION['favorites']) ? $_SESSION['favorites'] : [];
$ids = isset($_SESSION['favorites']) ? $_SESSION['favorites'] : [];

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$limit = 3;
$skip = ($page - 1) * $limit;
$next = ($page + 1);
$prev = ($page - 1);

$images = Image::getAllWithPagination([], $page, $limit);

$images = array_filter($images, function ($image) use ($user) {
    return $image->public or ($user and $image->author === $user->login);
});


$images = array_map(function ($id) {
    return Image::get(['_id' => new MongoDB\BSON\ObjectId($id)]);
}, $ids);

$total = count($images);

$pageTitle = "Favorite images gallery";
$file = '../views/favorite-image/index-content.php';

include_once LAYOUTS_PATH_PREFIX . "main.php";

require_once VIEWS_PATH_PREFIX . "favorite-image/index-content.php";

?>