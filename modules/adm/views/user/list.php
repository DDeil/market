<?php

/**
 * @var ActiveDataProvider      $dataProvider
 * @var UserListSearch      $searchModel
 */

use app\modules\adm\forms\search\UserListSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Список пользавателей';
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
                        'name',
                        'last_name',
                        'email',
                        'phone',
                        'password',

                        [
                            'header' => 'О пользователе',
                            'format' => 'raw',
                            'value'  => function (UserListSearch $model) {
                                    return Html::a('<i class="fa fa-list"></i>', Url::to(['more','id'=>$model->id])).' | '.
                                        Html::a('<i class="fa fa-cart-plus"></i>', Url::to(['order/add','id'=>$model->id]));
                            }
                        ],
                    ],
                ])?>
            </div>
        </div>
    </div>
</div>
