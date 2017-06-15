<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* var $bookmarks */

$data = Yii::$app->params['data'] . DIRECTORY_SEPARATOR . 'bookmarks' . DIRECTORY_SEPARATOR;

?>

<div class="container">
    <?php
    $i = 0;
    foreach ($bookmarks as $bookmark) { ?>
            <div style="background-color:<?= $bookmark->color ?: 'rgba(0, 0, 0, 0)' ?>" class="box">
                <img class="icon-center" src="<?= $bookmark->image ? Url::to('@web/images/bookmarks/' . $bookmark->image) : Url::to('@web/images/picture.png    ') ?>">
                <a href="<?= $bookmark->link ?>"><?= $bookmark->title ?></a>
            </div>
        <?php $i++;
    } ?>
</div>
