<?php

namespace app\form;

use app\models\Order;
use app\models\ProductOrder;
use app\models\User;
use yii\base\Model;
use Yii;

class UserOrderForm extends Model
{
    public $address;
    public $id;
    public $name;
    public $phone;

    public $status = 1;

    private $user;

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

    public function __construct(User $user = null)
    {
        if (!$user) {
            return;
        }
        $this->address = $user->address;
        $this->name = $user->name;
        $this->phone = $user->phone;
        $this->id = $user->id;

        $this->user = $user;
    }

    public function process($session)
    {
        $order = new Order();

        $order->name = $this->name;
        $order->user_id = $this->id ?? null;
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