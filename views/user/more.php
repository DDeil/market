<?php
/**
 * @var \app\models\User $model
 * @var \app\models\User $count
 */

use app\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'O заказов';
?>


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
        <div class="box-header">
            <div class="row">
                <div class="col-sm-3">

                    <?= Html::a('Назад', Url::to(['user', 'id' => $model->user_id]), ['class' => 'btn btn-success'])?>

                </div>
            </div>
        </div>

        </tbody>
    </table>
</div>

