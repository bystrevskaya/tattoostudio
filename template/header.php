<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/menu_items.php';
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Примерка эскизов</title>
    <link href="/style.css" rel="stylesheet">
<!--   <script src="/script.js"></script> -->
</head>
<body>
    <ul class="header_menu">
        <li class="header_menu_item">
            <img src="/img/logo.jpg">
        </li>
        <?php displayMenu($menuItems); ?>
        <li class="header_menu_item header_sign_up">
            <a href="<?=$_SERVER['DOCUMENT_ROOT'] . '/#'?>">Записаться</a>
        </li>
    </ul>

