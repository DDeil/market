<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property integer    $id
 * @property integer    $product_id
 * @property integer    $status
 * @property integer    $user_id
 * @property string     $address
 */

class Order extends ActiveRecord
{

    public const STATUS_NEW     = 1;
    public const STATUS_REJECT  = 2;
    public const STATUS_SUCCESS = 3;

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'order';
    }
}