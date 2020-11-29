<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ThemesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Темы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="themes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить тему', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            [
                'attribute'=>'category',
                'content'=> function($model){
                    return $model->categoryModel->name;
                },
                'filter' => kartik\select2\Select2::widget([
                    'model' => $searchModel,
                    'attribute' =>'category',
                    'data' => \yii\helpers\ArrayHelper::map(\app\models\Categories::find()->orderBy("name")->all(),
                        'id',
                        'name'),
                    'theme' => \kartik\select2\Select2::THEME_BOOTSTRAP,
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                    'options' => [
                        'placeholder' => 'Поиск по категории',
                    ],
                ]),
            ],
            [
                'attribute'=>'level',
                'content'=> function($model){
                    return $model->levelModel->name;
                },
                'filter' => kartik\select2\Select2::widget([
                    'model' => $searchModel,
                    'attribute' =>'level',
                    'data' => \yii\helpers\ArrayHelper::map(\app\models\Levels::find()->orderBy("name")->all(),
                        'id',
                        'name'),
                    'theme' => \kartik\select2\Select2::THEME_BOOTSTRAP,
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                    'options' => [
                        'placeholder' => 'Поиск по уровню',
                    ],
                ]),
            ],
            'name',
            [
                'attribute'=>'photo',
                'filter'=>false,
                'format'=>'raw',
                'value'=>function($model){
                    if (empty($model->photo)){
                        return '';
                    }
                    return '<img class="img-responsive" src="'.$model->photo.'" />';
                }
            ],
            [
                'attribute'=>'wordsCount',
                'filter'=>false,
                'contentOptions' => [
                    'style'=>'text-align: right;'
                ],
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
