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
                        'name',
                        [
                            'header' => 'Статус',
                            'value'  => function (CategoryListSearch $model) {
                                return $model->getTextStatus();
                            }
                        ],
                    ],
                ])?>
            </div>
        </div>
    </div>
</div>
