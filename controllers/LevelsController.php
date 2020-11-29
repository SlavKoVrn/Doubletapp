<?php

namespace app\controllers;

use app\models\Levels;
use app\models\LevelsSearch;

use Yii;

class LevelsController extends RestController
{
    public $modelClass = Levels::class;

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new LevelsSearch();
        return $searchModel->search(Yii::$app->request->queryParams);
    }

}
