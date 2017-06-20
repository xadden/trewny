<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this \yii\web\View */

$this->params = [
    'tab' => 'bookmark',
    'title' => 'Bookmark #' . $bookmark->id,
    'actions' => [
        ['update bookmark', ['bookmark/update', 'id' => $bookmark->id]],
        ['delete bookmark', ['bookmark/delete', 'id' => $bookmark->id]]
    ]
];

$this->registerCssFile("@web/css/crud.css", ['depends' => 'trewny\assets\MainBundle']);

?>

<div class="wrapper-view col-sm-12">
    <div style="background-color:<?= $bookmark->color ?: 'rgba(0, 0, 0, 0)' ?>" class="box">
        <img class="icon-center" src="<?= $bookmark->image ? Url::to(['bookmark/image', 'id' => $bookmark->id]) : Url::to('@web/images/picture.png') ?>">
        <a href="<?= Url::to($bookmark->link) ?>"><?= $bookmark->title ?></a>
    </div>

    <div class="box2">
        <div class="item-view">
            <span class="label-view">Title:</span>
            <div class="value-view"><span class="value-text"><?= $bookmark->title ?></span></div>
        </div>

        <div class="item-view">
            <span class="label-view">Link:</span>
            <div class="value-view"><span class="value-text"><?= $bookmark->link ?></span></div>
        </div>

        <div class="item-view">
            <span class="label-view">Color:</span>
            <div class="value-view"><span class="value-text"><?= $bookmark->color ?></span></div>
        </div>

    </div>
</div>
