<?php

/**
 * @var Order $model
 *
 */

use app\modules\adm\forms\search\OrderListSearch;
use app\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;



$this->title = 'O заказов';
?>

<div class="box">
    <div class="box-header">
        <div class="row">
            <div class="col-sm-12">
                <?= Html::a('Редактировать', Url::to(['edit','id'=>$model->id]), ['class' => 'btn btn-success'])?>
                <?= Html::a('Назад',Yii::$app->getRequest()->getReferrer(), ['class' => 'btn btn-success'])?>
                <?= Html::a('Добавить продукт', Url::to(['product','id'=>$model->id]), ['class' => 'btn btn-success'])?>
                <?php if ($model->status == Order::STATUS_NEW){?>
                    <?= Html::a('В работу', Url::to(['status','id'=>$model->id, 'status'=> Order::STATUS_IN_PROCESSING]),['class' => 'btn btn-success'])?>
                <?php }
                ?>
            </div>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <?php
                echo DetailView::widget([

                    'model' => $model,
                    'attributes' => [
                            'id',
                            'textStatus',
                            'user_id',
                            'address',
                            'name',
                            'phone',
                    ],
                ]); ?>
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered detail-view" >
                        <tbody>
                            <tr>
                                <th>Код продукта</th>
                                <th>Название продуката</th>
                                <th>Описание</th>
                                <th>Количество</th>
                                <th>Цена</th>
                                <th>Изображение</th>
                                <th>Сумма</th>
                            </tr>
                        <?php foreach ($model->product as $product) {
                                foreach ($model->productOrder as $productOrder){
                                    if ($productOrder->product_id == $product->id){
                                ?>
                            <tr>
                                <td><?=$product->id?></td>
                                <td><?=$product->title?></td>
                                <td><?=$product->description?></td>
                                <td><?=$productOrder->count_product?></td>
                                <td><?=$product->price?></td>
                                <td><?=\yii\helpers\Html::img('/image/product/' . $product->image, ['style' => 'width: 55px']);?></td>
                                <td><?=$product->price*$productOrder->count_product?></td>                            </tr>
                        <?php }}} ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
