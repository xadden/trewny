<?php

use yii\helpers\Html;
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
        <title>Login</title>

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
