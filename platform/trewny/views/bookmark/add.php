<?php

/* @var $this yii\web\View */

$this->params = [
    'tab' => 'bookmark',
    'title' => 'Add bookmark',
];

?>

<?= $this->render('_form', ['model' => $model]) ?>
