<?php

namespace app\controllers;

use yii\helpers\Url;
use yii\web\Controller;

class ContactController extends Controller
{
    public function actionIndex()
    {
        return $this->render(Url::to('contact'));
    }
}