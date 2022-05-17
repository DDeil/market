<?php

namespace app\controllers;

use app\form\OrderForm;
use app\form\UserOrderForm;
use app\models\User;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\Product;
use app\models\Cart;
use Yii;

class CartController extends Controller
{
    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $qty = Yii::$app->request->get('qty');
        if (!$qty){
          $qty = 1;
        }
        $product = Product::findOne($id);
        if (!$product){
            return false;
        }
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $qty);
        return $this->renderAjax('cart-modal', [
            'session' => $session,
        ]);
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('cart-modal', [
            'session' => $session,
        ]);
    }

    public function actionDelItem(){
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('cart-modal', [
            'session' => $session,
        ]);

    }
    public function actionDel($id){
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        return $this->redirect(Yii::$app->getRequest()->getReferrer());

    }
    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('cart-modal', [
            'session' => $session,
        ]);
    }

    public function actionOrder()
    {
        $session = Yii::$app->session;
        $session->open();

        $id   = Yii::$app->getUser()->id ?? null;
        $user = User::findOne(['id' => $id]);
        $orderForm = new UserOrderForm($user);

        if ($orderForm->load(\Yii::$app->getRequest()->post()) && $orderForm->validate()) {
            if ($orderForm->process($session)) {
                return $this->redirect(Url::to('order'));
            }
        }
        return $this->render('order', [
            'orderForm' => $orderForm,
            'session' => $session,
        ]);
    }

    public function actionPlus($countPlus, $id)
    {
        $col = $countPlus +1;
        $session = Yii::$app->session;
        $session->open();

        foreach ($session['cart'] as $ids =>  $item){
            if ($ids == $id){
                $item['qty']= $col;
                $_SESSION['cart'][$id] = [
                    'qty' =>  $item['qty'],
                    'name' =>  $item['name'],
                    'price' =>  $item['price'],
                    'image' =>  $item['image'],
                ];
                $_SESSION['cart.qty'] += 1;
                $_SESSION['cart.sum'] += $item['price'];
            }
        }
        return $this->redirect(Url::to('order'));
    }

    public function actionMinus($countMinus, $id)
    {
        $col = $countMinus -1;
        $session = Yii::$app->session;
        $session->open();
        if ($col>=1){
            foreach ($session['cart'] as $ids =>  $item){
                if ($ids == $id){
                    $item['qty']= $col;
                    $_SESSION['cart'][$id] = [
                        'qty' =>  $item['qty'],
                        'name' =>  $item['name'],
                        'price' =>  $item['price'],
                        'image' =>  $item['image'],
                        ];
                    $_SESSION['cart.qty'] -= 1;
                    $_SESSION['cart.sum'] -= $item['price'];
                }
            }
        }
        return $this->redirect(Url::to('order'));
    }
}