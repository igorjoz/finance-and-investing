<?php

require_once '../app/Services/PathService.php';

$pageTitle = "Contact";

$pageContent = file_get_contents(VIEWS_PATH_PREFIX . "home/contact.html");

include_once LAYOUTS_PATH_PREFIX . "main.php";

?>