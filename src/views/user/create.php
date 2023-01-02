<?php

require_once '../app/Services/PathService.php';

$pageTitle = "Login page";
$pageContent = file_get_contents(VIEWS_PATH_PREFIX . "user/create-content.php");
include_once LAYOUTS_PATH_PREFIX . "main.php";

?>