<?php

use yii\helpers\Url;
use yii\helpers\Html;
use trewny\assets\MainBundle;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

$title = $this->params['title'] ?? 'trewny';
$tab = $this->params['tab'] ?? 'home';

MainBundle::register($this);

$this->beginPage();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">

        <title><?= $title ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="<?= Url::to('@web/images/favicon.ico?>') ?>"/>

        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
    </head>

    <body class="loaded">
    <?php $this->beginBody() ?>

    <div class="cbp-af-header cbp-af-header-shrink">
        <div class="cbp-af-inner">
            <h1>trewny</h1>
            <nav id="nav">
                <a class="<?= $tab == 'home' ? 'active' : '' ?>" href="<?= Url::to(['dashboard/index']) ?>">home</a>
                <a class="<?= $tab == 'add' ? 'active' : '' ?>" href="<?= Url::to(['dashboard/add']) ?>">add</a>
                <a href="<?= Url::to(['dashboard/logout']) ?>">logout</a>
            </nav>
        </div>
    </div>

    <?= $content ?>

    <?php $this->endBody() ?>
    </body>
    </html>

<?php
$this->endPage();
