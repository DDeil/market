<?php

namespace app\modules\adm\controllers;

use app\modules\adm\forms\AddCategoryForm;
use app\modules\adm\forms\search\CategoryListSearch;
use yii\helpers\Url;
use yii\web\Controller;

class CategoryController extends Controller
{

    public function actionList()
    {
        $searchModel  = new CategoryListSearch();
        $dataProvider = $searchModel->search();

        return $this->render('list', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
    }

    public function actionAdd()
    {
        $addForm = new AddCategoryForm();

        if ($addForm->load(\Yii::$app->getRequest()->post()) && $addForm->validate() && $addForm->process()) {
            return $this->redirect(Url::to('list'));
        }

        return $this->render('add', ['addForm' => $addForm]);
    }
}