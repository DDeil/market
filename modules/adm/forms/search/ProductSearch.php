<?php

namespace app\modules\adm\forms\search;

use app\models\Product;
use yii\data\ActiveDataProvider;

class ProductSearch extends Product
{

    public function search()
    {
        $query = self::find();

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }
}