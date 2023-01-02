<?php

require_once '../app/Services/PathService.php';

$pageTitle = "Create user";
$pageContent = file_get_contents(PathService::view("user/create-content"));
include_once PathService::layout("main");

?>