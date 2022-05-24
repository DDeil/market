<?php

namespace app\modules\adm\controllers;

use app\form\EditForm;
use app\form\LoginForm;
use app\models\Order;
use app\models\ProductOrder;
use app\models\User;
use app\modules\adm\forms\AddUserForm;
use app\modules\adm\forms\search\UserListSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;
class UserController extends Controller
{
    public function actionList()
    {

        $searchModel = new UserListSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->get());

        $dataProvider->sort->defaultOrder['id'] = SORT_DESC;

        return $this->render('list', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
            ]);
    }

    public function actionAdd()
    {
        $addForm = new AddUserForm();

        if ($addForm->load(\Yii::$app->getRequest()->post()) && $addForm->validate()) {
            if ($addForm->process()){
                return $this->redirect(Url::to(['list']));
            }
            \Yii::$app->getSession()->addFlash('error', 'Внутреняя ошибка');
        }

        return $this->render('add', ['addForm' => $addForm]);
    }

    public function actionMore ($id)
    {
        $modelOrder = Order::findAll(['user_id' => $id]);
        $user = User::findOne(['id'=>$id]);

        if ($user->load(Yii::$app->getRequest()->post()) && $user->validate()) {
            $user->save();
        }
        krsort($modelOrder);
        return $this->render('more',
            [
            'model' => $modelOrder,
            'user'  => $user,
            ]);
    }

    public function actionAdmin($id)
    {
       $user       = User::findOne(['id' => $id]);
       $user->type = User::TYPE_ADM;
       if(!$user->save()){
           return false;
       }
        return $this->redirect(Url::to(['more', 'id'=>$id]));
    }

}