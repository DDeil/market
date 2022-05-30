<?php

namespace app\modules\adm\forms;

use app\models\Order;
use app\models\Product;
use app\models\ProductOrder;
use phpDocumentor\Reflection\Types\Null_;
use yii\base\Model;
use app\models\Promotion;

class ProductOrderForm extends Model
{

    public $count_product  ;
    public $order_id ;
    public $product_id;
    public $promo_price;

    public function rules(): array
    {
        return [
            [['count_product','order_id','promo_price'], 'safe'],
            [['product_id'], 'safe'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'product_id'    => 'Код или название продукта',
            'count_product' => 'Количество',

        ];
    }

    public function process(): bool
    {
        $productOrder = ProductOrder::findOne(['order_id' => $this->order_id, 'product_id' => $this->product_id]);
        $product = Product::findOne(['id' => $this->product_id]);

        if (!$productOrder) {
            $productOrder = new ProductOrder();

            $productOrder->product_id    = $this->product_id;
            $productOrder->order_id      = $this->order_id;
            $productOrder->count_product = $this->count_product;

            if ($promo = Promotion::findOne(["product_id" => $this->product_id])) {
                $productOrder->promo_price = $product->price - $product->price * ($promo->rate / 100);
            }else{
                $productOrder->promo_price = $product->price;
            }

            return $productOrder->save();
        }

        return (boolean)ProductOrder::updateAll(['count_product' =>  $productOrder->count_product + $this->count_product], ['product_id'=> $this->product_id,'order_id'=>$this->order_id]);
    }

}