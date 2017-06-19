<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this \yii\web\View */

$form = new ActiveForm();
$form = ActiveForm::begin(['enableClientValidation' => false]);
?>

<div class="container">
    <div class="col-sm-12">
        <div class="col-sm-6">
            <?= $form->field($model, 'title')->textInput(['placeholder' => 'youtube', 'type' => 'text', 'class' => 'form-input']) ?>
            <?= $form->field($model, 'link')->textInput(['placeholder' => 'www.youtube.com', 'class' => 'form-input']) ?>
        </div>

        <div class="col-sm-6">
            <!-- Color & image -->
            <?= $form->field($model, 'color')->textInput(['placeholder' => '#d13131', 'class' => 'form-input']) ?>
        </div>

        <div class="col-sm-12">
            <?= Html::submitButton('add', ['class' => 'form-button']) ?>
        </div>
    </div>
</div>

<?php
ActiveForm::end();
