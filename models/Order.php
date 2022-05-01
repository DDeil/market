<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property integer    $id
 * @property boolean    $status
 * @property string     $textStatus
 * @property integer    $user_id
 * @property string     $address
 * @property string     $name
 * @property string     $phone
 * @property string     $date
 *
 * @property ProductOrder[]     $productOrder
 * @property Product[]          $product
 */

class Order extends ActiveRecord
{

    public const STATUS_NEW             = 1;
    public const STATUS_REJECT          = 2;
    public const STATUS_SUCCESS         = 3;
    public const STATUS_IN_PROCESSING   = 4;
    public const STATUS_DELIVERY        = 5;

    public const TITLE_STATUS_NEW               = 'Новый';
    public const TITLE_STATUS_REJECT            = 'Отказ';
    public const TITLE_STATUS_SUCCESS           = 'Выполнен';
    public const TITLE_STATUS_IN_PROCESSING     = 'В работе';
    public const TITLE_STATUS_DELIVERY          = 'Передан на доставку';

    public const STATUS_LIST = [
        self::STATUS_NEW           => self::TITLE_STATUS_NEW,
        self::STATUS_REJECT        => self::TITLE_STATUS_REJECT,
        self::STATUS_SUCCESS       => self::TITLE_STATUS_SUCCESS,
        self::STATUS_IN_PROCESSING => self::TITLE_STATUS_IN_PROCESSING,
        self::STATUS_DELIVERY      => self::TITLE_STATUS_DELIVERY,
    ];



    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'order';
    }
    public function attributeLabels()
    {
        return[
          'id'      => 'Номер заказа',
          'status'  => 'Статус',
          'textStatus'  => 'Статус',
          'user_id' => 'Код пользователя',
          'address' => 'Адрес',
          'name'    => 'Имя',
          'phone'   => 'Телефон',

        ];
    }
    /**
     * @return string
     */
    public function getTextStatus(): string
    {
        return self::STATUS_LIST[$this->status] ?? 'Статус не известен';
    }

    /**
     * @return ActiveQuery
     */


    public function getProductOrder(): ActiveQuery
    {
        return $this->hasMany(ProductOrder::class,(['order_id' => 'id']));
    }

    /**
     * @return ActiveQuery
     */
    public function getProduct(): ActiveQuery
    {
        return $this->hasMany(Product::class,(['id' => 'product_id']))->via('productOrder');
    }

    /**
     * @param Product $product
     * @return int
     */
    public function getCountProduct(Product $product): int
    {
        $model = ProductOrder::findOne(['product_id' => $product->id, 'order_id' => $this->id]);
        return $model->count_product ?? 0;
    }






}