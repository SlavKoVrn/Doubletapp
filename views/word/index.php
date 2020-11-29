<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\WordsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Слова';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="words-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить слово', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'name',
            'translation',
            'transcription',
            'example',
            [
                'attribute'=>'sound',
                'filter'=>false,
                'format'=>'raw',
                'value'=>function($model){
                    if (empty($model->sound)){
                        return '';
                    }
                    return '<audio src="'.$model->sound.'" controls></audio>';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
