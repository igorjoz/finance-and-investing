<?php

require_once '../dispatcher.php';
require_once '../routing.php';
require_once '../controllers/controller.php';

// $action_url = $_GET['action'];
$actionUrl = isset($_GET['action']) ? $_GET['action'] : '/';

dispatch($routing, $actionUrl);