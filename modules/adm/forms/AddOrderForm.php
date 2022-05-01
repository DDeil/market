<?php

namespace app\modules\adm\forms;

use app\models\ProductOrder;
use app\models\Order;
use app\models\User;
use phpDocumentor\Reflection\Types\Null_;
use yii\base\Model;
use yii\db\ActiveRecord;

class AddOrderForm extends Model
{

    public $id ;
    public $status;
    public $user_id;
    public $address;
    public $name;
    public $phone;
    public $date;
    public $email;
    public $last_name;


    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['id','name', 'phone', 'address','last_name'], 'string'],
            [['status','user_id'], 'integer'],
            [['product_ids'], 'safe'],
            [['email'], 'email'],
        ];
    }

    public function attributeLabels() : array
    {
        return [
            'status'        => 'Статус',
            'user_id'       => 'Пользователь',
            'address'       => 'Адрес',
            'name'          => 'Имя',
            'phone'         => 'Телефон',
            'product_ids'   => 'Код продукта',
        ];
    }

    public function process(): bool
    {

            $order = new Order();

            $order->status          = Order::STATUS_NEW;
            $order->user_id         = $this->user_id;
            $order->address         = $this->address;
            $order->name            = $this->name;
            $order->phone           = $this->phone;
            $order->date           = date("Y-m-d  H:i:s");

            if (!$order->save()) {
                return false;
            }

        return true;
    }



}