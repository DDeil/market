<?php

namespace app\modules\adm\forms\search;

use app\models\Promotion;
use yii\data\ActiveDataProvider;

class PromotionListSearch extends Promotion
{
    public function search(array $params): ActiveDataProvider
    {

        $query = self::find()->alias('p');
        $this->load($params);

        if ($this->id){
            $query->andWhere(['p.product_id' => $this->id]);
        }

        $query->andFilterWhere([ 'p.rate' => $this->rate]);
        $query->andFilterWhere([ 'p.date_from' => $this->date_begin]);
        $query->andFilterWhere([ 'p.date_to' => $this->date_end]);

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }
}