<?php

namespace app\controllers;

use app\models\Category;
use app\models\search\ProductSearch;
use yii\web\Controller;

class ProductController extends Controller
{

    public function actionIndex()
    {
        $searchForm = (new ProductSearch());
        $categories = Category::findAll(['status' => true]);
        $products   = $searchForm->search(\Yii::$app->getRequest()->queryParams);

        return $this->render('index', [
            'categories' => $categories,
            'products'   => $products,
            'searchForm' => $searchForm,
        ]);
    }
}