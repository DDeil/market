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
    public $date_begin;
    public $date_end;


    public function rules(): array
    {
        return [
            [['product_id'],"safe"],
            [['rate'],"integer"],
            [['date_begin','date_end'],'date', 'format'=>'Y-m-d'],

        ];
    }
    public function attributeLabels()
    {
        return [
            'product_id' => 'Выберите продукт',
            'rate' =>'Процент скидки',
            'date_begin' => 'Дата начала акции',
            'date_end' => 'Дата конца акции',
        ];
    }
    public function process(): bool
    {
        $promotion = new Promotion();
        $product = Product::findOne(['id'=>$this->product_id]);
        $promo = Promotion::findAll(['product_id' => $product->id]);
        foreach ($promo as $value){
            if ( strtotime($value->date_end) >= strtotime($this->date_begin) ){
                return false;
            }
        }
        $promotion->product_id = $product->id;
        $promotion->rate = (int)$this->rate;
        $promotion->date_begin =$this->date_begin;
        $promotion->date_end = $this->date_end;

        $promotion->save();

    return true;
    }
}