<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Product;

/**
 * @property integer     $id
 * @property integer     $product_id
 * @property integer     $rate
 * @property integer     $date_begin
 * @property integer     $date_end
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
          [['date_begin','date_end'],'string'],
        ];

    }

    public function attributeLabels()
    {
        return [
            'id' => 'Код',
            'product_id' => 'Выберите продукт',
            'rate' =>'Процент скидки',
            'date_begin' => 'Дата начала акции',
            'date_end' => 'Дата конца акции',
        ];
    }


}