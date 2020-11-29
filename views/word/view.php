<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Words */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Слова', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="words-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'translation',
            'transcription',
            'example',
            'sound',
        ],
    ]) ?>

    <?php if (!empty($model->sound)) : ?>
        <div class="form-group">
            <audio src="<?= $model->sound ?>" controls></audio>
        </div>
    <?php endif; ?>

</div>
