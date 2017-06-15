<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['enableClientValidation' => false]);
?>

<?= $form->field($model, 'username')->textInput(['placeholder' => 'username', 'type' => 'text'])->label(false) ?>
<?= $form->field($model, 'password')->passwordInput(['placeholder' => 'password'])->label(false) ?>

<?= Html::submitButton('Login') ?>

<?php

ActiveForm::end();


