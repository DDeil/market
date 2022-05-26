<?php

namespace app\modules\adm\controllers;

use app\models\Promotion;
use app\modules\adm\forms\AddPromotionForm;
use app\modules\adm\forms\AddUserForm;
use app\modules\adm\forms\search\PromotionListSearch;
use yii\helpers\Url;
use yii\web\Controller;

class PromotionController extends Controller
{
    public function actionList()
    {
        $searchModel = new PromotionListSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->get());

        $dataProvider->sort->defaultOrder['id'] = SORT_DESC;

        return $this->render('list', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
    }
    public function actionAdd()
    {
        $addForm = new AddPromotionForm();

        if ($addForm->load(\Yii::$app->getRequest()->post()) && $addForm->validate()) {
            if ($addForm->process()){
                return $this->redirect(Url::to(['list']));
            }
            \Yii::$app->getSession()->addFlash('error', 'Даты акции пересикаютья');
        }
        return $this->render('add', ['addForm' => $addForm]);
    }
}