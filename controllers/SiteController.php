<?php

namespace app\controllers;

use app\models\Category;
use yii\base\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{

    /**
     * @return \string[][]
     */
    public function actions(): array
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'view' => '/error',
            ],
        ];
    }

    /**
     * @return string
     * @throws Exception
     */
    public function actionIndex(): string
    {
        $categories = Category::findAll(['status' => true]);

        return $this->render('index', [
            'categories' => $categories,
        ]);
    }

    /**
     * @param $token
     * @throws NotFoundHttpException
     */
    public function actionGo($token)
    {
        die('sad');
        return $this->render('index');
    }
}
