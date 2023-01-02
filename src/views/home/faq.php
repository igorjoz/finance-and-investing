<?php

require_once '../app/Services/PathService.php';

$pageTitle = "FAQ";

$pageContent = file_get_contents(VIEWS_PATH_PREFIX . "home/faq-content.php");

include_once LAYOUTS_PATH_PREFIX . "main.php";

?>