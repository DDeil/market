<?php

namespace app\modules\adm\controllers;

use app\models\Product;
use app\models\ProductCategory;
use app\modules\adm\forms\AddProductForm;
use app\modules\adm\forms\EditProductForm;
use app\modules\adm\forms\search\ProductSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;


class ProductController extends Controller
{

    public function actionList()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->get());

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



    public function actionDelete($id)
    {
        $productModel = Product::findOne(['id'=>$id]);
        if ($productModel) {
            $path = '@app/web/image/product/' . $productModel->image;
            $path = \Yii::getAlias($path);
            try {
                unlink($path);
            }catch (\Throwable $exception) {
                \Yii::$app->getSession()->addFlash('error', $exception->getMessage());
            }
        }

        ProductCategory::deleteAll(['product_id' => $id]);
        Product::deleteAll(['id'=>$id]);

        return $this->redirect(Url::to('list'));
    }

    public function actionEdit($id)
    {
        $product = Product::findOne($id);

        if (!$product) {
            return $this->redirect(Url::to('list'));
        }
        $editForm = new EditProductForm($product);
        if ($editForm->load(\Yii::$app->getRequest()->post()) && $editForm->validate()) {
            $editForm->image = UploadedFile::getInstance($editForm, 'image');
            $editForm->process();
            return $this->redirect(Url::to('list'));
        }

        return $this->render('edit', ['editForm' => $editForm]);


    }
}