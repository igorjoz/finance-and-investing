<?php

$user = User::getCurrentUser();

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$limit = 3;
$skip = ($page - 1) * $limit;
$next = ($page + 1);
$prev = ($page - 1);
$total = count(Image::getAll());

$images = Image::getAllWithPagination([], $page, $limit);

$images = array_filter($images, function ($image) use ($user) {
    return $image->public or ($user and $image->author === $user->login);
});

$favorites = isset($_SESSION['favorites']) ? $_SESSION['favorites'] : [];

$pageTitle = "Images gallery";
$file = '../views/image/index-content.php';

include_once LAYOUTS_PATH_PREFIX . "main.php";

require_once VIEWS_PATH_PREFIX . "image/index-content.php";

?>