<?php

namespace app\controllers;

use app\models\Category;
use app\models\News;
use yii\base\Exception;
use yii\helpers\Url;
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
        $news       = News::findAll(['status' => News::STATUS_ACTIVE]);

        return $this->render('index', [
            'categories' => $categories,
            'news'       => $news,
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

    public function actionContact()
    {
        return $this->render('contacts');
    }
}
