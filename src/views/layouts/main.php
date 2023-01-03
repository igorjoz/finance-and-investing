<?php

require_once '../app/Services/PathService.php';
require_once '../app/Services/FlashMessageService.php';
require_once '../app/Models/User.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Project P.F.I - Personal Finances & Investing <?= isset($pageTitle) ? " - " . $pageTitle : "" ?></title>
    <meta name="description" content="Personal website about my hobby - Personal Finances & Investing">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="../resources/js/magnific-popup/jquery.magnific-popup.min.js"></script>
    <link rel="stylesheet" href="../resources/js/magnific-popup/magnific-popup.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="../resources/css/index.css">

    <script src="../resources/js/app.js"></script>
    <script src="../resources/js/timer.js"></script>

    <?php
    if (isset($additionalScripts)) {
        foreach ($additionalScripts as $script) {
            echo "<script src='../resources/js/$script'></script>";
        }
    }
    ?>

    <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon/favicon-16x16.png">
    <link rel="manifest" href="../images/favicon/site.webmanifest">
    <link rel="mask-icon" href="../images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="../images/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="../images/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
</head>

<body class="page__preload">
    <?php include_once PathService::layoutComponent("navigation"); ?>

    <?php include_once PathService::layoutComponent("flash-message"); ?>

    <?= isset($pageContent) ? $pageContent : "" ?>

    <?php isset($file) ? include_once $file : "" ?>

    <?php include_once PathService::layoutComponent("footer"); ?>
</body>

</html>