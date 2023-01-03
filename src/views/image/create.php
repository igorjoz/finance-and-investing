<?php

require_once '../app/Models/User.php';

$user = User::getCurrentUser();

$pageTitle = "Upload a image";
$file = '../views/image/create-content.php';

include_once LAYOUTS_PATH_PREFIX . "main.php";

require_once VIEWS_PATH_PREFIX . "image/create-content.php";

?>