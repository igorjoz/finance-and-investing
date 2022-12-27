<?php

require_once '../app/Services/PathService.php';

$pageTitle = "Investing";

$pageContent = file_get_contents(VIEWS_PATH_PREFIX . "home/investing.html");

include_once LAYOUTS_PATH_PREFIX . "main.php";

?>