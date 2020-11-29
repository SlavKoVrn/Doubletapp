<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \otchet\models\LoginForm */

$this->title = 'Sign In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box col-sm-6 boxShadow" style="background-color: #c3c3c3;padding:22px;">
    <div class="login-box-body">
        <p class="login-box-msg">Авторизуйтесь чтобы войти в систему</p>

        <?php $form = ActiveForm::begin(['action' => ['login',  'user' => !empty($user)?$user:false],  'id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => 'Логин']) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => 'Пароль']) ?>

        <?= $form->field($model, 'rememberMe')->checkbox()->label('Запомнить') ?>

        <div class="row">
            <div class="col-xs-4">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-success btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>


        <?php ActiveForm::end(); ?>

    </div>
</div>

<style>
    .boxShadow {
        width: 80%;
        max-width: 550px;
        margin: 10px auto;
        padding: 1em;
        box-shadow:
            0 1px 4px rgba(0, 0, 0, .3),
            -23px 0 20px -23px rgba(0, 0, 0, .8),
            23px 0 20px -23px rgba(0, 0, 0, .8),
            0 0 40px rgba(0, 0, 0, .1) inset;
    }
</style>