<?php

/**
 * @var ActiveDataProvider      $dataProvider
 * @var OrderListSearch       $searchModel
 */

use app\models\Order;
use app\modules\adm\forms\search\OrderListSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Список заказов';
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
                        'date',
                        [

                            'header' => 'Статус',
                            'filter' => \kartik\select2\Select2::widget([
                            'data'   => Order::STATUS_LIST,
                                'model' => $searchModel,
                                'attribute' => 'status',
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'placeholder' => 'Выберите подук',
                                    'multiple' => true,
                                ],
                            ]),
                            'value'  => function (OrderListSearch $model) {
                                return $model->getTextStatus();
                            },
                                   'contentOptions' => function ($searchModel) {
                           if ($searchModel['status'] == 1 ) {
                                $class = 'success';
                           }
                           else if ($searchModel['status'] == 2 ) {
                                $class = 'danger';
                           }else if ($searchModel['status'] == 5 ) {
                                $class = 'primary';
                           }else {$class = 'warning';
                           }
                            return ['class' => $class];
                       },
                        ],

                        'user_id',
                        'address',
                        'name',
                        'phone',


                        [
                            'header' => '<i class="fa fa-gear"/>',
                            'format' => 'raw',
                            'value'  => function (OrderListSearch $model) {

                                $result = '';
                                if ($model->status == Order::STATUS_NEW || $model->status == Order::STATUS_IN_PROCESSING){
                                    $result .= Html::a('Отказ', Url::to(['status','id'=>$model->id, 'status'=> Order::STATUS_REJECT]),['class' => 'btn btn-danger btn-sm']);
                                }
                                if ($model->status == Order::STATUS_NEW || $model->status == Order::STATUS_DELIVERY){
                                    $result .= Html::a('В работу', Url::to(['status','id'=>$model->id, 'status'=> Order::STATUS_IN_PROCESSING]),['class' => 'btn btn-success btn-sm']);
                                }
                                if ($model->status == Order::STATUS_REJECT){
                                    $result .=  Html::a('Новый', Url::to(['status','id'=> $model->id, 'status'=> Order::STATUS_NEW]),['class' => 'btn btn-warning btn-sm']);
                                }
                                if ($model->status == Order::STATUS_IN_PROCESSING){
                                    $result .= Html::a('Доставка', Url::to(['status','id'=>$model->id, 'status'=> Order::STATUS_DELIVERY]),['class' => 'btn btn-primary btn-sm']);
                                }
                                if ($model->status == Order::STATUS_DELIVERY){
                                    $result .= Html::a('Выполнен', Url::to(['status','id'=>$model->id, 'status'=> Order::STATUS_SUCCESS]),['class' => 'btn btn-success btn-sm']);
                                }
                                if ($model->status == Order::STATUS_SUCCESS  ){
                                    $result .= 'Успешно отправлен';
                                }

                                return $result;

                            },
                        ],
                        [
                            'header' => 'О заказе',
                            'format' => 'raw',
                            'value'  => function (OrderListSearch $model) {
                                if ($model->status == Order::STATUS_NEW || $model->status == Order::STATUS_IN_PROCESSING){
                                    return Html::a('Подробней', Url::to(['more','id'=>$model->id]),['class' => 'btn btn-success btn-sm']);
                                }
                            },

                        ],
                    ],
                ])?>

            </div>
        </div>
    </div>
</div>
