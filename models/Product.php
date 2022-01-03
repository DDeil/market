<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property integer    $id
 * @property string     $title
 * @property string     $description
 * @property float      $price
 * @property integer    $category_id
 * @property string     $image
 */

class Product extends ActiveRecord
{

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'product';
    }

}