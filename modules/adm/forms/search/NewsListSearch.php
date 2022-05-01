<?php

namespace app\modules\adm\forms\search;

use app\models\News;
use yii\data\ActiveDataProvider;

class NewsListSearch extends News
{



    public function search($params)
    {


        $query = self::find()->alias('n');

        $this->load($params);

        $query->andFilterWhere(['n.id' => $this->id]);
        $query->andFilterWhere(['LIKE','n.title', $this->title]);


        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }
}