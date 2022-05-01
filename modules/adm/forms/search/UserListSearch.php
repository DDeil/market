<?php

namespace app\modules\adm\forms\search;

use app\models\Order;
use app\models\ProductOrder;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\data\Sort;

class UserListSearch extends User
{


    /**
     * @return ActiveDataProvider
     */

    public function search(array $params): ActiveDataProvider
    {
        $query = self::find()->alias('u');

        $this->load($params);
        $query->andFilterWhere(['u.id' => $this->id]);
        $query->andFilterWhere(['LIKE', 'u.name', $this->name]);
        $query->andFilterWhere(['LIKE', 'u.last_name', $this->last_name]);
        $query->andFilterWhere(['u.email' => $this->email]);
        $query->andFilterWhere(['LIKE', 'u.phone', $this->phone]);




        return new ActiveDataProvider([
            'query' => $query,
        ]);



    }
}