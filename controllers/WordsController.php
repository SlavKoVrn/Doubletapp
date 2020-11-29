<?php

namespace app\controllers;

use app\models\Words;
use app\models\WordsSearch;

use Yii;

class WordsController extends RestController
{
    public $modelClass = Words::class;

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new WordsSearch();
        return $searchModel->search(Yii::$app->request->queryParams);
    }

}
