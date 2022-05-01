<?php
/**
 * @var AddOrderForm  $addForm
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

$this->title = 'Добавть заказ';
?>


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-sm-3">
            <div class="box">
                <div class="box-header">
                    <?= $form->field($addForm, 'name')?>
                    <?= $form->field($addForm, 'last_name')?>
                    <?= $form->field($addForm, 'email')?>
                    <?= $form->field($addForm, 'address')?>
                    <?= $form->field($addForm, 'phone')?>
                </div>
                <div class="box-body">
                    <div class=" pull-right">
                        <?= Html::submitButton('Добавить',['class' => 'btn btn-success'])?>

                        <?= Html::a('Назад', Yii::$app->getRequest()->getReferrer(),['class' => 'btn btn-success'])?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>