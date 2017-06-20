<?php

use yii\helpers\Url;
use yii\helpers\Html;
use trewny\assets\MainBundle;

/* @var $this yii\web\View */

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
        <link rel="shortcut icon" type="image/x-icon" href="<?= Url::to('@web/images/favicon.ico') ?>"/>

        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
    </head>

    <body class="loaded">
    <?php $this->beginBody() ?>

    <div class="header">
        <div class="inner">
            <h1>trewny</h1>
            <nav id="nav">
                <a class="<?= $tab == 'home' ? 'active' : '' ?>" href="<?= Url::to(['dashboard/index']) ?>">home</a>
                <a class="<?= $tab == 'bookmark' ? 'active' : '' ?>"
                   href="<?= Url::to(['bookmark/index']) ?>">bookmark</a>
                <a href="<?= Url::to(['dashboard/logout']) ?>">logout</a>
            </nav>
        </div>
    </div>

    <?php if (isset($this->params['actions'])) { ?>
        <div class="dropdown">
            <div class="btn-group actions">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                </button>

                <ul class="dropdown-menu">
                    <?php foreach ($this->params['actions'] as $action) { ?>
                        <li><a class="dropdown-item" href="<?= Url::to($action[1]) ?>"><?= $action[0] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php } ?>


    <div class="container">
        <?= $content ?>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>

<?php
$this->endPage();
