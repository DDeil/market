
<?php
/**
 * @var CartController $orderForm
 *  @var  CartController $session,

 */
use app\models\User;
use app\controllers\CartController;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Регистрация';

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<div class="container" >

    <div class="row" >
        <?php if ($session['cart']){ ?>
    <div class="col-lg-5">
    <div class="col-lg-9">
        <div class="box">
            <div class="box-header">
                <?= $form->field($orderForm, 'name')->hint('Введите Имя') ?>
                <?= $form->field($orderForm, 'phone')->hint('Введите номер телефона') ?>
                <?= $form->field($orderForm, 'address')->hint('Введите Адрес') ?>
            </div>
            <div class="box-body">
                <div class=" pull-right">
                   <?= Html::submitButton('Оформить заказ',['class' => 'btn btn-success'])?>
            </div>
            </div>
        </div>
    </div>
     <?php } ?>

                </div>
    <div class="col-sm-7  " >

        <?php if (Yii::$app->session->hasFlash('success')){?>
            <div class="alert alert-success alert-dismissible" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
                <?php echo Yii::$app->session->getFlash('success')?>
            </div>
        <?php } ?>

        <?php if (Yii::$app->session->hasFlash('error')){?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo Yii::$app->session->getFlash('error')?>
            </div>
        <?php } ?>
        <?php
        if (!empty($session['cart'])) : ?>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Фото</th>
                        <th>Название</th>
                        <th>Количество</th>
                        <th>Цена</th>
                        <th>Сумма</th>
                        <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($session['cart'] as $id => $item): ?>
                        <tr>
                            <td><?= \yii\helpers\Html::img("@web/image/product/{$item['image']}", ['alt' => $item['name'], 'height' => 50] )?></td>
                            <td><a href="<?=Url::to(['product/detail', 'id'=>$id])?>"><?= $item['name']?></a></td>
                            <td>
                                <div class="row">
                                <div class="col-md-2">
                                    <p><?= $item['qty']?></p>
                                </div>
                                <div class="col-md-8">
                                    <?= Html::a('-', Url::to(['minus', 'countMinus'=>$item['qty'], 'id'=>$id]), ['class' => 'btn btn-warning'])?>

                                    <?= Html::a('+', Url::to(['plus', 'countPlus'=>$item['qty'], 'id'=>$id]), ['class' => 'btn btn-success'])?>
                                </div>
                                </div>
                            </td>
                            <td><p><?= $item['price']?></p></td>
                            <td><?= $item['qty']* $item['price']?></td>
                            <td class="td">
                                <a href="<?=Url::to(['/cart/del', 'id' => $id])?>" class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <tr>
                        <td colspan="5">Итого:</td>
                        <td><?= $session['cart.qty']?></td>
                    </tr>
                    <tr>
                        <td colspan="5">На сумму:</td>
                        <td><?= $session['cart.sum']?></td>
                    </tr>
                    </tbody>
                </table>
            </div>

        <?php else: ?>
            <h3>Корзина пустая</h3>
        <?php endif;?>
    </div>

</div>
</div>

<?php ActiveForm::end(); ?>

