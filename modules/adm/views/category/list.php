<?php

/**
 * @var ActiveDataProvider      $dataProvider
 * @var CategoryListSearch      $searchModel
 */

use app\modules\adm\forms\search\CategoryListSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Список категорий';
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
                        'id',
                        [
                            'attribute' => 'name',
                            'filter' => \kartik\select2\Select2::widget([
                                'data' => \app\models\Category::find()->select(['name'])->indexBy('name')->column()  ,
                                'model' =>$searchModel,
                                'attribute' => 'name',
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'placeholder' => 'Выберите подук',
                                    'multiple' => true,
                                ],
                            ]),
                        ],
                        [
                            'header' => 'Статус',
                            'filter' => \kartik\select2\Select2::widget([
                                'data' => \app\models\Category::STATUS_LIST ,
                                'model' => $searchModel,
                                'attribute' =>'status',
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'placeholder' => 'Выберите подук',
                                    'multiple' => true,
                                ],
                            ]),
                            'value'  => function (CategoryListSearch $model) {
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
                        [
                            'header' => '<i class="fa fa-gear"/>',
                            'format' => 'raw',
                            'value'  => function (CategoryListSearch $model) {

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
