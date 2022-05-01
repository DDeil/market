<?php

/**
 * @var ActiveDataProvider  $dataProvider
 * @var ProductSearch       $searchModel
 */

use app\modules\adm\forms\search\ProductSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

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
                        [
                            'header' => 'Статус',
                            'filter' => \kartik\select2\Select2::widget([
                                'data' => \app\models\Category::STATUS_LIST ,
                                'model' => $searchModel,
                                'attribute' =>'status',
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'placeholder' => 'Выберите статус',
                                    'multiple' => true,
                                ],
                            ]),
                            'value'  => function (ProductSearch $model) {
                                return $model->getTextStatus();
                            },
                            'contentOptions' => function ($searchModel) {
                                if ($searchModel['status'] == 1 ) {
                                    $class = 'success';
                                } else {$class = 'danger';
                                }
                                return ['class' => $class];
                            },
                        ],
                        'price',
                        [
                            'header' => 'Категория',
                            'filter' =>\kartik\select2\Select2::widget([
                                'data' => \app\models\Category::find()->select(['name'])->indexBy('name')->column() ,
                                'model' => $searchModel,
                                'attribute' =>'categorys',
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'placeholder' => 'Выберите статус',
                                    'multiple' => true,
                                ],
                            ]),
                            'value'  => function (ProductSearch $model) {
                                $name = '';
                                foreach ($model->category as $category) {
                                    $name .= $category->name . ', ';
                                }
                                if ($name) {
                                    return $name;
                                }
                                return 'Не заданно';
                            },
                        ],
                        [
                            'header' => 'Image',
                            'format' => 'raw',
                            'value'  => function (ProductSearch $model) {
                                return \yii\helpers\Html::img('/image/product/' . $model->image, ['style' => 'width: 55px']);
                            },
                        ],
                        [

                            'header' => '<i class="fa fa-gear"/>',
                            'format' => 'raw',
                            'value'  => function (ProductSearch $model) {

                                return Html::a('<i class="fa fa-trash"></i>', Url::to(['delete','id'=>$model->id]))
                                    .' | '. Html::a('<i class="fa fa-pencil"></i>', Url::to(['edit','id'=>$model->id]));
                            },
                        ],
                    ],
                ])?>
            </div>
        </div>
    </div>
</div>