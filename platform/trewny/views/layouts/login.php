<?php

use yii\helpers\Html;
use yii\helpers\Url;
use trewny\assets\Authentication;

/** @var $this yii\web\View */
Authentication::register($this);

$this->beginPage();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $this->params['title'] . ' - Trewny'?></title>

        <link rel="shortcut icon" type="image/x-icon" href="<?= Url::to('@web/images/favicon.ico?>') ?>"/>

        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
    </head>

    <body class="login">
        <?php $this->beginBody() ?>
        <div class="login-page">
            <div class="form">
                <?= $content ?>
            </div>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>

<?php
$this->endPage();
