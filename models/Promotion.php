<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Product;

/**
 * @property integer     $id
 * @property integer     $product_id
 * @property integer     $rate
 * @property integer     $date_from
 * @property integer     $date_to
 * @property Product []    $title

 */


class Promotion extends ActiveRecord
{
    public static function tableName()
    {
        return 'promotion';
    }

    public function rules(): array
    {
        return [
          [['id','product_id','rate'],'safe'],
          [['date_from','date_to'],'string'],
        ];

    }

    public function attributeLabels()
    {
        return [
            'id' => 'Код',
            'product_id' => 'Выберите продукт',
            'rate' =>'Процент скидки',
            'date_from' => 'Дата начала акции',
            'date_to' => 'Дата конца акции',
        ];
    }


}