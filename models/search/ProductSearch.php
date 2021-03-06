<?php

namespace app\models\search;

use app\models\Category;
use app\models\Product;
use app\models\ProductCategory;
use yii\base\Model;

class ProductSearch extends Model
{

    public $priceFrom;
    public $priceTo;
    public $category;
    public $title;

    public function rules()
    {
        return [
            [['priceFrom', 'priceTo', 'category', 'title'], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title'     => 'Название',
            'category'  => 'Категория',
            'priceFrom' => 'Цена от',
            'priceTo'   => 'Цена до',
        ];
    }

    public function search(array $params)
    {
        $query = Product::find()->alias('p');

        $this->load($params);

        if ($this->category) {
            $query->leftJoin(ProductCategory::tableName() . ' pc', 'pc.product_id = p.id');
            $query->leftJoin(Category::tableName() . ' c', 'c.id = pc.category_id');
            $query->andWhere(['c.name' => $this->category]);
        }

        $query->andFilterWhere(['LIKE', 'p.title', $this->title]);

        return $query->all();
    }
}