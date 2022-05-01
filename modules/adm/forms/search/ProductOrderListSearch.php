<?php

namespace app\modules\adm\forms\search;

use app\models\ProductOrder;
use yii\data\ActiveDataProvider;
use app\modules\adm\controllers\OrderController;

/**
 * @var OrderController $model
 * @var OrderController $dataProvider
 *

 */
class ProductOrderListSearch extends ProductOrder
{

    /**
     * @return ActiveDataProvider
     */
    public function search($id)
    {
        $query = self::find();

        return new ActiveDataProvider([
            'query' => $query->where(['order_id'=> $id]),
        ]);
    }
}