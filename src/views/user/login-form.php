<?php

require_once '../app/Services/PathService.php';

$pageTitle = "Login form";
$pageContent = file_get_contents(PathService::view("user/login-form-content"));
include_once PathService::layout("main");

?>