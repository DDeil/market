<?php

namespace app\modules\adm\forms;

use app\models\ProductOrder;
use app\models\Order;
use yii\base\Model;

class EditOrderForm extends Model
{

    public $status;
    public $user_id;
    public $address;
    public $name;
    public $phone;
    public $product_ids;
    public $count_product;

    private $orders;

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['name', 'phone', 'address'], 'string'],
            [['status','user_id'], 'integer'],
            [['product_ids','count_product'], 'safe'],
        ];
    }

    public function __construct(Order $orders)
    {

        $this->status = $orders->status;
        $this->user_id = $orders->user_id;
        $this->address = $orders->address;
        $this->name = $orders->name;
        $this->phone = $orders->phone;

        $this->orders = $orders;

    }

    public function attributeLabels()
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

    public function process()
    {

        $orderModel = $this->orders;

        $orderModel->status  = $this->status ;
        $orderModel->user_id = $this->user_id ;
        $orderModel->address = $this->address ;
        $orderModel->name    = $this->name ;
        $orderModel->phone   = $this->phone ;


        $orderModel->save();


        if (is_array($this->product_ids)){
            foreach ($this->product_ids as $product_id){
                $this->createProductId($product_id, $orderModel->id);

            }
        };
        return true;
    }


    private function createProductId($product_id, int $order_id)
    {
        $productId = new ProductOrder();

        $productId->product_id  = $product_id;
        $productId->order_id  = $order_id;
        $productId->count_product  = '1';

        $productId->save();
        return true;
    }

}