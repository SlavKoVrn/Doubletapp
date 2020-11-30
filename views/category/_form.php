<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <div class="form-group">
        <img id="img_look" class="img-responsive" src="<?= $model->icon ?>" />
    </div>

    <div class="form-group">
        <?= Html::submitButton('Посмотреть ссылку', ['id'=>'look','class' => 'btn btn-success']) ?>
    </div>

</div>

<?php
$js=<<<JS
    $('#look').on('click',function(){
        if ($('#s-icon').val()==''){
            alert('Укажите ссылку на картинку');
            return;
        }
        $('#img_look').attr('src',$('#s-icon').val());
    });
JS;
$this->registerJs($js);