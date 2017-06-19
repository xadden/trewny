<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* var $bookmarks */

?>

<div class="container">
    <?php
    if ($bookmarks) {
        $i = 0;
        foreach ($bookmarks as $bookmark) { ?>
            <div style="background-color:<?= $bookmark->color ?: 'rgba(0, 0, 0, 0)' ?>" class="box">
                <img class="icon-center" src="<?= $bookmark->image ? Url::to('@web/images/bookmarks/' . $bookmark->image) : Url::to('@web/images/picture.png    ') ?>">
                <a href="<?= $bookmark->link ?>"><?= $bookmark->title ?></a>
            </div>
            <?php
            $i++;
        }
    } else { ?>
    <div class="notfound">
        <i class="fa sad fa-frown-o fa-5x" aria-hidden="true"></i></br>
        <span class="nobookmarks">you don't have any bookmarks associated with your account</span>
    </div>
   <?php } ?>
</div>
