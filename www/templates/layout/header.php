<!DOCTYPE html>
<html>

<head>
    <title>Luc Wybourn-Whyte</title>
    <link href="dist/style.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php
$nav_menu = array(
    'Home' => '/'
); ?>

<body>
    <nav class="navigation">
        <div class="container">
            <div class="navigation__wrapper">
                <div class="navigation__logo">
                    <a href="/">
                        <h3>JS School</h3>
                    </a>
                </div>
                <ul class="navigation__menu">
                    <?php foreach ($nav_menu as $key => $value) : ?>
                        <li class="navigation__menu-item">
                            <a class="navigation__menu-item-actual" href="<?= $value ?>"><?= $key ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>