<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->params['title'] = 'Register';

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
            <label for="login__email">
                <i class="fa fa-envelope icon"></i>
                <span class="hidden">Email</span></label>
            <?= $form->field($model, 'email')->textInput(['class' => 'form__input', 'placeholder' => 'email', 'type' => 'email'])->label(false) ?>
        </div>

        <div class="form__field">
            <label for="login__password">
                <i class="fa fa-lock icon"></i>
                <span class="hidden">Password</span></label>
            <?= $form->field($model, 'password')->passwordInput(['class' => 'form__input', 'placeholder' => 'password'])->label(false) ?>
        </div>

        <div class="form__field">
            <label for="login__password">
                <i class="fa fa-lock icon"></i>
                <span class="hidden">Repeat Password</span></label>
            <?= $form->field($model, 'repeatpassword')->passwordInput(['class' => 'form__input', 'placeholder' => 'confirm password'])->label(false) ?>
        </div>

        <div class="form__field">
            <?= Html::submitInput('Register') ?>
        </div>

        <p class="text--center">Already a member? <a href="<?= Url::to(['dashboard/login']) ?>">Sign in</a></p>

    </div>
<?php

ActiveForm::end();


