<?php

namespace app\controllers;

use app\models\Themes;
use app\models\ThemesSearch;

use Yii;

class ThemesController extends RestController
{
    public $modelClass = Themes::class;

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new ThemesSearch();
        return $searchModel->search(Yii::$app->request->queryParams);
    }
}
