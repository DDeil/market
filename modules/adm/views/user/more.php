<?php
/**
 * @var \app\models\User $model
 * @var \app\models\User $user
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->title = 'O пользавателе';
?>

<div class="box-body">
    <div class="row">
        <div class="col-sm-6">

            <?= Html::a('Назад', Yii::$app->getRequest()->getReferrer(), ['class' => 'btn btn-success'])?>
            <?= Html::a('Добавить заказ', Url::to(['order/add','id'=>$user->id]), ['class' => 'btn btn-success'])?>

            <?php

            echo DetailView::widget([

                'model' => $user,
                'attributes' => [
                    'email',
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
        foreach ($model as $order) {

            ?>
            <tr>
                <td><?=$order->id?></td>
                <td><?=$order->date?></td>
                <?php if ($order->status == 1){?>
                    <td style="background-color: lightgreen"><?=$order->getTextStatus()?></td>
               <?php } ?>
                <?php if ($order->status == 2){?>
                    <td style="background-color: lightcoral"><?=$order->getTextStatus()?></td>
               <?php } ?>
                <?php if ($order->status == 3){?>
                    <td style="background-color: #b3d7ff"><?=$order->getTextStatus()?></td>
               <?php } ?>
                <?php if ($order->status == 4){?>
                    <td style="background-color: #e0a800"><?=$order->getTextStatus()?></td>
               <?php } ?>
                <?php if ($order->status == 5){?>
                    <td style="background-color: white"><?=$order->getTextStatus()?></td>
               <?php } ?>

                <td>
                    <?= Html::a('Подробно', Url::to(['order/more','id'=>$order->id]), ['class' => 'btn btn-success'])?>
                </td>
            </tr>
        <?php  }  ?>
        </tbody>
    </table>
</div>

