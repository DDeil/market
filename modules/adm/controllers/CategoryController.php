<?php

namespace app\modules\adm\controllers;

use app\models\Category;
use app\models\ProductCategory;
use app\modules\adm\forms\AddCategoryForm;
use app\modules\adm\forms\EditCategoryForm;
use app\modules\adm\forms\search\CategoryListSearch;
use yii\helpers\Url;
use yii\web\Controller;

class CategoryController extends Controller
{

    public function actionList()
    {
        $searchModel  = new CategoryListSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->get());

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
    public function actionDelete($id)
    {
        ProductCategory::deleteAll(['category_id' => $id]);
        Category::deleteAll(['id' => $id]);

        return $this->redirect(Url::to('list'));
    }

    public function actionEdit($id)
    {
        $category = Category::findOne($id);

        if (!$category) {
            return $this->redirect(Url::to('list'));
        }
        $editForm = new EditCategoryForm($category);

        if ($editForm->load(\Yii::$app->getRequest()->post()) && $editForm->validate()) {
            $editForm->process();
            return $this->redirect(Url::to('list'));
        }

        return $this->render('edit', ['editForm' => $editForm]);


    }
}