<?php

require_once '../app/Services/PathService.php';

$pageTitle = "Home Page";
$additionalScripts = ['slider.js'];

$pageContent = file_get_contents(VIEWS_PATH_PREFIX . "home/index.html");

include_once LAYOUTS_PATH_PREFIX . "main.php";

?>