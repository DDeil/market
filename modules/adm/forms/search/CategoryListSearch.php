<?php

namespace app\modules\adm\forms\search;

use app\models\Category;
use yii\data\ActiveDataProvider;

class CategoryListSearch extends Category
{


    /**
     * @return ActiveDataProvider
     */
    public function search(array $params): ActiveDataProvider
    {

        $query = self::find()->alias('c');
        $this->load($params);

        if ($this->name){
            $query->andWhere(['c.name' => $this->name]);
        }

        $query->andFilterWhere([ 'c.status' => $this->status]);
        $query->andFilterWhere([ 'c.id' => $this->id]);

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }
}