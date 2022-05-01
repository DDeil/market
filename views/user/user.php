<?php
/**
 * @var \app\models\User $model
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->title = 'O заказов';
?>

    <div class="box-body">
        <div class="row">
            <div class="col-sm-6">

                <?= Html::a('Редактировать', Url::to(['edit','id'=>$model->id]), ['class' => 'btn btn-success'])?>

                <?php

                echo DetailView::widget([

                    'model' => $model,
                    'attributes' => [
                        'email',
                        'password',
                        'name',
                        'last_name',
                        'phone',
                        'address',
                    ],
                ]); ?>
            </div>
        </div>
    </div>
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered detail-view" >
                        <tbody>
                        <tr>
                            Заказы
                        </tr>
                        <tr>
                            <th>Код заказа</th>
                            <th>Дата и время </th>
                            <th>Статус</th>
                            <th>Поддробнее о заказе</th>
                        </tr>
                        <?php
                        foreach ($model->orders as $order) {
                                    ?>
                                    <tr>
                                        <td><?=$order->id?></td>
                                        <td><?=$order->date?></td>
                                        <td><?=$order->getTextStatus()?></td>
                                        <td>
                                            <?= Html::a('Подробно', Url::to(['more','id'=>$order->id]), ['class' => 'btn btn-success'])?>
                                        </td>
                                    </tr>
                                <?php  } ?>
                        </tbody>
                    </table>
                </div>

