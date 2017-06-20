<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use kartik\color\ColorInput;
use kartik\file\FileInput;

/* @var $this \yii\web\View */

$form = ActiveForm::begin([
            'enableClientValidation' => false,
            'fieldConfig' => [
                'errorOptions' => ['class' => 'error-form'],
            ],
        ]);

$this->registerCssFile("@web/css/crud.css", ['depends' => 'trewny\assets\MainBundle']);
?>

<div class="wrapper col-xs-12">
    <h1><?= $this->params['title'] ?></h1>
    <div class="col-xs-6" style="display:inline-block">
        <?= $form->field($model, 'title')->textInput(['placeholder' => 'youtube', 'type' => 'text', 'class' => 'form-input']) ?>
        <?= $form->field($model, 'link')->textInput(['placeholder' => 'youtube.com', 'class' => 'form-input']) ?>
    </div>

    <div class="col-xs-6">
        <?=
        $form->field($model, 'color')->widget(ColorInput::classname(), [
            'showDefaultPalette' => false,
            'options' => ['placeholder' => 'select a color', 'class' => 'form-input'],
            'pluginOptions' => [
                'showPalette' => false,
                'allowEmpty' => false,
                'showAlpha' => false,
            ]
        ]);
        ?>

        <?=
        $form->field($model, 'image')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'showUpload' => false,
                'showPreview' => false,
                'showRemove' => false,
                'browseClass' => 'form-file-browse',
                'browseLabel' => '',
                'captionClass' => 'form-file-caption',
            ]
        ]);
        ?>
    </div>

    <div class="col-xs-12">
        <?= Html::submitButton('submit', ['class' => 'form-button']) ?>
    </div>
    </div>
</div>

<?php
ActiveForm::end();
