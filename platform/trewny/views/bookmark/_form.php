<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use kartik\color\ColorInput;

/* @var $this \yii\web\View */

$form = new ActiveForm();
$form = ActiveForm::begin(['enableClientValidation' => false]);

$this->registerCssFile("@web/css/crud.css", ['depends' => 'trewny\assets\MainBundle']);
//$this->registerCss('span#bookmark-color-cont.input-group-html5.input-group-addon { border: 0; } ');
?>

<div class="container">
    <div class="col-sm-12">
        <div class="col-sm-6">
            <?= $form->field($model, 'title')->textInput(['placeholder' => 'youtube', 'type' => 'text', 'class' => 'form-input']) ?>
            <?= $form->field($model, 'link')->textInput(['placeholder' => 'www.youtube.com', 'class' => 'form-input']) ?>
        </div>

        <div class="col-sm-6">
            <?=
            $form->field($model, 'color')->widget(ColorInput::classname(), [
                'options' => ['placeholder' => 'Select color ...', 'class' => 'form-input'],
                'pluginOptions' => [
                    'allowEmpty' => false,
                ]
            ]);
            ?>
        </div>

        <div class="col-sm-12">
            <?= Html::submitButton('add', ['class' => 'form-button']) ?>
        </div>
    </div>
</div>

<?php
ActiveForm::end();
