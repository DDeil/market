<?php

namespace app\modules\adm\controllers;

use app\modules\adm\forms\AddProductForm;
use app\modules\adm\forms\search\ProductSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;

class ProductController extends Controller
{

    public function actionList()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search();

        return $this->render('list', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
    }

    public function actionAdd()
    {
        $addForm = new AddProductForm();

        if ($addForm->load(\Yii::$app->getRequest()->post()) && $addForm->validate()) {
            $addForm->image = UploadedFile::getInstance($addForm, 'image');
            $addForm->process();
            return $this->redirect(Url::to('list'));
        }

        return $this->render('add', ['addForm' => $addForm]);
    }
}