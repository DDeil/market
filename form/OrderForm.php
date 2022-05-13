<?php

namespace app\form;

use app\models\Order;
use Yii;
use app\models\ProductOrder;
use yii\base\Model;

class OrderForm extends Model
{



    public $name;
    public $phone;
    public $address;
    public $status = Order::STATUS_NEW;


    public function rules(): array
    {
        return [
            [['name','address'], 'safe'],
            [['phone'], 'integer'],

        ];
    }

    public function attributeLabels(): array
    {
        return [

            'name' => 'Имя',
            'phone' => 'Телефон',
            'address' => 'Адрес',

        ];
    }

    public function process($session)
    {

            $order = new Order();

            $order->name = $this->name;
            $order->phone = $this->phone;
            $order->address = $this->address;
            $order->status = $this->status;
            $order->date = date("Y-m-d  H:i:s");


        if ($order->save()) {
        $this->saveOrderItems($session['cart'], $order->id);
        $session->remove('cart');
        $session->remove('cart.sum');
        $session->remove('cart.qty');

        }
    }

    public function saveOrderItems($items, $order_id){

        foreach ($items as $id => $item) {

            $productOrder = new ProductOrder();

            $productOrder->product_id = $id;
            $productOrder->order_id = $order_id;
            $productOrder->count_product = $item['qty'];
            if ($productOrder->save()) {
                Yii::$app->session->setFlash('success', 'Ваш заказа принят, мэнэджер мвяжиться с вами');
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка, мэнэджер мвяжиться с вами');
            }
        }
    }
}