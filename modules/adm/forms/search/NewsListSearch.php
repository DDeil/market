<?php

namespace app\modules\adm\forms\search;

use app\models\News;
use yii\data\ActiveDataProvider;

class NewsListSearch extends News
{

    public function search()
    {
        $query = self::find();

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }
}