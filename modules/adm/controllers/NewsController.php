<?php

namespace app\modules\adm\controllers;

use app\modules\adm\forms\AddCategoryForm;
use app\modules\adm\forms\AddNewsForm;
use app\modules\adm\forms\search\NewsListSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;

class NewsController extends Controller
{

    public function actionList()
    {
        $searchModel  = new NewsListSearch();
        $dataProvider = $searchModel->search();

        return $this->render('list', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
    }

    public function actionAdd()
    {
        $addForm = new AddNewsForm();

        if ($addForm->load(\Yii::$app->getRequest()->post()) && $addForm->validate()) {
            $addForm->image = UploadedFile::getInstance($addForm, 'image');
            $addForm->process();
            return $this->redirect(Url::to('list'));
        }

        return $this->render('add', ['addForm' => $addForm]);
    }
}