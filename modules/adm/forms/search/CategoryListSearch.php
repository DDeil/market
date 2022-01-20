<?php

namespace app\modules\adm\forms\search;

use app\models\Category;
use yii\data\ActiveDataProvider;

class CategoryListSearch extends Category
{

    /**
     * @return ActiveDataProvider
     */
    public function search(): ActiveDataProvider
    {
        $query = self::find();

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }
}