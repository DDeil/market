<?php

namespace app\modules\adm\forms;

use app\models\Product;
use app\models\Promotion;
use yii\base\Model;

class AddPromotionForm extends Model
{
    public $id;
    public $product_id;
    public $rate;
    public $date_from;
    public $date_to;

    public function rules(): array
    {
        return [
            [['product_id'],"safe"],
            [['rate'],"integer"],
            [['date_from','date_to'],'string'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'product_id' => 'Выберите продукт',
            'rate' =>'Процент скидки',
            'date_from' => 'Дата начала акции',
            'date_to' => 'Дата конца акции',
        ];
    }
    public function process(): bool
    {
        $promotion = new Promotion();
        $product = Product::findOne(['id'=>$this->product_id]);
        $promo = Promotion::findAll(['product_id' => $product->id]);
        foreach ($promo as $value){
            if ( strtotime($value->date_to) >= strtotime($this->date_from) ){
                return false;
            }
        }

        $promotion->product_id = $product->id;
        $promotion->rate = (int)$this->rate;
        $promotion->date_from =$this->date_from;
        $promotion->date_to = $this->date_to;

        $promotion->save();

    return true;
    }
}