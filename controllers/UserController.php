<?php

namespace app\controllers;


use app\models\Order;
use app\form\EditForm;
use app\form\UserForm;
use app\form\RegistrationForm;
use app\form\LoginForm;
use app\models\Category;
use app\models\News;
use app\models\ProductOrder;
use app\models\User;
use yii\helpers\Url;
use yii\web\Controller;
use Yii;



class UserController extends Controller
{
    public function actionIndex(): string
    {
        $categories = Category::findAll(['status' => true]);
        $news       = News::findAll(['status' => News::STATUS_ACTIVE]);

        return $this->render('index', [
            'categories' => $categories,
            'news'       => $news,
        ]);
    }

    public function actionLogin()
    {
        $url = \Yii::$app->getRequest()->getReferrer();

        if (!\Yii::$app->getRequest()->isPost){
            \Yii::$app->getSession()->set('lr',$url);
        }

        $loginForm = new LoginForm();
        if ($loginForm->load(\Yii::$app->getRequest()->post()) && $loginForm->validate()) {

            if ($loginForm->process()) {

                return $this->redirect(\Yii::$app->getSession()->get('lr'));
            }
            \Yii::$app->getSession()->addFlash('error', 'Внутреняя ошибка');

        }
        return $this->render('login', [
            'loginForm' => $loginForm,
        ]);
    }

    public function actionUser($id)
    {

        $modelUser = User::findOne($id);

        return $this->render('user',[
            'model' => $modelUser,
        ]);

    }

    public function actionMore($id)
    {
        $modelOrder = Order::findOne(['id' => $id]);
        $count = ProductOrder::findAll(['order_id'=>$id]);

        return $this->render('more',[
            'model' => $modelOrder,
            'count' => $count,
        ]);
    }

    public function actionEdit($id)
    {
        $user = User::findOne($id);

        if (!$user) {
            return $this->redirect(Url::to('user'));
        }
        $editForm = new EditForm($user);

        if ($editForm->load(\Yii::$app->getRequest()->post()) && $editForm->validate()) {
            if ($editForm->process()) {
                return $this->redirect(Url::to(['user', 'id' => $id]));
            }
            \Yii::$app->getSession()->addFlash('error', 'Внутреняя ошибка');
        }

        return $this->render('edit', [
            'editForm' => $editForm,
            'model' => $user,
        ]);
    }

    public function actionLogout($id)
    {
        $user = User::findOne($id);
        \Yii::$app->user->logout($user);
        return $this->redirect(Url::to(['login']));

    }
    public function actionRegistration()
    {

        $registrationForm = new RegistrationForm();

        if ($registrationForm->load(\Yii::$app->getRequest()->post()) && $registrationForm->validate()) {
            if ($registrationForm->process()) {

                return $this->redirect(\Yii::$app->getRequest()->getReferrer());
            }
        }
            return $this->render('registration', [
                'registrationForm' => $registrationForm,
            ]);
    }
}