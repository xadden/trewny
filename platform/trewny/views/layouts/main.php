<?php

use yii\helpers\Url;
use yii\helpers\Html;

$title = $this->params['title'] ?? 'Template';

$this->beginPage();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">

        <title><?= $this->title ?></title>

        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
    </head>

    <body class="loaded">
        <?php $this->beginBody() ?>

        <?= $content ?>

        <?php $this->endBody() ?>
    </body>
</html>

<?php
$this->endPage();
