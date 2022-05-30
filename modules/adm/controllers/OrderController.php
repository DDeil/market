<?php

namespace app\modules\adm\controllers;

use app\models\Order;

use app\models\ProductOrder;
use app\models\User;
use app\modules\adm\forms\AddProductForm;
use app\modules\adm\forms\EditOrderForm;
use app\modules\adm\forms\AddOrderForm;
use app\modules\adm\forms\ProductOrderForm;
use app\modules\adm\forms\search\OrderListSearch;
use phpDocumentor\Reflection\Types\Mixed_;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class OrderController extends Controller
{

    public function actionList()
    {
        $searchModel = new OrderListSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->get());
//        $dataProvider->sort->defaultOrder['status'] = SORT_ASC;
        $dataProvider->sort->defaultOrder['date'] = SORT_DESC;



        return $this->render('list', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
        if (!$searchModel) {
            new NotFoundHttpException();
        }
    }

    public function actionStatus($id, $status)
    {
      $models = Order::findOne(['id' => $id]);
      $models->status = $status;
      $models->save();
        return $this->redirect(Url::to('list'));
    }

    public function actionDelete($id, $order_id){

        ProductOrder::deleteAll(['product_id' => $id,'order_id'=>$order_id]);

        return $this->redirect(Url::to(['edit','id'=> $order_id]));
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionAdd($id = null) {
        $addForm = new AddOrderForm();
        if ($user = User::findOne(['id'=>$id])) {
            $addForm->name = $user->name;
            $addForm->user_id = $user->id;
            $addForm->last_name = $user->last_name;
            $addForm->email = $user->email;
            $addForm->address = $user->address;
            $addForm->phone = $user->phone;

        }

        if ($addForm->load(\Yii::$app->getRequest()->post()) && $addForm->validate()) {

            if ($addForm->process()){


                return $this->redirect(Url::to(['user/more','id'=>$user->id]));
            }
            \Yii::$app->getSession()->addFlash('error', 'Внутреняя ошибка');
        }

        return $this->render('add', ['addForm' => $addForm]);
    }

    public function actionProduct($id) {

        $orders = Order::findOne($id);

        if ($orders->status !== Order::STATUS_IN_PROCESSING){
            return $this->redirect(Url::to(['list']));
        }

        if (!$orders) {
            return $this->redirect(Url::to('list'));
        }
        $productForm = new ProductOrderForm();

        $productForm->order_id = $id;

        if ($productForm->load(\Yii::$app->getRequest()->post()) && $productForm->validate()) {
            if ($productForm->process()){
                return $this->redirect(Url::to(['more', 'id' => $id]));
            }
            \Yii::$app->getSession()->addFlash('error', 'Внутреняя ошибка');
        }



        return $this->render('product', [
            'productForm' => $productForm,
            'model' => $orders,
        ]);


    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionMore($id)
    {
        $modelOrder = Order::findOne(['id' => $id]);
        $count = ProductOrder::findAll(['order_id'=>$id]);

        if (!$modelOrder) {
            throw new NotFoundHttpException();
        }


        return $this->render('more',[
                'model' => $modelOrder,
                'count' => $count,
            ]);
    }

    public function actionEdit($id)
    {
        $orders = Order::findOne($id);

        if (!$orders) {
            return $this->redirect(Url::to('list'));
        }
        $editForm = new EditOrderForm($orders);

        if ($editForm->load(\Yii::$app->getRequest()->post()) && $editForm->validate()) {
            if ($editForm->process()){
                return $this->redirect(Url::to(['edit', 'id' => $id]));
            }
            \Yii::$app->getSession()->addFlash('error', 'Внутреняя ошибка');
        }
        if ($orders->status !== Order::STATUS_IN_PROCESSING){
            return $this->redirect(Url::to(['list']));
        }

        return $this->render('edit', [
            'editForm' => $editForm,
            'model' => $orders,
        ]);



    }


    public function actionCount($id, $order_id, $count_product)
    {

        ProductOrder::updateAll(['count_product' => $count_product], ['product_id'=> $id,'order_id'=>$order_id]);

        return $this->redirect(Url::to(['product', 'id' => $order_id]));

    }


    public function actionChange($id, $order_id, $count_product)
    {

        ProductOrder::updateAll(['count_product' => $count_product], ['product_id'=> $id,'order_id'=>$order_id]);

        return $this->redirect(Url::to(['edit', 'id' => $order_id]));



    }


}