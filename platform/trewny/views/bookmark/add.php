<?php

/* @var $this yii\web\View */

$this->params = [
    'tab' => 'bookmark',
    'title' => 'add bookmark',
];

?>

<?= $this->render('_form', ['model' => $model]) ?>
