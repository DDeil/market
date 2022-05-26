<?php

/**
  * @var \app\models\Promotion $model
 * @var ActiveDataProvider      $dataProvider
 * @var PromotionListSearch      $searchModel
 */

use app\modules\adm\forms\search\PromotionListSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Акционные товары';
?>

<div class="box">
    <div class="box-header">
        <div class="row">
            <div class="col-sm-3">
                <?= Html::a('Добавить', Url::to(['add']), ['class' => 'btn btn-success'])?>

            </div>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel'  => $searchModel,

                    'columns'      => [
                        [
                            'attribute'=>'id',
                        ],
                        [
                                'attribute'=> 'product_id',
                        ],
                        'rate',
                        'date_from',
                        'date_to',
                    ],
                ])?>
            </div>
        </div>
    </div>
</div>
