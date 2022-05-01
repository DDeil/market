<?php
/**
 * @var \app\modules\adm\forms\ProductOrderForm  $productForm
 *  @var Order $model
 */

use app\modules\adm\forms\search\OrderListSearch;

use app\models\Order;
use app\models\Product;
use app\models\ProductOrder;
use app\modules\adm\forms\AddOrderForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

$this->title = 'Добавть продукт';
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
                    <?= $form->field($productForm, 'order_id')->hiddenInput()->label(false)?>
                    <?= $form->field($productForm, 'product_id')->widget(Select2::class, [

                        'data'          => Product::find()->select(["concat(title, '(code: ', id, ')') as name",'id'])->indexBy('id')->column(),
                        'pluginOptions' => [
                            'allowClear' => true,
                            'placeholder' => 'Выберите подук',
                        ],
                    ])?>
                    <?= $form->field($productForm, 'count_product')?>

                    <?php ActiveForm::end(); ?>

                    <div class="box-body">
                        <div class=" pull-left">
                            <?= Html::submitButton('Добавить',  ['class' => 'btn btn-success'])?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>