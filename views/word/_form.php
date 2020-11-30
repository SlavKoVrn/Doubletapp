<?php
use app\models\Themes;
use app\models\Words;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Words */
/* @var $form yii\widgets\ActiveForm */
/* @var $themes array */
?>

<div class="words-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'themes')->widget(Select2::class, [
        'data' => Themes::getThemesList(),
        'maintainOrder' => true,
        'options' => [
            'placeholder' => 'Выберите тему ...',
            'multiple' => true
        ],
        'pluginOptions' => [
            'tags' => true,
            'maximumInputLength' => 10
        ],
    ])->label('Темы') ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'translation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transcription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'example')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sound')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <div class="form-group">
        <audio id="player" src="<?= $model->sound ?>" controls></audio>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Посмотреть ссылку', ['id'=>'look','class' => 'btn btn-success']) ?>
    </div>

</div>

<?php
$js=<<<JS
    $('#look').on('click',function(){
        if ($('#s-sound').val()==''){
            alert('Укажите ссылку на звук');
            return;
        }
        $('#player').attr('src',$('#s-sound').val());
        document.getElementById('player').play();
    });
JS;
$this->registerJs($js);