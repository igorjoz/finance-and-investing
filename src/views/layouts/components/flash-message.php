<?php

if (isset($_SESSION['flash']['info'])) {
    foreach (FlashMessageService::getFlashMessages('info') as $message) {
        echo "<div class='alert alert-success' role='alert'>" . $message . "</div>";
    }
}

if (isset($_SESSION['flash']['error'])) {
    foreach (FlashMessageService::getFlashMessages('error') as $message) {
        echo "<div class='alert alert-danger' role='alert'>" . $message . "</div>";
    }
}