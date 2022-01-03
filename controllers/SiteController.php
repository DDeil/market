<?php

namespace app\controllers;

use app\form\LinksForm;
use app\models\Category;
use app\search\LinksSearch;
use app\service\SaveLinkService;
use Yii;
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
        return $this->render('index');
    }

    /**
     * @param $token
     * @throws NotFoundHttpException
     */
    public function actionGo($token)
    {
        return $this->render('index');
    }
}
