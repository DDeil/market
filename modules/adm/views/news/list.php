<?php

/**
 * @var ActiveDataProvider      $dataProvider
 * @var NewsListSearch          $searchModel
 */

use app\modules\adm\forms\search\NewsListSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Список новостей';
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
                        'title',
                        [
                            'header' => 'Статус',
                            'value'  => function (NewsListSearch $model) {
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
                            'header' => 'Image',
                            'format' => 'raw',
                            'value'  => function (NewsListSearch $model) {
                                return Html::img('/image/news/' . $model->image, ['style' => 'width: 55px']);

                            },
                        ],
                        [
                            'header' => '<i class="fa fa-gear"/>',
                            'format' => 'raw',
                            'value'  => function (NewsListSearch $model) {

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
