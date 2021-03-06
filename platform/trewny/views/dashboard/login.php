<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->params['title'] = 'Login';

$form = ActiveForm::begin([
    'enableClientValidation' => false,
    'options' => [
        'class' => 'form login',
    ],
    'fieldConfig' => ['template' => "{input}"],
]);
?>
    <div class="grid">
        <?= $form->errorSummary($model); ?>
        <div class="form__field">
            <label for="login__username">
                <i class="fa fa-user icon"></i>
                <span class="hidden">Username</span></label>
            <?= $form->field($model, 'username')->textInput(['class' => 'form__input', 'placeholder' => 'username', 'type' => 'text'])->label(false) ?>
        </div>
        <div class="form__field">
            <label for="login__password">
                <i class="fa fa-lock icon"></i>
                <span class="hidden">Password</span></label>
            <?= $form->field($model, 'password')->passwordInput(['class' => 'form__input', 'placeholder' => 'password'])->label(false) ?>
        </div>
        <div class="form__field">
            <?= Html::submitInput('Login') ?>
        </div>
        <p class="text--center">Not a member? <a href="<?= Url::to(['dashboard/register']) ?>">Sign up</a></p>
    </div>
<?php

ActiveForm::end();


