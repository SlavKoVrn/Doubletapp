<?php

namespace app\controllers;

use Yii;
use yii\web\ForbiddenHttpException;

class RestController extends \yii\rest\ActiveController
{
    public function init()
    {
        parent::init();

        if (Yii::$app->request->headers->get('Secret') != Yii::$app->params['API_SECRET']){
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            throw new ForbiddenHttpException('У Вас нет доступа');
        }
    }

}
