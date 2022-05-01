<?php

namespace app\modules\adm\controllers;

use app\models\News;
use app\modules\adm\forms\AddNewsForm;
use app\modules\adm\forms\EditNewsForm;
use app\modules\adm\forms\search\NewsListSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;


class NewsController extends Controller
{

    public function actionList()
    {
        $searchModel  = new NewsListSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->get());

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

    public function actionDelete($id)
    {
        $imageId = News::findOne(['id'=>$id])->image;
        $path = '@app/web/image/news/' . $imageId;
        $path = \Yii::getAlias($path);
        unlink($path);
        News::deleteAll(['id' => $id]);

        return $this->redirect(Url::to('list'));
    }

    public function actionEdit($id)
    {
        $news = News::findOne($id);

        if (!$news) {
            return $this->redirect(Url::to('list'));
        }
        $editForm = new EditNewsForm($news);
        if ($editForm->load(\Yii::$app->getRequest()->post()) && $editForm->validate()) {
            $editForm->image = UploadedFile::getInstance($editForm, 'image');
            $editForm->process();
            return $this->redirect(Url::to('list'));
        }

        return $this->render('edit', ['editForm' => $editForm]);


    }



}