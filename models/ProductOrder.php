<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;


/**
 *
 * Class ProductOrder
 * @package app\models
 *
 * @property integer    $product_id
 * @property integer    $order_id
 * @property integer    $count_product
 * @property integer    $promo_price
 *
 * @property Product    $product
 * @property Order      $order
 * @property Product    $price
 */

class ProductOrder extends ActiveRecord
{

    /**
     * @return string
     */

    public static function tableName(): string
    {
        return 'product_order';
    }
    public function rules(): array
    {
        return [
            [['product_id','order_id','count_product','promo_price'],'safe'],

        ];

    }
    /**
     * @return ActiveQuery
     */
    public function getProduct(): ActiveQuery
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getOrder(): ActiveQuery
    {
        return $this->hasOne(Order::class, ['id'=>'order_id']);
    }
    public function getCount(): ActiveQuery
    {
        return $this->hasOne(ProductOrder::class, ['count_product']);
    }



}