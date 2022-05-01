<?php

namespace app\modules\adm\forms\search;

use app\models\Category;
use app\models\Product;
use app\models\ProductCategory;
use yii\data\ActiveDataProvider;

class ProductSearch extends Product
{
    public $categorys;

    public function rules()
    {
        return [
            [['title', 'description', 'categorys'], 'string'],
            [['id','price','type', 'status'], 'integer'],
            [['is_hit', 'is_new'], 'boolean'],
        ];
    }

    public function search(array $params)
    {
        $query = self::find()->alias('p');

        $this->load($params);

        if ($this->categorys) {
            $query->leftJoin(ProductCategory::tableName() . ' pc', 'pc.product_id = p.id');
            $query->leftJoin(Category::tableName() . ' c', 'c.id = pc.category_id');
            $query->andWhere(['c.name' => $this->categorys]);
        }

        $query->andFilterWhere([ 'p.status' => $this->status]);
        $query->andFilterWhere([ 'p.id' => $this->id]);
        $query->andFilterWhere(['LIKE', 'p.title', $this->title]);

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }
}