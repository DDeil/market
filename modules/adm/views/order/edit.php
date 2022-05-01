<?php
/**
 * @var EditOrderForm  $editForm
 * @var Order $model
 */

use app\models\Order;
use app\models\Product;
use app\modules\adm\forms\EditOrderForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;


$this->title = 'Редактировать заказ';
?>


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="box-body">
            <div class=" pull-left">
                <?= Html::a('Назад к заказу', Url::to(['more','id'=>$model->id]),['class' => 'btn btn-success'])?>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="box">
                <div class="box-header">
                    <?= $form->field($editForm, 'name')?>
                    <?= $form->field($editForm, 'address')?>
                    <?= $form->field($editForm, 'phone')?>
                    <?php ActiveForm::end(); ?>
                    <div class="box-body">
                        <div class=" pull-left">
                            <?= Html::submitButton('Изменить',  ['class' => 'btn btn-success'])?>
                        </div>
                    </div>
                </div>
            </div>
            </div>
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered detail-view" >
                        <tbody>
                        <tr >
                            <th>Код продукта</th>
                            <th>Название продуката</th>
                            <th>Описание</th>
                            <th>Количество</th>
                            <th>Цена</th>
                            <th>Изображение</th>
                            <th>Сумма</th>
                            <th><i class="fa fa-gear"/></th>
                        </tr>
                        <?php foreach ($model->productOrder as $productOrder) { ?>
                            <?php $product = $productOrder->product; ?>
                            <tr>
                                <td><?=$product->id?></td>
                                <td><?=$product->title?></td>
                                <td><?=$product->description?></td>
                                <td>
                                    <form action="<?=Url::to(['change'])?> " method="get">
                                        <input type="hidden" name="id" value="<?=$product->id?>">
                                        <input type="hidden" name="order_id" value="<?=$model->id?>">
                                        <input type="number" min="0" name="count_product" value="<?=$productOrder->count_product?>">
                                        <input type="submit" name="button" value="Изменить">
                                    </form>
                                </td>
                                <td><?=$product->price?></td>
                                <td><?= Html::img('/image/product/' . $product->image, ['style' => 'width: 55px']);?></td>
                                <td><?=$product->price*$productOrder->count_product?></td>
                                <td><?= Html::a('<i class="fa fa-trash"></i>', Url::to(['delete','id'=>$product->id,'order_id'=>$model->id]))?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
