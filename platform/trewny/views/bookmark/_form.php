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

<div class="container">
    <div style="display:inline-block">
        <?= $form->field($model, 'title')->textInput(['placeholder' => 'youtube', 'type' => 'text', 'class' => 'form-input']) ?>
        <?= $form->field($model, 'link')->textInput(['placeholder' => 'youtube.com', 'class' => 'form-input']) ?>

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



        <?= Html::submitButton('add', ['class' => 'form-button']) ?>
    </div>
</div>

<?php
ActiveForm::end();
