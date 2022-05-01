<?php

namespace app\modules\adm\forms\search;

use app\models\Order;
use yii\data\ActiveDataProvider;

class OrderListSearch extends Order
{

    public function rules()
    {
        return [
            [['id','user_id','phone'],'integer'],
            [['date'],'date'],
            ['status', 'boolean'],
            [['address','name'],'string'],
        ];
    }

    /**
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = self::find()->alias('o');
        $this->load($params);

        $query->andFilterWhere(['o.id' => $this->id]);
        $query->andFilterWhere(['o.status' => $this->status]);
        $query->andFilterWhere(['o.user_id' => $this->user_id]);
        $query->andFilterWhere(['LIKE','o.address',$this->address]);
        $query->andFilterWhere(['LIKE','o.name',$this->name]);
        $query->andFilterWhere(['LIKE','o.phone',$this->phone]);

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }
}