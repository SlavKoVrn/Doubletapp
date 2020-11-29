<?php

namespace app\controllers;

use app\models\Categories;
use app\models\CategoriesSearch;

use Yii;

class CategoriesController extends RestController
{
    public $modelClass = Categories::class;

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new CategoriesSearch();
        return $searchModel->search(Yii::$app->request->queryParams);
    }
}
