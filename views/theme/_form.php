<?php
use app\models\Categories;
use app\models\Levels;

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Themes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="themes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category')->dropDownList(Categories::getCategoriesList()) ?>

    <?= $form->field($model, 'level')->dropDownList(Levels::getLevelsList()) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <div class="form-group">
        <img id="img_look" class="img-responsive" src="<?= $model->photo ?>" />
    </div>

    <div class="form-group">
        <?= Html::submitButton('Посмотреть ссылку', ['id'=>'look','class' => 'btn btn-success']) ?>
    </div>

</div>

<?php
$js=<<<JS
    $('#look').on('click',function(){
        if ($('#s-photo').val()==''){
            alert('Укажите ссылку на фото');
            return;
        }
        $('#img_look').attr('src',$('#s-photo').val());
    });
JS;
$this->registerJs($js);