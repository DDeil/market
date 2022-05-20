<?php
/**
 * @var \app\models\User $model
 * @var \app\controllers\UserController $user
 * @var \app\controllers\UserController $form
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use app\models\User;



$this->title = 'O пользавателе';
?>

<div class="box-body">
    <div class="row">
        <div class="col-sm-6">

            <?= Html::a('Назад', Yii::$app->getRequest()->getReferrer(), ['class' => 'btn btn-success'])?>
            <?= Html::a('Добавить заказ', Url::to(['order/add','id'=>$user->id]), ['class' => 'btn btn-success'])?>
            <?php

            $form = \yii\bootstrap\ActiveForm::begin();

            echo DetailView::widget([

                'model' => $user,
                'attributes' =>
                 [
                    [
                        'attribute' => 'email',
                        'format'    => 'raw',
                        'value'     => function ( $model) use($form) {
                            return $form->field($model, 'email')->textInput()->label(false);
                        }
                    ],
                    [
                        'attribute'    =>  'name',
                        'format' => 'raw',
                        'value' => function ($model) use($form) {
                            return $form->field($model, 'name')->textInput(['class' => ''])->label(false);
                        }
                    ],
                    [
                        'attribute'    =>  'last_name',
                        'format' => 'raw',
                        'value' => function ($model) use($form) {
                            return $form->field($model, 'last_name')->textInput(['class' => ''])->label(false);
                        }
                    ],
                    [
                        'attribute'    =>  'phone',
                        'format' => 'raw',
                        'value' => function ($model) use($form) {
                            return $form->field($model, 'phone')->textInput(['class' => ''])->label(false);
                        }
                    ],
                    [
                        'attribute'    =>  'address',
                        'format' => 'raw',
                        'value' => function ($model) use($form) {
                            return $form->field($model, 'address')->textInput(['class' => ''])->label(false);
                        }
                    ],

                    [
                        'attribute'    =>  'type',
                        'format' => 'raw',

                        'value' => function ($model) use($form) {
                            if (Yii::$app->user->isGuest ) {
                                return $model->getTextType();
                            }
                                $user = User::findOne(['id'=> Yii::$app->user->getId()]);
                                if ($user->type == User::TYPE_DIRECTOR && $model->type == User::TYPE_DIRECTOR){
                                    return  $model->getTextType();
                                }
                                    if ($user->type == User::TYPE_ADM && $model->type == User::TYPE_ADM || $model->type == User::TYPE_DIRECTOR ){
                                            return  $model->getTextType();
                                    }
                            return $form->field($model, 'type')->dropdownList(User::TYPE_LIST);
                        }

                    ]
                ],
            ]);
           echo Html::submitButton('Изменить', ['class' => 'btn btn-success']) ;
            \yii\bootstrap\ActiveForm::end();


            ?>
        </div>
    </div>
</div>
<div class="col-sm-12">
    <table class="table table-striped table-bordered detail-view " >
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

