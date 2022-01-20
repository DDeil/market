<?php
/**
 * @var ActiveDataProvider  $dataProvider
 * @var ProductSearch       $searchModel
 */

use app\modules\adm\forms\search\ProductSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

$this->title = 'Товары';

?>
<div class="box">
    <div class="box-header">
        <div class="row">
            <div class="col-sm-3">
                <?= \yii\helpers\Html::a('Добавить', \yii\helpers\Url::to(['add']), ['class' => 'btn btn-success'])?>
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
                        'id',
                        'title',
                        'status',
                        'price',
                        [
                            'header' => 'Категория',
                            'value'  => function (ProductSearch $model) {
                                return $model->category->name ?? 'Не задано';
                            },
                        ],
                        [
                            'header' => 'Image',
                            'format' => 'raw',
                            'value'  => function (ProductSearch $model) {
                                return \yii\helpers\Html::img('/image/product/' . $model->image, ['style' => 'width: 55px']);
                            },
                        ],
                    ],
                ])?>
            </div>
        </div>
    </div>
</div>