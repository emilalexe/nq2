<?php
/**
 * Created by PhpStorm.
 * User: Emil
 * Date: 06.07.2021
 * Time: 00:28
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>NQ&#178;</title>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon-16x16.png">
    <link rel="manifest" href="/assets/img/site.webmanifest">
    <style>
        body{
            width: 100%;
            min-height: 100vh;
            margin: 0;
            padding: unset;
            background-image: url("/assets/img/nq2-logo.svg");
            background-size: 50%;
            background-repeat: no-repeat;
            background-position: center;
            background-color: #8c8c8c;
        }
    </style>
</head>
<body>
    <header>
        <?php _menu(); ?>
        <?php assets(NULL,NULL,"assets/bootstrap-5.0.2-dist"); ?>
    </header>
